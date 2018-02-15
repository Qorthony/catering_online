@extends('admin.admin')

@section('table_css')
<!-- JQuery DataTable Css -->
    <link href="{{asset('admina/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection


@section('content')



        <div class="container-fluid">
          <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PEMBAYARAN
                            </h2>
                            <ul class="header-dropdown m-r--5">
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
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php foreach ($pembayaran as $data): ?>
                                        <tr>
                                             <input type="hidden" name="id_kategori" value="<?php echo $data->id_pembayaran; ?>">

                                            <td> <?php echo $data->username; ?> </td>
                                            <td> <?php echo $data->nama_produk; ?> </td>
                                            <td> <?php echo $data->harga; ?> </td>
                                            <td> <?php echo $data->jumlah; ?> </td>
                                            <td> <?php echo $data->total; ?> </td>
                                            <td> <?php echo $data->status; ?> </td>
                                            <td> <a href="{{url('admin/kategori/edit/'.$data->id)}}"> <button type="button" class="btn bg-blue waves-effect">
                                              <i class="material-icons">mode_edit</i></button></a>
                                              <a href="{{url('admin/kategori/'.$data->id)}}"> <button type="button" class="btn bg-red waves-effect">
                                                <i class="material-icons">delete_sweep</i></button></a> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

        </div>


@endsection

@section('jquery')
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
