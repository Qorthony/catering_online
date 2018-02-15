@extends('front.utama.index')


@section('content')
<div class="container">
<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">List Order
        <!-- <small>Subheading</small> -->
      </h1>
      <div class="row" style="margin-bottom:20px;">
        <div class="col-md-12 text-right">
          <a href="#" class="btn btn-warning wave-effects" style="color:white !important;">Catatan Pembelian</a>
        </div>
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
                                        <th>ACTION</th>
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

                                          <td>
                                            <?php if ($list->status=="pesanan sedang dikirim")
                                            { ?>
                                              <form action="{{url('/konfirmasi/diterimaUser')}}" method="post">
                                                <input type="hidden" name="id_order" value="{{$list->id_order}}">
                                                <input type="hidden" name="total" value="{{$list->total}}">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <button type="submit" class="btn btn-info btn-sm" name="diterima">Diterima</button>
                                              </form>
                                            <?php
                                          }
                                          else {
                                            ?>
                                            @if($list->status<>"menunggu konfirmasi admin")
                                             <button type="button" class="btn btn-primary btn-sm" name="bayar" data-toggle="modal" data-target="#smallModal-{{$list->id_order}}">Bayar</button>
                                              @endif
                                            </form>
                                              <form action="{{url('/order/cancel')}}" method="post">
                                                <input type="hidden" name="id_order" value="{{$list->id_order}}">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <button type="submit" class="btn btn-danger btn-sm" name="cancel">Cancel</button>
                                              </form>
                                            <?php
                                          }?>


                                          </td>
                                      </tr>
                                      <div class="modal fade" id="smallModal-{{$list->id_order}}" tabindex="-1" role="dialog">
                                                      <div class="modal-dialog modal-sm" role="document">
                                                          <div class="modal-content text-center">
                                                              <!-- <div class="modal-header">
                                                                  <h4 class="modal-title" id="smallModalLabel">Modal title</h4>
                                                              </div> -->
                                                              <div class="modal-body">
                                                                  Metode Pembayaran?
                                                              </div>
                                                              <div class="modal-footer text-center">

                                                                  <a href="{{url('/bayar/transfer/'.$list->id_order)}}" class="btn btn-primary btn-sm" name="transfer">Transfer</a>

                                                              <form action="{{url('/bayar/saldo')}}" method="post">
                                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                                <input type="hidden" name="id_order" value="{{$list->id_order}}">
                                                                <input type="hidden" name="total" value="{{$list->total}}">
                                                                <button type="submit" class="btn btn-info btn-sm" name="COpay">Saldo</button>
                                                            </form>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
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
