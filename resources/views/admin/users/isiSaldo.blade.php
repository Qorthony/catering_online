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
                                DATA USER
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
                                        <th>Username</th>
                                        <th>Upload</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <form action="{{url('admin/produk/edit')}}" method="post">
                                    <?php foreach ($lists as $list): ?>
                                      <tr>
                                           <input type="hidden" name="id_produk" value="<?php echo $list->id; ?>">

                                          <td> <?php echo $list->username; ?></td>
                                          <td> <img src="{{asset($list->upload)}}" width="100" height="100" alt="kosong">  </td>
                                          <td> <?php echo $list->status; ?> </td>
                                          <td>
                                            <a href="#"> <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#largeModal-{{$list->id_pengisian}}">
                                              <i class="material-icons">add</i></button></a>

                                      </tr>

                                  </form>
                                  <!-- Large Size -->
                                              <div class="modal fade" id="largeModal-{{$list->id_pengisian}}" tabindex="-1" role="dialog">
                                                  <div class="modal-dialog modal-lg" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h4 class="modal-title" id="largeModalLabel">tambah saldo</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form action="{{url('isiSaldo/add')}}" method="post">
                                                              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                              <input type="hidden" name="id_user" class="form-control"  value="{{$list->id}}">
                                                              <input type="hidden" name="asli" class="form-control"  value="{{$list->saldo}}">

                                                              <label for="harga">Saldo</label>
                                                              <div class="form-group">
                                                                <div class="form-line">
                                                                  <input type="number" name="saldo" class="form-control" placeholder="Saldo" value="">
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
