<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\InvestorOwner;
class InvestorOwnnerController extends Controller
{
public function index(){
    if(Auth::user()->role == 3){
        return view("home");
    }
    else{
    $ios=InvestorOwner::all();
    return view("I & O.index",compact("ios"));
    }
}
public function destroy($id){
    if(Auth::user()->role == 3 || Auth::user()->role == 2){
        return redirect()->back();
    }
    $ioss=InvestorOwner::find($id);
    $ioss->delete();
    return redirect()->route('InvestorOwner.index')->with("success","succefully delete owner with relation  ");
}
}
