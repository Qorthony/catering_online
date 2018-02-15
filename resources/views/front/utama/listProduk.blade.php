@extends('front.utama.index')


@section('list')

<div class="row">
  @if(count($lists)>0)
  @foreach($lists as $list)
        <div class="col-lg-3 col-sm-6 portfolio-item">
          <div class="card h-100" style="box-shadow: 15px 15px 10px -16px;">
            <a href="#"  data-toggle="modal" data-target="#largeModal-{{$list->id_produk}}"><img class="card-img-top" src="{{asset($list->gambar)}}" height="250" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"  data-toggle="modal" data-target="#largeModal-{{$list->id_produk}}">{{$list->nama_produk}}</a>
              </h4>
              <p class="card-text">Rp. {{$list->harga}}</p>
              <button type="button" class="btn btnku" name="button" data-toggle="modal" data-target="#largeModal-{{$list->id_produk}}">Pesan</button>
            </div>
          </div>
        </div>

        <!-- Large Size -->
                    <div class="modal fade" id="largeModal-{{$list->id_produk}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="largeModalLabel">Produk Detail</h4>
                                </div>
                                <div class="modal-body">
                                  <form action="{{url('/order')}}" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="id_produk" class="form-control"value="{{$list->id_produk}}">
                                    @if(Auth::user())
                                    <input type="hidden" name="id_pelanggan" class="form-control"value="{{Auth::user()->id}}">
                                    @endif


                                    <!-- Portfolio Item Row -->
                                          <div class="row">

                                            <div class="col-md-8">
                                              <img class="img-fluid" src="{{asset($list->gambar)}}" style="background-size:cover;height:300px;" alt="">
                                            </div>

                                            <div class="col-md-4">
                                              <h3 class="my-3">{{$list->nama_produk}}</h3>
                                              <p>Deskripsi: {{$list->description}}</p>
                                              <p>Harga Rp. {{$list->harga}}</p>


                                            </div>

                                          </div>
                                          <!-- /.row -->
                                          <div class="row">
                                            <div class="col-md-8">

                                              <label for="harga">No. Telpon</label>
                                              <div class="form-group">
                                                <div class="form-line">
                                                  <input type="text" class="form-control" name="telpon" value="">
                                                </div>
                                              </div>

                                              <label for="harga">Alamat</label>
                                              <div class="form-group">
                                                <div class="form-line">
                                                  <textarea class="form-control" name="alamat" rows="3" cols="50"></textarea>
                                                </div>
                                              </div>

                                            </div>
                                            <div class="col-md-4">


                                              <label for="harga">Tanggal kirim</label>
                                              <div class="form-group">
                                                <div class="form-line">
                                                  <input type="date" class="form-control" name="tanggal" value="">
                                                </div>
                                              </div>

                                              <label for="harga">Jumlah order</label>
                                              <div class="form-group">
                                                <div class="form-line">
                                                  <input type="number" id="jumlah" class="form-control" name="jumlah" min="1" value="1">
                                                </div>
                                              </div>

                                              <!-- <h3>Total Rp. <p id="total"></p></h3> -->


                                            </div>
                                          </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="order" class="btn btn-primary waves-effect">order</button>
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- <script type="text/javascript">
                    window.onload=function() {
                      var jumlah=document.getElementById('jumlah').Value;
                      var harga={{$list->harga}};
                      var total=document.getElementById('total').innerHTML=harga*jumlah;
                    }
                    </script> -->
    @endforeach
  @endif
  @if(count($lists)< 1)
  <div class="col-md-12 text-center" style="margin:20px 0;">
    <h2>Produk kosong</h2>
  </div>


  @endif

      </div>
      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

@endsection
