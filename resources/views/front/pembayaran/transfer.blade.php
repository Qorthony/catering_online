@extends('front.utama.index')


@section('content')
<div class="container" >
<!-- Page Heading/Breadcrumbs -->
<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        <small>INVOICE</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Pembayaran</li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row" style="background-color:white;padding:20px 0;">

        <div class="col-md-8">
          <!-- <img class="img-fluid" src="http://placehold.it/750x500" alt=""> -->
          <h3 class="my-3">Informasi Pembayaran</h3>
          <p>Untuk pembayaran melalui transfer ATM sementara ini kami hanya menyediakan Rekening Bank BRI.Dan untuk waktu pembayaran kami hanya batasi dengan jangka waktu 1x 24 jam.
            apabila anda belum melakukan pembayaran dalam jangka waktu yang telah ditentukan maka kami anggap pemesanan anda dibatalkan.
          </p>

        </div>

        <div class="col-md-4">
          <h3 class="my-3">Detail transfer</h3>
          <ul>
            <li>Bank : BRI</li>
            <li>No. Rekening : 898965655546789</li>
            <li>Atas Nama : AHMAD QORTHONI NUR ARDHI</li>
            <li>Nama Produk : {{$produk[0]->nama_produk}}</li>
            <li>Jumlah Order : {{$produk[0]->jumlah}}</li>
            <li>Harga per Item : Rp. {{$produk[0]->harga}}</li>
            <li>Total Harga : Rp. {{$produk[0]->total}}</li>
            <li>Jangka Waktu : 1x 24 jam</li>

          </ul>
        </div>

      </div>
      <!-- /.row -->
      <div class="row" style="padding:50px 0;border:5px solid #fff;margin:50px;background-color:white;">
        <div class="col-md-12 text-center">
          <h3>SILAHKAN KONFIRMASI BUKTI PEMBAYARAN ANDA DI BAWAH INI</h3>
          <div class="col-md-4" style="margin:0 auto;">
            <form action="{{url('konfirmasi/upload')}}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <input type="hidden" name="id_order" value="{{$produk[0]->id}}">
              <input type="hidden" name="total" value="{{$produk[0]->total}}">
              <label for="">Upload</label>
              <div class="form-group">
                <input type="file" name="file" class="form-control">
              </div>

                <button type="submit" class="btn btnku wave-effects" name="konfirmasi">KONFIRMASI</button>
            </form>

          </div>
        </div>
      </div>


  </div>
@endsection
