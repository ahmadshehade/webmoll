<?php

namespace App\Http\Controllers;
use App\Models\Mole;
use Illuminate\Http\Request;
use App\Models\Onner;
use App\Models\Investor;
use Illuminate\Support\Facades\Auth;;

class OwnnerController extends Controller
{
  public function index(){
    if(Auth::user()->role == 3 ){
        return redirect()->back();
    }
    else{
 $oners=Onner::all();
 $moles=Mole::first();
 return view('onner.index',compact("oners","moles"));
    }
  }
  public function create(){
    if(Auth::user()->role == 3 || Auth::user()->role == 2){
        return redirect()->back();
    }
     $mole=Mole::first();
    return view('onner.create',compact('mole'));
  }
  public function store(Request $request)
  {  $this->validate($request,[
    'first_name'=>'required',
    'last_name'=>'required',
    'gender'=>'required',
    'email'=>'required',
    'Nationality'=>'required',

  ]);
      $mole = Mole::first();
      $onner = new Onner;
      $onner->first_name = $request->first_name;
      $onner->last_name = $request->last_name;
      $onner->gender = $request->gender;
      $onner->email = $request->email;
      $onner->Nationality = $request->Nationality;
      $onner->mole_id = $mole->id;
      $onner->save();

      $investors = Investor::all();
      foreach ($investors as $investor) {
          $onner->investors()->attach($investor->id, [
              'onner_name' => $onner->first_name . $onner->last_name,
              'investor_name' => $investor->investor_name
          ]);
      }

      return redirect()->route('onner.index')->with('success', 'Owner Store Successfully');
  }


   public function show($id){
    if(Auth::user()->role == 3 ){
        return redirect()->back();
    }
     $onner=Onner::find($id);
     $moles=Mole::first();
     if(Auth::user()->role == 3 ){
        return redirect()->back();
    }
    return view('onner.show',compact('onner','moles'));
   }


   public function edit($id){
    if(Auth::user()->role == 3 || Auth::user()->role == 2){
        return redirect()->back();
    }
     $onner=Onner::find($id);
     return view('onner.edit',compact('onner'));
   }

   public function update(Request $request, $id){
    $input=$request->all();
    $onner=Onner::find($id);
    $this->validate($request,[
        'first_name'=>['required','string'],
        'last_name'=>['required','string'],
        'gender'=>'required',
        'Nationality'=> 'required',
        'email'=> 'required',


    ]);
    $onner->first_name= $input['first_name'];
    $onner->last_name= $input['last_name'];
    $onner->gender=$input['gender'];
    $onner->email=$input['email'];
    $onner->Nationality=$input['Nationality'];
    $onner->save();

    if($onner->save()){
        return redirect()->route('onner.index')->with('success','Successfully Update Owner ');
         }else{
            return redirect()->back()->with('error', 'Failed to Update Owner');
         }

   }
   public function destroy( $id ){
    if(Auth::user()->role == 3 || Auth::user()->role == 2){
        return redirect()->back();
    }
    $onner=Onner::find($id);
    $onner->delete();
    return redirect()->route('onner.index')->with('success','Successfully Deleted Owner');
   }


}
