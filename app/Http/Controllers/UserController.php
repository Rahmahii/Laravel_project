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
}
