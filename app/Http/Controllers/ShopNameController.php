<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Shop_registrations;
use App\Models\Tbl_shopbrands;
use DB;

class ShopNameController extends Controller
{
    public function index()
    {
        $shopnames = DB::table('tbl_shopbrands')
        ->leftJoin('shop_registrations', 'tbl_shopbrands.franchise_id', '=', 'shop_registrations.id')
        ->select('tbl_shopbrands.*','shop_registrations.name as franchisename')
        ->get();
        $franchsie = DB::table('shop_registrations')->get();

        return view('shopname', compact('shopnames','franchsie'));
    }
    public function createfranchiseshops(Request $request){
           try {

    $shop = new Tbl_shopbrands();
    $shop->brand_name = $request->create_menu;
    $shop->franchise_id = $request->shop_id;
    $shop->save();

    return back()->with('success', 'Brand created successfully.');

} catch (\Exception $e) {

    return back()
        ->withInput()
        ->with('error', 'Something went wrong. ' . $e->getMessage());

}

    }
    public function shopnamefetch(Request $request){
       $id=$request->id;
   $apps=Tbl_shopbrands::find($id);
  print_r(json_encode($apps));
        
    }

    public function editfranchiseshop(Request $request){
 try {
        $id=$request->id;
        $shopname =Tbl_shopbrands::find($id);
        $shopname->brand_name = $request->shopname;
        $shopname->franchise_id     = $request->shop_id;
        $shopname->save();

        return redirect()->back()
            ->with('success', 'Data Edited successfully!');
    } catch (Exception $e) {
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again.');
    }
    }
}