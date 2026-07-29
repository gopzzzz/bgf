<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function edit($id)
    {
        $shop = DB::table('shop_registrations')
            ->where('id', $id)
            ->first();

        if (!$shop) {
            return redirect()
                ->back()
                ->with('error', 'Shop not found');
        }

        return view('shops.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'shop_owner_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        DB::table('shop_registrations')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'shop_owner_name' => $request->shop_owner_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'address' => $request->address,
            ]);

        return redirect('/franchiseshops')
            ->with('success', 'Shop updated successfully');
    }
}