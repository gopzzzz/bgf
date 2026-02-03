<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hsns;
use App\Models\Categories;
use App\Models\Item;
use App\Models\Shop_registrations;
use App\Models\Menus;
use App\models\Staff_creation;
use Auth;
use DB;

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
    public function createshop(Request $request){


   try {
       
       $shop = new Shop_registrations();
       $shop->name    = $request->name;
       $shop->email        = $request->email;
       $shop->address = $request->address;
       $shop->phone_number  = $request->phone_number;
       $shop->district  = $request->district;
       $shop->state  = $request->state;
       $shop->gst_number  = $request->gst_number;
       $shop->ffssai  = $request->ffssai;
       $shop->municipality_license  = $request->municipality_license;
       $shop->shop_owner_name  = $request->shop_owner_name;
       $shop->aadhar_card  = $request->aadhar_card;
       $shop->pancard  = $request->pancard;
       $shop->save();

       return redirect()->back()->with('success', 'Data created successfully!');
   } catch (\Exception $e) {
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

public function shopfetch(Request $request){
 $id=$request->id;
   $apps=Shop_registrations::find($id);
  print_r(json_encode($apps));
}

public function editshop(Request $request) {
    try {
        // Get the shop model using the keyid from request
        $shop = Shop_registrations::find($request->keyid);

        if (!$shop) {
            return redirect()->back()->with('error', 'Shop not found.');
        }

        // Update fields
        $shop->name = $request->name;
        $shop->email = $request->email;
        $shop->address = $request->address;
        $shop->phone_number = $request->phone_number;
        $shop->district = $request->district;
        $shop->state = $request->state;
        $shop->gst_number = $request->gst_number;
        $shop->ffssai = $request->ffssai;
        $shop->municipality_license = $request->municipality_license;
        $shop->shop_owner_name = $request->shop_owner_name;
        $shop->aadhar_card = $request->aadhar_card;
        $shop->pancard = $request->pancard;

        $shop->save(); // save changes

        return redirect()->back()->with('success', 'Data Edited successfully!');
    } catch (\Exception $e) {
        // Optional: log the error to debug
        // \Log::error($e->getMessage());
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
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


}



