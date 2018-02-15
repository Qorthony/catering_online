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

      <!-- /.row -->
      <div class="row" style="padding:50px 0;border:5px solid #fff;margin-top:50px;margin-bottom:150px;background-color:white;">
        <div class="col-md-12 text-center">
          <h3>KONFIRMASI PEMBAYARAN BERHASIL</h3>
          <div class="col-md-4" style="margin:0 auto;">
            <a href="{{url('/order/list')}}">Kembali</a>

          </div>
        </div>
      </div>

  </div>
@endsection
