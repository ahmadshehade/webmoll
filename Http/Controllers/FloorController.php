<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Investor;
use App\Models\Mole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FloorController extends Controller
{
  public function index(){
    if(Auth::user()->role == 3){
        return redirect()->back()->with("error","Dissable");
    }
    else{
    $floors=Floor::all();
    return view("floors.index",compact("floors"));
    }
  }
  public function create(){
    if( Auth::check() & (Auth::user()->role == 3 || Auth::user()->role == 2)){
        return redirect()->back()->with("error","Dissable");
    }
    $mole=Mole::first();
    return view("floors.create",compact('mole'));
  }

  public function store(Request $request)
  {
      $this->validate($request, [
          "floor_name" => "required",
          "departments_count" => "required",
      ]);

      $floor = new Floor;
      $mole = Mole::first(); // إذا كنت تريد الحصول على السجل الأول في الجدول

      $floor->floor_name = $request->floor_name;
      $floor->departments_count = $request->departments_count;
      $floor->moel_id = $mole->id;
      $floor->save();
    //   $investor=Investor::all();
    //   $floor->investors()->attach($investor->id,[
    //     "investor_name"=>$investor->investor_name,
    //     "floor_name" => $request->floor_name,
    //   ]);

      return redirect()->route("floors.index")->with("success", "تمت إضافة الطابق بنجاح");
  }
  public function show($id){
    if(Auth::check() & (Auth::user()->role == 3)){
        return redirect()->back()->with("error","Disable");
    }
    $floor = Floor::find($id);
    return view("floors.show",compact("floor"));
  }


  public function edit($id){
    if( Auth::check() & (Auth::user()->role == 3 || Auth::user()->role == 2)){
        return redirect()->back()->with("error","Dissable");
    }else{
    $floor=Floor::find($id);
    return view("floors.edit",compact("floor"));
    }
  }


  public function update(Request $request, $id){
    $this->validate($request,[
        "floor_name"=> "required",
        "departments_count"=> "required",

    ]);
    $floor=Floor::find($id);
    $floor->floor_name=$request->floor_name;
    $floor->departments_count=$request->departments_count;
   
    $floor->save();

    return redirect()->route("floors.index")->with("success",'Successfully ubdated');
}


  public function destroy($id){
    if( Auth::check() & (Auth::user()->role == 3 || Auth::user()->role == 2)){
        return redirect()->back()->with("error","Dissable");
}
    else{
        $floor=Floor::find($id);
        $floor->delete();
        return redirect('floors')->with("success","Successfully Deleted Floor");

    }
}
}
