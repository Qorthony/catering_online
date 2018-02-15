<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest');
    }

    public function getLogin()
    {
      return view('login.formLogin');
    }

    public function postLogin(Request $request)
    {
      if (Auth::attempt([
        'email'=>$request->user,
        'password'=>$request->pwd
        ])) {
        return redirect('/home');
      }

      elseif (Auth::attempt([
        'username'=>$request->user,
        'password'=>$request->pwd
        ])) {
        return redirect('/admin');
      }

      else {
        return view('login.formLogin',['salah'=>'data yang anda masukkan salah']);
      }
    }
}
