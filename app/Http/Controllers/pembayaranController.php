<?php

namespace App\Http\Controllers;

use App\pembayaran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class pembayaranController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:admin');
    }
    public function getPembayaran()
    {
      $pembayaran=DB::table('pembayaran')
                ->join('order','order.id','=','pembayaran.id_order')
                ->join('produk','produk.id_produk','=','order.id_produk')
                ->join('dataPelanggan','dataPelanggan.id_pelanggan','=','order.id_pelanggan')
                ->join('users','users.id','=','dataPelanggan.id_user')
                ->select(DB::raw('*,sum(produk.harga) as jBelanja,sum(produk.harga)*order.jumlah as total'))
                ->groupBy('id_order')
                ->get();
      // dd($pembayaran);
      // $total=$pembayaran->jumlah*$pembayaran->jBelanja;


      return view('admin.pembayaran.pembayaranBaru',['pembayaran'=>$pembayaran]);
    }

    public function deletePembayaran($id)
    {
      $data['id']=$id;
      DB::table('pembayaran')->where('id_pembayaran','=',$data['id'])->delete();
      return redirect('admin/pembayaran');
    }

    public function diterima()
    {
      $id_order=Input::get('id_order');
      $update=DB::table('order')->where('id','=',$id_order)->update(['status'=>'pesanan sedang dikirim']);
      return redirect('/admin/pembayaran');
    }




}
