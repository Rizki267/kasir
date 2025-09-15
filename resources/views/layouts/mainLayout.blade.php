<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    {{-- menu navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/home') ?
          'active' : ''}}" aria-current="page"
          href="/admin/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/kategori') ?
          'active' : ''}}" aria-current="page"
          href="/admin/kategori">Kategori</a>
        </li>
        <li class="nav-item">
           <a class="nav-link {{ Request::is('admin/produk') ?
          'active' : ''}}" href="/admin/produk">Barang</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" href="#">Transaksi</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" href="/logout">Logout</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-5">
    {{-- memanggil isi konten dari file lain --}}
    @yield('content')
    </div>

<script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>

</body>
</html>
