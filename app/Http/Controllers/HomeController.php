<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hsns;
use App\Models\Categories;
use App\Models\Item;
use App\Models\Shop_registrations;
use App\Models\Menus;
use App\models\Staff_creation;
use App\models\User;

use Auth;
use DB;
use Hash;

class HomeController extends Controller
{
    public function logout(){
          Auth::logout();
         return redirect('login');
    }
    public function hsnlist(){
        $hsn=DB::table('hsns')->get();
        return view('hsn',compact('hsn'));
    }
    public function createhsn(Request $request){
       try {
        $hsn = new Hsns();
        $hsn->hsncode = $request->hsncode;
        $hsn->gst     = $request->tax;
        $hsn->igst    = $request->igst;
        $hsn->cgst    = $request->cgst;
        $hsn->save();

        return redirect()->back()
            ->with('success', 'Data created successfully!');
    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again.');
    }

    
    }

    public function categorylist()
{
    $category = Categories::all(); 
    return view('category', compact('category'));
}
 public function createcategory(Request $request){
       try {
        $category = new Categories();
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back()
            ->with('success', 'Data created successfully!');
    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again.');
    }

    
    }
    public function itemlist(){
    $items = Item::with('category')->get();
    $categories = Categories::all();
    return view('item', compact('items','categories'));
}

public function createitem(Request $request) {
    try {
        $item = new Item();
        $item->item_name = $request->item_name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/items'), $filename);
            $item->image = $filename;
        }

        $item->normal_price = $request->normal_price;
        $item->offer_price  = $request->offer_price;
        $item->category_id  = $request->category_id;

        $item->save();

        return redirect()->back()
            ->with('success', 'Data created successfully!');
    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again.');
    }

    
    }

    public function shoplist(){
        $shop=DB::table('shop_registrations')->get();
        return view('shop',compact('shop'));
    }

public function createshop(Request $request)
{
    $request->validate([
        'name'           => 'required|string|max:255',
        'email'          => 'required|email|unique:shop_registrations,email',
        'phone_number'   => 'required|digits_between:10,12',
        'address'        => 'required|string',
        'district'       => 'required|string',
        'state'          => 'required|string',
        'gst_number'            => 'required|string|max:20',
        'ffssai'                => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        'municipality_license'  => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        'shop_owner_name'       => 'required|string|max:20',
        'aadhar_number'  => 'required|digits:12',
        'aadhar_card'    => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        'pancard_number' => 'required|string|max:10',
        'pan_proof'    => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
    ]);

    DB::beginTransaction(); // Start transaction

    try {
        $ffssaiFileName = null;
        $municipalityFileName = null;
        $aadharFileName = null;
        $panFileName = null;

        if ($request->hasFile('ffssai')) {
            $ffssaiFileName = time().'_ffssai_'.$request->file('ffssai')->getClientOriginalName();
            $request->file('ffssai')->move(public_path('uploads'), $ffssaiFileName);
            }
            
        if ($request->hasFile('municipality_license')) {
            $municipalityFileName = time().'_municipality_'.$request->file('municipality_license')->getClientOriginalName();
            $request->file('municipality_license')->move(public_path('uploads'), $municipalityFileName);
            }

        if ($request->hasFile('aadhar_card')) {
            $aadharFileName = time().'_aadhar_'.$request->file('aadhar_card')->getClientOriginalName();
            $request->file('aadhar_card')->move(public_path('uploads'), $aadharFileName);
        }

        if ($request->hasFile('pan_proof')) {
            $panFileName = time().'_pan_'.$request->file('pan_proof')->getClientOriginalName();
            $request->file('pan_proof')->move(public_path('uploads'), $panFileName);
        }

        // Insert data
        DB::table('shop_registrations')->insert([
            'name'           => $request->name,
            'email'          => $request->email,
            'phone_number'   => $request->phone_number,
            'address'        => $request->address,
            'district'       => $request->district,
            'state'               => $request->state,
            'gst_number'          => $request->gst_number ?? '', 
            'ffssai'              => $ffssaiFileName,
            'municipality_license'=> $municipalityFileName,
            'shop_owner_name'     => $request->shop_owner_name ?? '',
            'aadhar_number'  => $request->aadhar_number,
            'aadhar_card'    => $aadharFileName,
            'pancard_number' => $request->pancard_number,
            'pan_proof'    => $panFileName,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        

        DB::commit();
        

        return redirect()->back()->with('success', 'Shop created successfully!');


        
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());

        
    }
}

public function menulist()
{
    $menus = Menus::with(['item', 'shop'])->get();
    $shops = Shop_registrations::all();
    $items = Item::all();

    return view('menus', [
        'menus' => $menus,
        'shops' => $shops,
        'items' => $items,
    ]);
}

public function createmenus(Request $request)
{
    try {
        $menus = new Menus();
        $menus->create_menu = $request->create_menu;
        $menus->item_id = $request->item_id;
        $menus->shop_id = $request->shop_id;
        $menus->save();

        return redirect()->back()->with('success', 'Menu created successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong');
    }
}


public function hsnfetch(Request $request){
 $id=$request->id;
   $apps=Hsns::find($id);
  print_r(json_encode($apps));
}

public function edithsn(Request $request){

      try {
        $id=$request->keyid;
        $hsn =Hsns::find($id);
        $hsn->hsncode = $request->hsncode;
        $hsn->gst     = $request->tax;
        $hsn->igst    = $request->igst;
        $hsn->cgst    = $request->cgst;
        $hsn->save();

        return redirect()->back()
            ->with('success', 'Data Edited successfully!');
    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again.');
    }
}

public function categoryfetch(Request $request){
 $id=$request->id;
   $apps=Categories::find($id);
  print_r(json_encode($apps));
}

public function editcategory(Request $request){

      try {
        $id=$request->keyid;
        $category =Categories::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back()
            ->with('success', 'Data Edited successfully!');
    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again.');
    }
}

public function menufetch(Request $request){
 $id=$request->id;
   $apps=Menus::find($id);
  print_r(json_encode($apps));
}

public function editmenus(Request $request){

      try {
        $id=$request->keyid;
        $menus =Menus::find($id);
        $menus->create_menu = $request->create_menu;
        $menus->shop_id        = $request->shop_id;
        $menus->item_id = $request->item_id;
        $menus->save();

        return redirect()->back()
            ->with('success', 'Data Edited successfully!');
    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again.');
    }
}

public function editshop($id)
{
    $shop = Shop_registrations::find($id);
    return view('editshop', compact('shop'));
}

public function updateshop(Request $request, $id)
{
    $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email',
    'phone_number' => 'required',
    'address' => 'required',
    'district' => 'required',
    'state' => 'required',
    'gst_number' => 'required',
    'ffssai' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    'municipality_license' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    'shop_owner_name' => 'required',
    'aadhar_number' => 'required|digits:12',
    'aadhar_card' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    'pancard_number' => 'required',
    'pan_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',


]);

    
    try {

        $shop = Shop_registrations::find($id);

        if (!$shop) {
            return redirect()->back()->with('error', 'Shop not found.');
        }

        $shop->name = $request->name;
        $shop->email = $request->email;
        $shop->address = $request->address;
        $shop->phone_number = $request->phone_number;
        $shop->district = $request->district;
        $shop->state = $request->state;
        $shop->gst_number = $request->gst_number;
    
       

        if ($request->hasFile('ffssai')) {
            $file = $request->file('ffssai');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $shop->ffssai = $filename;
        }

        if ($request->hasFile('municipality_license')) {
            $file = $request->file('municipality_license');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $shop->municipality_license = $filename;
        }

        $shop->shop_owner_name = $request->shop_owner_name;
        $shop->aadhar_number = $request->aadhar_number;

        if ($request->hasFile('aadhar_card')) {
            $file = $request->file('aadhar_card');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $shop->aadhar_card = $filename;
        }

         $shop->pancard_number = $request->pancard_number;

        if ($request->hasFile('pan_proof')) {
            $file = $request->file('pan_proof');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $shop->pan_proof = $filename;
        }

        $shop->save();

        return redirect()->route('shop.list')->with('success', 'Updated successfully!');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong.');
    }
}


 public function staff_creationlist(){
    $staff_creation = Staff_creation::all();
    
    return view('staff_creation', compact('staff_creation'));
}

