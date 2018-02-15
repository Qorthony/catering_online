<?php

namespace App\Http\Controllers;
use Validator;
use App\User;
use App\role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest');
    }

    public function showRegister()
    {
      return view('register.formRegister');
    }

    public function sendRegister(Request $request)
    {
      // validasi

      $rules=['name'=>'required','username'=>'required','email'=>'required|email','pwd'=>'required'];

      $validasi=Validator::make(Input::only('name','username','email','pwd'),$rules);


      if ($validasi->passes()) {
        $user=new user();
        $username=input::get('username');
        $user->username=$username;
        $user->email=input::get('email');
        $user->nama=input::get('name');
        $user->password=bcrypt(input::get('pwd'));
        // $user->role_id=DB::table('roles')->select('id')->where('nama_role','user')->first();
        // $user=compact('user');
        $user->role_id=1;
        $user->save();
        $id_user=DB::table('users')->where('username','=',$username)->select('id')->get();
        DB::table('dataPelanggan')->insert(['id_user'=>$id_user[0]->id]);
        // $success='';
        // dd($user);
          return view('login.formLogin',['success'=>'registration success']);
      }

      else {
        return view('register.formRegister')->withErrors($validasi->errors());
      }

    }
}
