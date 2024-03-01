<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Mole;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DepartmentsController extends Controller
{
    public function index()
    {
        if(Auth::user()->role ==3){
            return redirect()->back();
        }else{
        $deps = Department::all();
        $floors=Floor::all();

        return view('departments.index', compact("deps","floors",));
        }
    }

    public function create()
    {    if(Auth::user()->role=="1"){
        $floors = Floor::all(); // استرداد جميع الطوابق لعرضها في العرض
        return view('departments.create', compact("floors"));
    }
    else{
        return redirect()->back();
    }
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'department_name' => ['required', 'string'],
        'employ_count' => ['required', 'integer'],
        'floor_name' => 'required',
    ]);

    $mole = Mole::first();
    $floor = Floor::where('floor_name', $request->floor_name)->first();

    $dep = new Department;
    $dep->department_name = $request->department_name;
    $dep->employ_count = $request->employ_count;
    $dep->mole_id = $mole->id;
    $floor->departments_count=$floor->departments_count+1;
    $floor->save();
    $dep->floor_name = $request->floor_name;
    $dep->floor_id = $floor->id;
    $dep->save();

    return redirect()->route('departments.index')->with('success','Successfuly Store Department');
}
public function show($id){

    $dep = Department::find($id);
    $floor=Floor::find($id);
    return view('departments.show', compact("dep","floor"));
}
    public function edit($id)
    {  if(Auth::user()->role==1 || Auth::user()->role==2){
        $dep = Department::find($id);
        $floors = Floor::all(); // استرداد جميع الطوابق لعرضها في العرض
        return view('departments.edit', compact("dep", "floors"));
    }
    else{
        return redirect()->back();
    }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'department_name' => ['required', 'string'],
            'employ_count' => ['required', 'integer'],

        ]);
        $floor = Floor::where('floor_name', $request->floor_name)->first();
        $dep = Department::find($id);
        $dep->department_name = $request->department_name;
        $dep->employ_count = $request->employ_count;
        $dep->floor_name = $request->floor_name;
        $dep->floor_id = $floor->id;
       
        $dep->save();
        
        return redirect()->route('departments.index')->with('success', 'Successfuly Updated');
    }

    public function destroy($id)
    { if(Auth::user()->role==1){
        $dep = Department::find($id);
        $dep->delete();
        $dep->floor->departments_count=$dep->floor->departments_count-1;
        $dep->floor->save();
        return redirect()->route('departments.index')->with('success', 'Successfully Deleted Departments ');
    }
    else{
        return redirect()->back();
    }
    }
}
