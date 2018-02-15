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
                                        <li><a href="{{url('/isiSaldo/list')}}">Daftar Pengisian</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Nama</th>
                                        <th>Saldo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <form action="{{url('admin/produk/edit')}}" method="post">
                                    <?php foreach ($users as $user): ?>
                                      <tr>
                                           <input type="hidden" name="id_produk" value="<?php echo $user->id; ?>">

                                          <td> <?php echo $user->username; ?></td>
                                          <td> <?php echo $user->email; ?> </td>
                                          <td> <?php echo $user->nama; ?> </td>
                                          <td> <?php echo $user->saldo; ?> </td>
                                          <td>
                                            <a href="#"> <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#largeModal-{{$user->id}}">
                                              <i class="material-icons">add</i></button></a>
                                            <a href="#"> <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#largeModal-{{$user->id}}">
                                            <i class="material-icons">mode_edit</i></button></a>
                                            <a href="{{url('admin/produk/'.$user->id)}}"> <button type="button" class="btn bg-red waves-effect">
                                              <i class="material-icons">delete_sweep</i></button></a> </td>
                                      </tr>

                                  </form>
                                  <!-- Large Size -->
                                              <div class="modal fade" id="largeModal-{{$user->id}}" tabindex="-1" role="dialog">
                                                  <div class="modal-dialog modal-lg" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form action="{{url('admin/users/edit')}}" method="post">
                                                              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                              <input type="hidden" name="id" class="form-control" placeholder="nama kategori" value="{{$user->id}}">

                                                              <label for="harga">Username</label>
                                                              <div class="form-group">
                                                                <div class="form-line">
                                                                  <input type="text" name="username" class="form-control" placeholder="Username" value="{{$user->username}}">
                                                                </div>
                                                              </div>

                                                              <label for="harga">Email</label>
                                                              <div class="form-group">
                                                                <div class="form-line">
                                                                  <input type="text" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                                                                </div>
                                                              </div>

                                                              <label for="harga">Nama</label>
                                                              <div class="form-group">
                                                                <div class="form-line">
                                                                  <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$user->nama}}">
                                                                </div>
                                                              </div>

                                                              <label for="harga">Saldo</label>
                                                              <div class="form-group">
                                                                <div class="form-line">
                                                                  <input type="number" name="saldo" class="form-control" placeholder="Saldo" value="{{$user->saldo}}">
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
