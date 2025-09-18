<!-- Modal -->
<div class="modal fade" id="ubahproduk{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/ubah_produk/{{ $data->id }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ $data->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga"
                            value="{{ $data->harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok"
                            value="{{ $data->stok }}" required>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-2">
                            <label for="Kategori_id">Kategori</label>
                        </div>
                        <div class="col-md-10">
                            <select name="Kategori_id" id="Kategori_id" class="form form-control">
                                <option value="" disabled>Pilih kategori.......</option>
                                @foreach ($kategori as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $data->id == $data->Kategori_id ? 'selected' : '' }}>
                                        {{ $data->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

    </div>
