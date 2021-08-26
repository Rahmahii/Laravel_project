<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function show()
  {
    $user = auth()->user();
    return view('users.profile', ['user' =>$user]);
  }
  public function edit(Request $request){
    $user = auth()->user();
    
    $request->validate([
      'name' => 'string|max:255',
      'email' => 'required|email|unique:users,email,'.$user->id,
      'username' => 'required|min:4|regex:/^[A-Za-z0-9_]+$/|unique:users,username,'.$user->id,
      'BirthDate' => 'date|before:today',
      'phone' => 'max:10'
  ]);
      $user->name= $request->name; 
      $user->email=$request->email;
      $user->username=$request->username;
      $user->BirthDate= $request->BirthDate;
      $user->phone= $request->phone;
      $user->package_id= $request->package_id;
      $user->save();
      return view('users.profile', ['user' =>$user]);
  }
}
