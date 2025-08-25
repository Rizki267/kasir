@extends('layouts.mainLayout')

@section('title', 'Admin - Home')

@section('content')
    <h1>Selamat Datang Admin!</h1>
    <h2>Anda Login Sebagai : {{Auth::user()->nama_lengkap }}</h2>
    <h2>Email : {{Auth::user()->email }}</h2>
    <h2>Hak Akses : {{Auth::user()->hak_akses }}</h2>
@endsection
