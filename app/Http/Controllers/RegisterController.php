<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
   public function create() {
       return view('register.create');
   }

   public function store() {
   //create user
   dd(request()->all());
   request()->validate([
       'name' => ['required', 'max:255'],
       'username' => ['required', 'max:255'],
       'email' => ['required', 'email', 'max:255'],
       'password' => ['required']

   ]);
}
}
