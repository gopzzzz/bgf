<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hsns;
use App\Models\Category;
use App\Models\Item;
use App\Models\Shop_registrations;
use App\Models\Menus;
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
    $category = Category::all(); 
    return view('category', compact('category'));
}
 public function createcategory(Request $request){
       try {
        $category = new Category();
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
    $item = Item::all();
    $categories = Category::all();
    return view('item', compact('item','categories'));
}

public function createitem(Request $request){

// echo "hi";exit;
   try {
       
       $item = new Item();
       $item->item_name    = $request->item_name;
       $item->image        = $request->image;
       $item->normal_price = $request->normal_price;
       $item->offer_price  = $request->offer_price;
       $item->category_id  = $request->category_id;
       $item->save();

       return redirect()->back()->with('success', 'Data created successfully!');
   } catch (\Exception $e) {
       return redirect()->back()->with('error', 'Something went wrong. Please try again.');
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
public function menulist(){
    $menus = Menus::all();                     
    $shops = Shop_registrations::all();        
    $items = Item::all();                     

    return view('menus', compact('menus', 'shops', 'items'));
}

    public function createmenus(Request $request){


   try {
       
       $menus = new Menus();
       $menus->create_menu    = $request->create_menu;
       $menus->shop_id        = $request->shop_id;
       $menus->item_id = $request->item_id;
       $menus->save();

       return redirect()->back()->with('success', 'Data created successfully!');
   } catch (\Exception $e) {
      return redirect()->back()->with('error', $e->getMessage());

   }
    

}
}
