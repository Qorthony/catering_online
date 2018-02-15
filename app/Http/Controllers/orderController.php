<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class orderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:admin');
    }
    public function getOrder()
    {
      $order=DB::table('order')
            ->join('dataPelanggan','dataPelanggan.id_pelanggan','=','order.id_pelanggan')
            ->join('produk','produk.id_produk','=','order.id_produk')
            ->join('users','users.id','=','dataPelanggan.id_user')
            ->get();
      return view('admin.order.order',['order'=>$order]);
    }
}
