<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class profileController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }
    public function index(){
        $profiles=Profile::all();
        $user=Auth::user();
        return view('prof.index',compact("profiles","user"));
    }
    public function create(){
          $user=Auth::user();
        return view("prof.create" ,compact("user"));
    }
    public function store(Request $request){
        $this->validate($request,[


       "gender"=> "required",
       "serial_number"=>"required",
       "personal_image"=>"required|image",

        ]);
        $photo = $request->file('personal_image');
        $newphoto = time() . '_' . $photo->getClientOriginalName();
        $photo->move(public_path("upload/profiles"), $newphoto);
        $user=Auth::user();
        $profile=new Profile;
        $profile->name=$user->name;
        $profile->email=$user->email;
        $profile->gender=$request->gender;
        $profile->serial_number=$request->serial_number;
 
        $profile->personal_image="upload/profiles/". $newphoto;

        $profile->user_id=$user->id;
        $profile->save();
        return redirect()->route('profiles.index')->with("success","store profile");





    }
    public function show($id){
        $user=Auth::user();
        $profile=Profile::find($id);
        return view("prof.show",compact("profile","user"));
    }

    public function edit($id){
        $user=Auth::user();
        $profile=Profile::find($id);
        return view('prof.edit',compact("profile","user"));
    }
    public function update(Request $request, $id){
        $profile = Profile::find($id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->gender = $request->gender;
        $profile->serial_number = $request->serial_number;

        if ($request->hasFile("personal_image")) {
            $photo = $request->file("personal_image");
            if ($photo->isValid()) {
                $newphoto = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path("upload/profiles"), $newphoto);
                $profile->personal_image = "upload/profiles/" . $newphoto;
            }
        }

        $profile->save();



         return redirect()->route('profiles.index')->with("success","successfully update profile");

    }
    public function destroy($id){
        $profile=Profile::find($id);
        $profile->delete();
        return redirect()->route("profiles.index")->with("success","");
    }

}
