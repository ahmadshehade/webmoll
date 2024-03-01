<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mole;

use Illuminate\Support\Facades\Validator;
class MoleController extends Controller
{
//
 public function index(){

    if(Auth::user()->role == 3 || Auth::user()->role == 2){
        return redirect()->back();
    }else{
        $moles = Mole::first();
    return view('mole.index',compact('moles'));
    }
 }
///////////////////////////////////////////////
 public function create(){
    if(Auth::user()->role == 3 || Auth::user()->role == 2){
        return redirect()->back();
    }
    return view("mole.create");
 }
//////////////////////////////////////////////
 public function store(Request $request){
    $mole = new Mole();
    $validator=Validator::make($request->all(),[
      "name"=> "required",
      "Construction_time"=> "required",
    ]);

    $mole->name = $request->name;
   $mole->Construction_time= $request->Construction_time;
   $mole->save();

    return redirect()->route('mole.index')->with('success','Successfully Store New Mole');
 }
 ////////////////////////////////////////////////////
 public function edit($id){
    if(Auth::user()->role == 3 || Auth::user()->role == 2){
        return redirect()->back();
    }
    $mole = Mole::where('id',$id)->find($id);
    return view('mole.edit', compact('mole'));
 }
 ///////////////////////////////////////////////////
 public function update(Request $request, $id){
    $mole=Mole::find($id);
      $validated=$this->validate($request,[
         'name'=> 'required',

      ]);
    $mole->update($request->all());
    return redirect()->route('mole.index')->with('success','Successfully Update Information For Mole');

 }


}
