<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Produk</title>
</head>
<body>
    <div class="header">
        <h2>Laporan Data Produk</h2>
        <p>Dicetak pada: {{\Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y, H:i')}}</p>
    </div>

    <table class="table table-dark table-striped mt-3">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($produk as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->nama }}</td>
                <td>Rp {{ number_format( $data->harga, 0,',','.')}}</td>
                <td>{{ $data->stok }}</td>
                <td>{{ $data->kategori->nama_kategori ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