public function createstaff_creation(Request $request){

// echo "hi";exit;
   try {
       
       $staff_creation = new Staff_creation();
       $staff_creation ->staff_name    = $request->staff_name;
       $staff_creation->phone_number        = $request->phone_number;
       $staff_creation->email = $request->email;
       $staff_creation->password  = $request->password;
       $staff_creation->staff_id  = $request->staff_id;
      if ($request->file('staff_image') && $request->file('staff_image')->isValid()) {

    $file = $request->file('staff_image');
    $filename = time().'_'.$file->getClientOriginalName();
    $file->move(public_path('uploads/staff_images'), $filename);

    $staff_creation->staff_image = $filename;

} else {
    $staff_creation->staff_image = 'placeholder.png';
}

       $staff_creation->save();

      return redirect()->back()->with('success', 'Data created successfully!');
   } catch (\Exception $e) {
      return redirect()->back()->with('error', $e->getMessage());
   }
}  

  public function stafffetch(Request $request){
 $id=$request->id;
   $apps=Staff_creation::find($id);
  print_r(json_encode($apps));
  }
public function editstaff(Request $request) {
    try {
        // Get the shop model using the keyid from request
        $staff_creation = Staff_creation::find($request->keyid);

        if (!$staff_creation) {
            return redirect()->back()->with('error', 'staff creation not found.');
        }

        
        $staff_creation->staff_name = $request->staff_name;
        $staff_creation ->staff_name    = $request->staff_name;
        $staff_creation->phone_number        = $request->phone_number;
        $staff_creation->email = $request->email;
        $staff_creation->password  = $request->password;
        $staff_creation->staff_id  = $request->staff_id;
        if ($request->hasFile('staff_image')) {
    $file = $request->file('staff_image');
    $filename = time().'_'.$file->getClientOriginalName();
    $file->move(public_path('uploads/staff_images'), $filename);
    $staff_creation->staff_image = $filename;
}



       $staff_creation->save();

        return redirect()->back()->with('success', 'Data Edited successfully!');
   } catch (\Exception $e) {
    dd($e->getMessage()); // Laravel will show the actual error
}

}

public function itemfetch(Request $request){
 $id=$request->id;
   $apps=Item::find($id);
  print_r(json_encode($apps));
}

public function edititem(Request $request){

// echo "hi";exit;
   try {
       $id=$request->keyid;
       $item = Item::Find($id);
       $item ->item_name    = $request->item_name;
        if ($request->hasFile('image')) {
    $file = $request->file('image');
    $filename = time().'_'.$file->getClientOriginalName();
    $file->move(public_path('uploads/items'), $filename);
    $item->image = $filename;
}

       $item->normal_price = $request->normal_price;
       $item->offer_price  = $request->offer_price;
       $item->category_id  = $request->category_id;
       $item->save();
return redirect()->back()->with('success', 'Data edited successfully!');
   } catch (\Exception $e) {
      return redirect()->back()->with('error', $e->getMessage());
   }
} 

public function addshops(){
    return view('addshops');
}
public function createbill(){
     return view('createbill');
}
public function generatebill(Request $request){
 return view('generatebill');
}


}
