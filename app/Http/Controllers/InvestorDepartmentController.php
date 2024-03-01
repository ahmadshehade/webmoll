<?php

namespace App\Http\Controllers;

use App\Models\InvestorDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InvestorDepartmentController extends Controller
{
Public function index(){
    if(Auth::user()->role == 3 ){
        return redirect()->back();
    }
    else{
    $idss=InvestorDepartment::all();
    return view('investordepartments.index',compact("idss"));
    }
}
public function destroy($id){
    if(Auth::user()->role == 3 ||Auth::user()->role == 2){
        return redirect()->back();
    }
    $idss=InvestorDepartment::find($id);
    $idss->delete();
    return redirect()->route('investordepartment.index')->with("success","Deleted!");
}
}
