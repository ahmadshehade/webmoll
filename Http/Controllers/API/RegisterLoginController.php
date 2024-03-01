<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RegisterLoginController extends BaseController
{
   public function register(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'email' => 'required|email',
         'password' => 'required|min:6',
         'c_password' => 'required|same:password',
      ]);

      if ($validator->fails()) {
         return $this->sendError('Validation Error', $validator->errors());
      }

      $input = $request->all();
      $input['password'] = Hash::make($input['password']);
      $user = User::create($input);
      $success['token'] = $user->createToken('ahmad')->accessToken;
      $success['name'] = $user->name;

      return $this->sendResponse($success, 'User successfully created');
   }

   public function login(Request $request)
   {
      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
         $user = Auth::user();
         $success['token'] = $user->createToken('ahmad')->accessToken;
         $success['name'] = $user->name;

         return $this->sendResponse($success, 'User successfully logged in');
      } else {
         return $this->sendError('Unauthorized', ['error' => 'Invalid credentials']);
      }
   }
}
