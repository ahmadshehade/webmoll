<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {     
      
        return view('home');
    }
    public function dashbord(){

        if(Auth::user()->role==3){
            return view('products.index');
        }
        $users=User::all();
        return view('dashbord' ,compact('users'));
    }
    public function updaterole($id, Request $request) {
        if(Auth::user()->role== 1){
        $user = User::find($id);
        $user->update($request->all());
        $users = User::all(); // استعلم عن المستخدمين مرة أخرى
        return view('dashbord', compact('users'));
    }else{
        return redirect()->back();
    }
    }
}
