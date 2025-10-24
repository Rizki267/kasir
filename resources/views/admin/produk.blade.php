@extends('layouts.mainLayout')

@section('title', 'Admin - Barang ')

@section('content')

    <h1>Ini halaman Produk</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahproduk">
        Tambah Barang
    </button>
    <a href="/produk/cetak" class="btn btn-success">Cetak</a>
    @include('admin.modal.produk_add')
    {{-- menampilkan data dari table kategori --}}
    <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->harga }}</td>
                    <td>{{ $data->stok }}</td>
                    <td>{{ $data->kategori->nama_kategori ?? '-' }}</td>
                    <td class="text-center"><button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#ubahproduk{{ $data->id }}">
                            Edit
                        </button>

                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusproduk{{ $data->id }}">
                            Hapus
                        </button>
                    </td>
                    @include('admin.modal.produk_edit')
                </tr>
                @include('admin.modal.produk_delete')
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th class="text-center">Aksi</th>
            </tr>
        </tfoot>
    </table>
            @include('admin.modal.produk_add')

        @endsection
