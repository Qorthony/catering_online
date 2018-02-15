@extends('admin.admin')

@section('table_css')
<!-- JQuery DataTable Css -->
    <link href="{{asset('admina/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
            <!-- <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div> -->
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PRODUK
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                            <div style="text-align:right;">
                              <button type="button" class="btn btn-primary btn-lg" name="button" data-toggle="modal" data-target="#ModalAdd">
                                <i class="material-icons">add_circle_outline</i>
                                <span>ADD NEW</span>
                              </button>
                            </div>


                        </div>
                        <div class="body">


                          @include('admin/produk/modalAdd')
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                          <th>kategori</th>
                                          <th>Nama produk</th>
                                          <th>Harga</th>
                                          <th>Deskripsi</th>
                                          <th>Gambar</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>kategori</th>
                                          <th>Nama produk</th>
                                          <th>Harga</th>
                                          <th>Deskripsi</th>
                                          <th>Gambar</th>
                                          <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                      <form action="{{url('admin/produk/edit')}}" method="post">
                                        <?php foreach ($products as $product): ?>
                                          <tr>
                                              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                               <input type="hidden" name="id_produk" value="<?php echo $product->id_produk; ?>">
                                              <td>{{$product->nama_kategori}}</td>
                                              <td> <?php echo $product->nama_produk; ?></td>
                                              <td> <?php echo $product->harga; ?> </td>
                                              <td> <?php echo $product->description; ?> </td>
                                              <td> <img src="{{asset($product->gambar)}}" width="50" height="50" alt=""> </td>
                                              <td>
                                                  <button type="button" name="edit" value="edit" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#largeModal-{{$product->id_produk}}">
                                                    <i class="material-icons">mode_edit</i>
                                                  </button>
                                                <a href="{{url('admin/produk/'.$product->id_produk)}}"> <button type="button" class="btn bg-red waves-effect">
                                                  <i class="material-icons">delete_sweep</i></button></a> </td>
                                          </tr>

                                      </form>
                                      <!-- Large Size -->
                                                  <div class="modal fade" id="largeModal-{{$product->id_produk}}" tabindex="-1" role="dialog">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                <form action="{{url('admin/produk/edit')}}" method="post" enctype="multipart/form-data">
                                                                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                                  <input type="hidden" name="id" class="form-control" placeholder="nama kategori" value="{{$product->id_produk}}">


                                                                  <label for="nama_kategori">Kategori</label>
                                                                  <div class="form-group">
                                                                    <div class="form-line">
                                                                      <select class="form-control" name="kategori">
                                                                        @foreach($kategoris as $kategori)
                                                                          <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                                                        @endforeach
                                                                      </select>
                                                                    </div>
                                                                  </div>

                                                                  <label for="nama_kategori">Nama Produk</label>
                                                                  <div class="form-group">
                                                                    <div class="form-line">
                                                                      <input type="text" name="nama" class="form-control" placeholder="Nama Produk" value="{{$product->nama_produk}}">
                                                                    </div>
                                                                  </div>

                                                                  <label for="harga">Harga</label>
                                                                  <div class="form-group">
                                                                    <div class="form-line">
                                                                      <input type="text" name="harga" class="form-control" placeholder="Harga" value="{{$product->harga}}">
                                                                    </div>
                                                                  </div>

                                                                  <label for="harga">Deskripsi</label>
                                                                  <div class="form-group">
                                                                    <div class="form-line">
                                                                      <!-- <input type="text" name="desc"   value=""> -->
                                                                      <textarea name="desc" class="form-control no-resize" placeholder="Deskripsi" rows="4" cols="80">{{$product->description}}</textarea>
                                                                    </div>
                                                                  </div>

                                                                  <label for="gambar">Gambar</label>
                                                                  <div class="form-group">
                                                                    <div class="form-line">
                                                                      <input type="file" name="file" class="form-control" value="{{asset($product->gambar)}}">
                                                                    </div>
                                                                  </div>


                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="submit" name="update" class="btn btn-link waves-effect">SAVE CHANGES</button>
                                                                  <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                              </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('jquery_table')
<!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('admina/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admina/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('admina/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admina/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admina/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('admina/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('admina/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('admina/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admina/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{asset('admina/js/pages/tables/jquery-datatable.js')}}"></script>
@endsection
