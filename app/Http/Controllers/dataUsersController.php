<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class dataUsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:admin');
    }
    public function getUsers()
    {
      $user=DB::table('users')->where('role_id','<>',2)->get();
      return view('admin.users.users',['users'=>$user]);
    }

    public function editUser()
    {
      $id=Input::get('id');
      $username=Input::get('username');
      $email=Input::get('email');
      $nama=Input::get('nama');
      $saldo=Input::get('saldo');
      $update=DB::table('users')->where('id','=',$id)
              ->update(['username'=>$username,'email'=>$email,'nama'=>$nama,'saldo'=>$saldo]);
      return redirect('admin/users');
    }

    public function listSaldo()
    {
      $list=DB::table('isi_saldo')->join('users','isi_saldo.id_user','=','users.id')->get();
      return view('admin.users.isiSaldo',['lists'=>$list]);
    }

    public function addSaldo()
    {
      $saldo=Input::get('saldo');
      $id_user=Input::get('id_user');
      $saldoAwal=Input::get('asli');
      $hasil=$saldoAwal+$saldo;
      DB::table('users')->where('id','=',$id_user)->update(['saldo'=>$hasil]);
      return redirect('/admin/users');
    }
}
