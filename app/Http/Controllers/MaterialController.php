<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function index()
    {
        $material = DB::table('materials')->get();

        return view('materials', compact('material'));
    }

    public function getMaterial(Request $request)
    {
        $material = DB::table('materials')
            ->where('id', $request->id)
            ->first();

        return response()->json($material);
    }

    public function updateMaterial(Request $request)
    {
        DB::table('materials')
            ->where('id', $request->keyid)
            ->update([
                'name' => $request->name,
                'mrp' => $request->mrp,
                'sr' => $request->sr,
                'brand' => $request->brand,
            ]);

        return redirect()->back()
            ->with('success', 'Data Edited successfully!');
    }
}