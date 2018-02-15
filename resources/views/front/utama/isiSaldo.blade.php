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
        <li class="breadcrumb-item active">Isi Saldo</li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row" style="background-color:white;padding:20px 0;margin-bottom:100px;">

        <div class="col-md-4">
          <!-- <img class="img-fluid" src="http://placehold.it/750x500" alt=""> -->
          <h3 class="my-3">Detail transfer</h3>
          <ul>
            <li>Bank : BRI</li>
            <li>No. Rekening : 898965655546789</li>
            <li>Atas Nama : AHMAD QORTHONI NUR ARDHI</li>
          </ul>

        </div>

        <div class="col-md-8 text-center">
          <h3>SILAHKAN KONFIRMASI BUKTI PEMBAYARAN ANDA DI BAWAH INI</h3>
          <div class="col-md-4" style="margin:0 auto;">
            <form action="{{url('isiSaldo/konfirmasi')}}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
              <label for="">Upload</label>
              <div class="form-group">
                <input type="file" name="file" class="form-control">
              </div>

                <button type="submit" class="btn btnku wave-effects" name="konfirmasi">KONFIRMASI</button>
            </form>

          </div>
        </div>

      </div>
      <!-- /.row -->


  </div>
@endsection
