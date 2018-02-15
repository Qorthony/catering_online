@extends('admin.admin')

@section('content')


        <div class="container-fluid">
            <!-- <div class="block-header">
                <h2>
                    EDITABLE TABLE
                    <small>Taken from <a href="https://github.com/mindmup/editable-table" taget="_blank">github.com/mindmup/editable-table</a></small>
                </h2>
            </div> -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA KATEGORI
                                <!-- <small>You can edit any columns except header/footer</small> -->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('admin/produk/edit')}}">EditProduk</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  <form action="{{url('admin/kategori/add')}}" method="post">
                                    <tr>
                                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                        <td> <input type="text" name="nama_kategori" value=""> </td>
                                        <td>
                                          <button type="submit" name="tambah"  value="tambah" class="btn bg-orange waves-effect">
                                            <i class="material-icons">save</i>
                                            <span>Tambah</span>
                                          </button>
                                          <!-- <input type="submit" name="tambah" value="tambah"></td> -->
                                    </tr>
                                  </form>
                                  <form action="{{url('admin/kategori/edit')}}" method="post">
                                    <?php foreach ($kategori as $kategoris): ?>
                                      <tr>

                                          <td><?php echo $kategoris->nama_kategori; ?> </td>
                                          <td> <a href="#"> <button type="button" class="btn bg-blue waves-effect"  data-toggle="modal" data-target="#largeModal-{{$kategoris->id_kategori}}">
                                            <i class="material-icons">mode_edit</i></button></a>
                                            <a href="{{url('admin/kategori/'.$kategoris->id_kategori)}}"> <button type="button" class="btn bg-red waves-effect">
                                              <i class="material-icons">delete_sweep</i></button></a> </td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                      </tr>

                                  </form>

                                  <!-- Large Size -->
                                              <div class="modal fade" id="largeModal-{{$kategoris->id_kategori}}" tabindex="-1" role="dialog">
                                                  <div class="modal-dialog modal-lg" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form action="{{url('admin/kategori/edit')}}" method="post">
                                                              <label for="email_address">Nama Kategori</label>
                                                              <div class="form-group">
                                                                <div class="form-line">
                                                                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                                  <input type="hidden" name="id" class="form-control" placeholder="nama kategori" value="{{$kategoris->id_kategori}}">
                                                                  <input type="text" name="nama" class="form-control" placeholder="nama kategori" value="{{$kategoris->nama_kategori}}">
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


                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
