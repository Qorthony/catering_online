<?php

namespace App\Http\Controllers;

use App\User;
use App\order;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\pembayaran;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{

    public function home()
    {
      $list=DB::table('produk')->get();
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
      return view('front.utama.listProduk',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);
      }
      $kategoris=DB::table('kategori')->get();
      $order=DB::table('order')
            ->select(DB::raw('count(*) as jumlahOrder'))
            ->get();

      // $user=DB::table('dataPelanggan')->select('id_pelanggan')->where('id_user','=',$id)->get();
      return view('front.utama.listProduk',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);
    }

    public function order()
    {
      $id_pelanggan=Input::get('id_pelanggan');
      $id_produk=Input::get('id_produk');
      $jumlah=Input::get('jumlah');
      $alamat=Input::get('alamat');
      $tgl=Input::get('tanggal');
      $telp=Input::get('telpon');
      if (Auth::user())
      {
        $id=Auth::user()->id;
        $user=DB::table('dataPelanggan')->select('id_pelanggan')->where('id_user','=',$id)->get();
        $order=new order();
        $order->id_pelanggan=$user[0]->id_pelanggan;
        $order->id_produk=$id_produk;
        $order->jumlah=$jumlah;
        $order->alamat=$alamat;
        $order->no_telp=$telp;
        $order->tgl_order=$tgl;

        // dd($order);
        $order->save();
        return redirect('/');
      }
      return redirect('/login');

    }



    public function cancel()
    {
      if (Auth::user()) {

        $id_order=Input::get('id_order');

          $status=DB::table('order')->where('id','=',$id_order)->update(['status'=>'cancel']);
          Session::flash('orderGagal', 'Order Dibatalkan!');
          return redirect('/');
        }
        // Session::flash('message2', 'Saldo Anda tidak mencukupi!');
        return redirect('/');
    }

    public function listOrder()
    {

      if (Auth::user()) {
        $id=Auth::user()->id;
        $list=DB::table('order')
              ->join('produk','order.id_produk','=','produk.id_produk')
              ->join('dataPelanggan','dataPelanggan.id_pelanggan','=','order.id_pelanggan')
              ->join('users','users.id','=','dataPelanggan.id_user')
              ->select(DB::raw('*,order.id as id_order,sum(produk.harga)*order.jumlah as total'))
              ->where('status','<>','selesai')
              ->where('status','<>','cancel')
              ->where('id_user','=',$id)
              ->groupBy('order.id')
              ->get();

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
      return view('front.utama.listOrder',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);
    }
  }

  public function kategori($id)
  {
    $list=DB::table('kategori')
          ->join('produk','kategori.id_kategori','=','produk.id_kategori')
          ->where('produk.id_kategori','=',$id)
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
          return view('front.utama.listProduk',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);
          }
          $kategoris=DB::table('kategori')->get();
          $order=DB::table('order')
                ->select(DB::raw('count(*) as jumlahOrder'))
                ->get();

          // $user=DB::table('dataPelanggan')->select('id_pelanggan')->where('id_user','=',$id)->get();
          return view('front.utama.listProduk',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);

  }

  public function search()
  {
    $key=Input::get('search');
    $list=DB::table('produk')->where('nama_produk','like','%'.$key.'%')->get();
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
    return view('front.utama.listProduk',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);
    }
    $kategoris=DB::table('kategori')->get();
    $order=DB::table('order')
          ->select(DB::raw('count(*) as jumlahOrder'))
          ->get();

    // $user=DB::table('dataPelanggan')->select('id_pelanggan')->where('id_user','=',$id)->get();
    return view('front.utama.listProduk',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);
  }

  public function diterimaUser()
  {
    $id_order=Input::get('id_order');
    $upd=DB::table('pembayaran')->select('metode_pembayaran')->where('id_order','=',$id_order)->get();
    if ($upd[0]->metode_pembayaran=="transfer")
    {
      // $id_order=Input::get('id_order');
      // dd($id_order);
      $update=DB::table('order')->where('id','=',$id_order)->update(['status'=>'selesai']);

      Session::flash('diterima','pesanan sudah diterima');
      return redirect('/');
    }
    $id=Auth::user()->id;
    $id_order=Input::get('id_order');
    // dd($id_order);
    $list=DB::table('order')
          ->join('produk','order.id_produk','=','produk.id_produk')
          ->join('dataPelanggan','dataPelanggan.id_pelanggan','=','order.id_pelanggan')
          ->join('users','users.id','=','dataPelanggan.id_user')
          ->select(DB::raw('*,order.id as id_order,sum(produk.harga)*order.jumlah as total'))
          ->where('status','<>','selesai')
          ->where('status','<>','cancel')
          ->where('id_user','=',$id)
          ->groupBy('order.id')
          ->get();
    $saldo=Auth::user()->saldo;
    $total=Input::get('total');
    $sisa=$saldo-$total;
    $update=DB::table('order')->where('id','=',$id_order)->update(['status'=>'selesai']);
    $user=DB::table('users')->where('id','=',$id)->update(['saldo'=>$sisa]);

    Session::flash('diterima','pesanan sudah diterima');
    return redirect('/');
  }

  public function isiSaldo()
  {
    $list=DB::table('produk')->get();
    // $produk=DB::table('order')
    //       ->join('produk','order.id_produk','=','produk.id_produk')
    //       ->select(DB::raw('*,order.id as id_order,sum(produk.harga)*order.jumlah as total'))
    //       ->where('id','=',$id_order)
    //       ->get();

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
    return view('front.utama.isiSaldo',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);
    }
    $kategoris=DB::table('kategori')->get();
    $order=DB::table('order')
          ->select(DB::raw('count(*) as jumlahOrder'))
          ->get();
    return view('front.utama.isiSaldo',['produk'=>$produk,'lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);

  }

  public function konfirmasiSaldo()
  {

    $id=Auth::user()->id;
    if(Input::hasFile('file')){
     $file = Input::file('file');
     $file->move('uploads/saldo/', $file->getClientOriginalName());
     $gambar="uploads/buktiPembayaran/".$file->getClientOriginalName();

      $isi=DB::table('isi_saldo')->insert(['upload'=>$gambar,'id_user'=>$id,'status'=>'menunggu konfirmasi admin']);
      Session::flash('konfirmasi3', 'menunggu konfirmasi admin');
      return redirect('/');
      }

      Session::flash('konfirmasi2', 'GAMBAR GAGAL DI UPLOAD');
      return redirect('/');
  }

  public function catatanPembelian()
  {
    if (Auth::user()) {
      $id=Auth::user()->id;
      $list=DB::table('order')
            ->join('produk','order.id_produk','=','produk.id_produk')
            ->join('dataPelanggan','dataPelanggan.id_pelanggan','=','order.id_pelanggan')
            ->join('users','users.id','=','dataPelanggan.id_user')
            ->select(DB::raw('*,order.id as id_order,sum(produk.harga)*order.jumlah as total'))

            ->where('id_user','=',$id)
            ->groupBy('order.id')
            ->get();

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
    return view('front.utama.catatan',['lists'=>$list,'kategoris'=>$kategoris,'orders'=>$order]);
  }
  }


}
