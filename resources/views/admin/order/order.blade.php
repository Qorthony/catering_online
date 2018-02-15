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
                                DATA ORDER
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
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <form action="{{url('admin/produk/edit')}}" method="post">
                                    <?php foreach ($order as $orders): ?>
                                      <tr>
                                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                           <input type="hidden" name="id_produk" value="<?php echo $orders->id; ?>">
                                           <td> <?php echo $orders->username; ?> </td>
                                          <td> <?php echo $orders->nama_produk; ?> </td>

                                          <td> <?php echo $orders->harga; ?></td>
                                          <td>
                                            <!-- <a href="{{url('admin/produk/edit/'.$orders->id_produk)}}"> -->
                                              <button type="submit" name="edit" value="edit" class="btn bg-blue waves-effect">
                                                <i class="material-icons">mode_edit</i>
                                              </button>
                                            <!-- </a> -->
                                            <a href="{{url('admin/produk/'.$orders->id_produk)}}"> <button type="button" class="btn bg-red waves-effect">
                                              <i class="material-icons">delete_sweep</i></button></a> </td>
                                      </tr>
                                    <?php endforeach; ?>
                                  </form>



                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
