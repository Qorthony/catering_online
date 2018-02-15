@extends('front.utama.index')


@section('content')
<div class="container">
<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Catatan Order
        <!-- <small>Subheading</small> -->
      </h1>
      <div class="row" style="margin-bottom:20px;">
        <!-- <div class="col-md-12 text-right">
          <a href="{{url('/catatan_pembelian')}}" class="btn btn-warning wave-effects" style="color:white !important;">Catatan Pembelian</a>
        </div> -->
      </div>


      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio 1</li>
      </ol> -->

      <!-- Project One -->
      <div class="row" style="margin-bottom:300px;">
        <div class="body table-responsive">
                            <table class="table" style="background-color:#fff;">
                                <thead style="background-color:#F50057;color:white;">
                                    <tr>

                                        <th>NAMA PRODUK</th>
                                        <th>HARGA</th>
                                        <th>JUMLAH</th>
                                        <th>TOTAL</th>
                                        <th>STATUS</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($lists as $list): ?>
                                      <tr>

                                          <td>{{$list->nama_produk}}</td>
                                          <td>{{$list->harga}}</td>
                                          <td>{{$list->jumlah}}</td>
                                          <td>{{$list->total}}</td>
                                          <td>{{$list->status}}</td>


                                    <?php endforeach; ?>




                                </tbody>
                            </table>
                        </div>

      </div>
      <!-- /.row -->

      <hr>

      <!-- Project One -->
      <!-- <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Project One</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
          <a class="btn btn-primary" href="#">View Project
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div> -->
      <!-- /.row -->

      <!-- <hr> -->





    </div>
  </div>
@endsection
