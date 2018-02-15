@if (Session::has('message1'))
    <div class="alert bg-teal alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('message1') }}
    </div>
@endif
@if (Session::has('message2'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('message2') }}
</div>
@endif
@if (Session::has('orderGagal'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('orderGagal') }}
</div>
@endif
@if (Session::has('konfirmasi3'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('konfirmasi3') }}
</div>
@endif
@if (Session::has('konfirmasi2'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('konfirmasi2') }}
</div>
@endif
<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color:#F50057;">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">CateringOnline.com</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKategori" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownKategori">
            <?php foreach ($kategoris as $kategori): ?>
              <a class="dropdown-item" href="{{url($kategori->link_kategori)}}">{{$kategori->nama_kategori}}</a>
            <?php endforeach; ?>

          </div>
        </li>
        @if(Auth::user())
        <li class="nav-item">

            <a class="nav-link" href="{{url('order/list')}}">Order
              <?php foreach ($orders as $order): ?>
              (<?php echo $order->jumlahOrder; ?>)
              <?php endforeach; ?>
            </a>


        </li>
        @endif
        @if(Auth::user())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->username}}</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUser">
            <a class="dropdown-item" href="#">Saldo: {{Auth::user()->saldo}}</a>
            <a class="dropdown-item" href="{{url('/isiSaldo')}}">Isi Saldo</a>
            <a class="dropdown-item" href="{{url('/logout')}}"><button type="button" class="btn btn-primary btn-sm wave-effect" name="button">Log Out</button></a>
          </div>
        </li>
        @endif

        @if(!Auth::user())
        <li class="nav-item">
          <a class="nav-link" href="{{url('/login')}}"><button type="button" style="background-color:white;color:crimson;border:white;" class="btn btn-primary btn-sm wave-effect" name="button">Log In</button></a>
      </li>
        @endif


      </ul>
    </div>
  </div>
</nav>
