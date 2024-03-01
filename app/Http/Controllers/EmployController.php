<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
use App\Models\Mole;
use Illuminate\Http\Request;
use App\Models\Floor;
use Illuminate\Support\Facades\Auth;
class EmployController extends Controller
{
   public function index(){
    if( Auth::check()&(Auth::user()->role == 3) ){
        return redirect()->back();
    }
    else{
     $employs=Employe::all();
     $floors=Floor::all();
     $departments=Department::all();


     return view('employ.index',compact("employs","floors","departments"));
    }
   }
   public function create()
   {
    $floors = Floor::all();
       $departments = Department::all();

       return view("employ.create", compact("floors", "departments"));
   }

   public function store(Request $request)
   {
       $this->validate($request, [
           "employ_name" => "required",
           "sallary" => "required",
           "rank" => "required",

       ]);

       $floor = Floor::where('floor_name', $request->floor_name)->first();
       $dep = Department::where('department_name',  $request->department_name)->first();
       
       $mole = Mole::first();
       $employ = new Employe();
    
       $employ->employ_name = $request->employ_name;
       $employ->sallary = $request->sallary;
       $employ->rank = $request->rank;
       $employ->mole_id = $mole->id;
       $employ->floor_name = $request->floor_name;
       $employ->floor_id = $floor->id; // تعيين قيمة floor_id بناءً على قيمة $floor
       $employ->department_id = $dep->id;
       $employ->department_name = $request->department_name;
       $dep->employ_count=$dep->employ_count+1;
       $dep->save();
       $employ->save();

       return redirect()->route('employe.index')->with('success', 'تمت إضافة الموظف بنجاح.');
   }






   public function show($id){
    if(Auth::user()->role==3){
        return redirect()->back();
    }
    $employ=Employe::find($id);
     return view('employ.show',compact('employ'));
   }







   public function edit($id){
    if(Auth::user()->role == 3 ){
        return redirect()->back();
    }
    $employ=Employe::find($id);
    $floors=Floor::all();
    $departments = Department::all();
    return view('employ.edit',compact("employ","floors","departments"));


   }
   public function update(Request $request, $id)
   {
       $this->validate($request, [
           "sallary" => "required",
           "rank" => "required",
       ]);

       $floor = Floor::where('floor_name', $request->floor_name)->first();
     // تطبيق dd() لفحص قيمة $floor

       $dep = Department::where('department_name', $request->department_name)->first();
       $employ = Employe::findOrFail($id);
       $employ->employ_name = $request->employ_name;
       $employ->sallary = $request->sallary;
       $employ->rank = $request->rank;
       $employ->floor_name = $request->floor_name;

        $employ->floor_id = $floor->id;

       $employ->department_id = $dep->id;

       $employ->department_name = $request->department_name;
       $employ->save();

       return redirect()->route('employe.index')->with('success', 'successfully Update Employe');
   }
   public function destroy($id){
    if(Auth::user()->role == 3 ){
        return redirect()->back();
    }
    $employ=Employe::find($id);
    $employ->delete();
    $employ->department->employ_count=$employ->department->employ_count-1;
    $employ->department ->save();
    return redirect()->route('employe.index')->with('success','successfully Deleted Employe');
   }
}
