<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\InvestorFloor;
class InvestorFloorController extends Controller
{
   public function index(){
    if(Auth::user()->role == 3){
        return view("home");
    }
    else{
    $invfloor=InvestorFloor::all();
    return view('investorandfloor.index',compact("invfloor"));
    }

   }
   public function  destroy($id){
    if(Auth::user()->role == 3 || Auth::user()->role == 2){
        return redirect()->back();
    }
    $invfloor=InvestorFloor::find($id);
    $invfloor->delete();
    return redirect()->route('Investorfloor.index')->with("success","successfully Deleted");
   }

}
