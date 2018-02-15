@extends('front.index')

@section('judul')
Home
@endsection

@section('content')
  @include('front/slider')
  <div class="container" style="padding-top:20px;">

      <!-- Page Heading/Breadcrumbs -->
      <!-- <h1 class="mt-4 mb-3">Sidebar Page
        <small>Subheading</small>
      </h1> -->

      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol> -->
      <div class="col-md-6" style="margin:0 auto">
        <div class="card mb-4" >
          <!-- <h5 class="card-header">Search</h5> -->
             <div class="card-body">
               <form action="{{url('/search')}}" method="post">
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                 <div class="input-group">
                   <input type="text" name="search" class="form-control" placeholder="Search for...">
                   <span class="input-group-btn">
                   <button class="btn btn-secondary" name="searchbtn" type="submit">Go!</button>
                   </span>
                 </div>
               </form>

        </div>
        </div>
      </div>



      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <!-- <div class="col-lg-2 mb-4">
          @foreach($kategoris as $kategori)
          <div class="list-group">
            <a href="index.html" class="list-group-item">{{$kategori->nama_kategori}}</a>

          </div>
          @endforeach
        </div> -->
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
          @yield('list')
        </div>
      </div>
      <!-- /.row -->

    </div>

@endsection
