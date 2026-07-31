<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_registrations;
use App\Models\Menus;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {

      $menus = DB::table('menus')
    ->join('items', 'menus.item_id', '=', 'items.id')
      ->join('tbl_shopbrands', 'menus.shop_id', '=', 'tbl_shopbrands.id')
    ->select(
        'menus.*',
        'items.offer_price','items.bgf','items.item_name','tbl_shopbrands.brand_name'
    )
    ->get();

        $brand  = DB::table('tbl_shopbrands')->get();

        

        $items = DB::table('items')->get();

        return view('menus', compact('menus','brand','items'));
    }

      public function store(Request $request)
{
    $request->validate([
        'item_id'       => 'required',
        'shop_id'       => 'required',
        
        'specialrate'  => 'nullable|numeric',
    ]);

    $menu = new Menus();
    $menu->item_id = $request->item_id;
    $menu->shop_id = $request->shop_id;
    $menu->special_rate = $request->specialrate;
    $menu->save();

    return redirect()->back()->with('success', 'Record saved successfully.');
}

public function show(Request $request){
$id=$request->id;
   $apps=Menus::find($id);
  print_r(json_encode($apps));
}
public function update(Request $request)
{
    $id=$request->keyid;
    $request->validate([
        'item_id'      => 'required',
        'shop_id'      => 'required',
        'specialrate'  => 'nullable|numeric',
    ]);

    $menu = Menus::findOrFail($id);

    $menu->item_id = $request->item_id;
    $menu->shop_id = $request->shop_id;
    $menu->special_rate = $request->specialrate;

    $menu->save();

    return redirect()->back()->with('success', 'Record updated successfully.');
}
}