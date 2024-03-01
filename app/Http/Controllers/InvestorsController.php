<?php

namespace App\Http\Controllers;

use App\Models\Onner;
use App\Models\Mole;
use App\Models\Floor;
use Illuminate\Http\Request;
use App\Models\Investor;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
class InvestorsController extends Controller
{
public function index(){
    if(Auth::user()->role == 3){
        return view("home");
    }
    else{
    $investors=Investor::all();
    $floor= Floor::all();
    return view('investors.index',compact("investors","floor"));
    }
}
//////////////////////////////////////////////
public function create()
{
    if(Auth::user()->role == 3 || Auth::user()->role == 2){
    return redirect()->back();
      }
    $investor = new Investor;
    $floors = Floor::all();
    $departments=Department::all();
    return view("investors.create", compact('investor', 'floors','departments'));
}
//////////////////////////////////////////////
public function store(Request $request)
{
    $this->validate($request, [
        "investor_name" => "required",
    ]);

    $mole = Mole::first();
    $investor = new Investor;

    $investor->mole_id = $mole->id;
    $investor->investor_name = $request->investor_name;
    $investor->save();

    $selectedFloors = $request->input('floors', []); // قائمة الطوابق المحددة
    $selectedDepartments = $request->input('departments', []); // قائمة الأقسام المحددة

    if (!empty($selectedFloors)) {
        foreach ($selectedFloors as $floorId) {
            $floor = Floor::find($floorId);
            if ($floor) {
                $investor->floors()->attach($floor->id, [
                    "investor_name" => $request->investor_name,
                    "floor_name" => $floor->floor_name,
                ]);
            }
        }
    }

    if (!empty($selectedDepartments)) {
        foreach ($selectedDepartments as $departmentId) {
            $department = Department::find($departmentId);
            if ($department) {
                $investor->departments()->attach($department->id, [
                    "investor_name" => $request->investor_name,
                    "department_name" => $department->department_name,
                ]);
            }
        }
    }
    $oner=Onner::where('first_name', $request->investor_name)->first();
    if($oner){
    $investor->onners()->attach($oner->id,[
        "investor_name" => $request->investor_name,
        "onner_name"=>$oner->first_name,
    ]);

    }
    return redirect()->route("investors.index")->with("success", "Successfully Store Investor");
}
////////////////////////////////////////////////////////////////



    public function show($id){
        if(Auth::user()->role == 3){
            return redirect()->back();
        }
        $investor=Investor::find($id);
      $floor=Floor::all();

        return view("investors.show",compact("investor","floor"));
    }
    ////////////////////////////////////////////////////////
    public function edit($id)
    {
        if(Auth::user()->role == 3 || Auth::user()->role == 2){
            return redirect()->back();
        }
        $investor = Investor::find($id);
        $floors = Floor::all(); // استرداد جميع الطوابق
        $departments = Department::all(); // استرداد جميع الأقسام

        // استرداد الطوابق المحددة للمستثمر
        $selectedFloors = $investor->floors->pluck('id')->toArray();

        // استرداد الأقسام المحددة للمستثمر
        $selectedDepartments = $investor->departments->pluck('id')->toArray();

        return view("investors.edit", compact("investor", "floors", "selectedFloors", "selectedDepartments", "departments"));
    }
    //////////////////////////////////////////////////////////////
    public function update(Request $request, $id)
    {
        $investor = Investor::find($id);
        $this->validate($request, [
            "investor_name" => "required",
        ]);
        $investor->investor_name = $request->investor_name;


        $selectedFloors = $request->input('floors', []); // قائمة الطوابق المحددة
        $floorsData = []; // مصفوفة لتخزين بيانات الطوابق

        foreach ($selectedFloors as $floorId) {
            $floor = Floor::find($floorId);
            if ($floor) {
                $floorData = [
                    "investor_name" => $request->investor_name,
                    "floor_name" => $floor->floor_name,
                ];

                if (!$investor->floors->contains($floorId)) {
                    // إذا لم يكن السطر موجودًا في الجدول الوسيط، استخدم attach()
                    $investor->floors()->attach($floorId, $floorData);
                } else {
                    // إذا كان السطر موجودًا في الجدول الوسيط، استخدم sync() لتحديثه فقط
                    $investor->floors()->syncWithoutDetaching([$floorId => $floorData]);
                }
            }
        }

        $selectedDepartments = $request->input('departments', []);
        foreach ($selectedDepartments as $departmentId) {
            $department = Department::find($departmentId);
            if ($department) {
                $departmentData = [
                    "investor_name" => $request->investor_name,
                    "department_name" => $department->department_name,
                ];

                if (!$investor->departments->contains($departmentId)) {
                    // إذا لم يكن السطر موجودًا في الجدول الوسيط، استخدم attach()
                    $investor->departments()->attach($departmentId, $departmentData);
                } else {
                    // إذا كان السطر موجودًا في الجدول الوسيط، استخدم sync() لتحديثه فقط
                    $investor->departments()->syncWithoutDetaching([$departmentId => $departmentData]);
                }
            }
        }
        $onner = Onner::where('first_name', $request->investor_name)->first();
        if ( $onner===null) {
            $investor->onners()->detach(); // حذف السطر المرتبط بالمستثمر والعميل
        }else{
            $investor->onners()->attach($onner->id,[
                "investor_name" => $request->investor_name,
                "onner_name"=>$onner->first_name,
            ]);
        }

        $investor->save();



        return redirect()->route("investors.index")->with("success", "تم تحديث المستثمر بنجاح");
    }


///////////////////////////////////////////////////////////

    public function destroy($id){
        if(Auth::user()->role == 3 || Auth::user()->role == 2){
            return redirect()->back();
        }
        $investor=Investor::find($id);
        $investor->delete();
        return redirect()->route("investors.index")->with("success","successfully Delete Investor");
    }
}
