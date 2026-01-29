<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hsns;
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
}
