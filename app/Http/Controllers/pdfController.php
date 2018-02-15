<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class pdfController extends Controller
{
  public function downloadPDF()
  {
    $order=DB::table('order')
          ->join('dataPelanggan','dataPelanggan.id_pelanggan','=','order.id_pelanggan')
          ->join('produk','produk.id_produk','=','order.id_produk')
          ->join('users','users.id','=','dataPelanggan.id_user')
          ->offset(10)
          ->limit(5)
          ->get();
      $pdf = PDF::loadView('orderPdf',['order'=>$order]);
      return $pdf->download('order.pdf');
  }
}
