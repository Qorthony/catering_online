<?php

namespace App\Http\Controllers;

use App\User;
use App\order;
use App\pembayaran;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class bayarController extends Controller
{
  public function bayarSaldo()
  {

    if (Auth::user()) {
      $saldo=Auth::user()->saldo;
      $id=Auth::user()->id;
      $id_order=Input::get('id_order');
      $total=Input::get('total');
      $sisa=$saldo-$total;
      if ($sisa>0) {
        $pembayaran=new pembayaran();
        $pembayaran->id_order=Input::get('id_order');
        $pembayaran->total_harga=Input::get('total');
        $pembayaran->metode_pembayaran="saldo";
        $pembayaran->save();
        // $user=DB::table('users')->where('id','=',$id)->update(['saldo'=>$sisa]);
        $status=DB::table('order')->where('id','=',$id_order)->update(['status'=>'menunggu konfirmasi admin']);
        Session::flash('message1', 'menunggu konfirmasi admin!');
        return redirect('/order/list');
      }
      Session::flash('message2', 'Saldo Anda tidak mencukupi!');
      return redirect('/');
    }

  }

  public function bayarTransfer($id_order)
  {
    $produk=DB::table('order')
          ->join('produk','order.id_produk','=','produk.id_produk')
          ->select(DB::raw('*,order.id as id_order,sum(produk.harga)*order.jumlah as total'))
          ->where('id','=',$id_order)
          ->get();
    if (Auth::user()) {
      $id=Auth::user()->id;

    // $pelanggan=DB::table('dataPelanggan')
    $kategoris=DB::table('kategori')->get();
    $order=DB::table('order')
          ->join('dataPelanggan','dataPelanggan.id_pelanggan','=','order.id_pelanggan')
          ->join('users','users.id','=','dataPelanggan.id_user')
          ->select(DB::raw('count(*) as jumlahOrder'))
          ->where('id_user','=',$id)
          ->where('status','<>','selesai')
          ->where('status','<>','cancel')
          ->groupBy('dataPelanggan.id_pelanggan')
          ->get();
    // dd($user[0]->id_pelanggan);
    return view('front.pembayaran.transfer',['produk'=>$produk,'kategoris'=>$kategoris,'orders'=>$order]);
    }
    $kategoris=DB::table('kategori')->get();
    $order=DB::table('order')
          ->select(DB::raw('count(*) as jumlahOrder'))
          ->get();

    // $user=DB::table('dataPelanggan')->select('id_pelanggan')->where('id_user','=',$id)->get();
    return view('front.pembayaran.transfer',['produk'=>$produk,'kategoris'=>$kategoris,'orders'=>$order]);
  }

  public function upload()
  {
    $pembayaran=new pembayaran();
    $id_order=Input::get('id_order');
    $pembayaran->id_order=$id_order;
    $pembayaran->total_harga=Input::get('total');

    if(Input::hasFile('file')){
     $file = Input::file('file');
     $file->move('uploads/buktiPembayaran/', $file->getClientOriginalName());
     $gambar="uploads/buktiPembayaran/".$file->getClientOriginalName();
      // dd($produk);
      $pembayaran->gambar_pembayaran=$gambar;
      $pembayaran->metode_pembayaran="transfer";
      $pembayaran->save();
      $update=DB::table('order')->where('id','=',$id_order)->update(['status'=>'menunggu konfirmasi admin']);
      Session::flash('konfirmasi1', 'KONFIRMASI PEMBAYARAN BERHASIL');
      return redirect('/konfirmasi/res');
      }
      $pembayaran->save();
      Session::flash('konfirmasi2', 'GAMBAR GAGAL DI UPLOAD');
      return redirect('/konfirmasi/res');
  }

  public function res()
  {
    if (Auth::user()) {
      $id=Auth::user()->id;

    // $pelanggan=DB::table('dataPelanggan')
    $kategoris=DB::table('kategori')->get();
    $order=DB::table('order')
          ->join('dataPelanggan','dataPelanggan.id_pelanggan','=','order.id_pelanggan')
          ->join('users','users.id','=','dataPelanggan.id_user')
          ->select(DB::raw('count(*) as jumlahOrder'))
          ->where('id_user','=',$id)
          ->where('status','<>','selesai')
          ->where('status','<>','cancel')
          ->groupBy('dataPelanggan.id_pelanggan')
          ->get();
    // dd($user[0]->id_pelanggan);
    return view('front.pembayaran.berhasil',['kategoris'=>$kategoris,'orders'=>$order]);
    }
    $kategoris=DB::table('kategori')->get();
    $order=DB::table('order')
          ->select(DB::raw('count(*) as jumlahOrder'))
          ->get();

    return view('front.pembayaran.berhasil',['kategoris'=>$kategoris,'orders'=>$order]);
  }

}
