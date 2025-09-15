@extends('layouts.mainLayout')

@section('title', 'Admin - kategori ')

@section('content')

        <h1>Ini halaman Kategori</h1>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkategori">
  Tambah Kategori
</button>

 {{-- menampilkan data dari table kategori --}}
    <table class="table table-dark table-striped mt-3">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th class="text-center">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($kategori as $data)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$data->nama_kategori}}</td>
        <td>{{$data->deskripsi}}</td>
        <td class="text-center"><button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#ubahkategori{{$data->id}}">
            Edit
            </button>

            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapuskategori">
            Hapus
            </button>
        </td>
    </tr>
    @include('admin.modal.kategori_edit')
    @endforeach
    </tbody>
    <tfoot>
        <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th class="text-center">Aksi</th>
        </tr>
    </tfoot>
</table>

        @include('admin.modal.kategori_add')



@endsection
