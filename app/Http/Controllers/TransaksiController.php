<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //memanggil data dari table Produk
        $data['produk'] = Produk::all();
        //memanggil data dari table Keranjang
        $data['keranjang'] = Keranjang::all();
        $data['kodeTransaksi'] = $this->kodeOtomatis();

        return view('admin.transaksi',$data);
    }

    public function kodeOtomatis()
    {
        $query = Transaksi::selectRaw('MAX(RIGHT(kode_transaksi, 3)) as max_kode');
        $kode = "001";
        if ($query->count() > 0) {
            $data = $query->first();
            $number = ((int)$data->max_kode) + 1;
            $kode = sprintf("%03s", $number);
        }
        return 'TRS' . $kode;
    }

    public function add_cart($id)
    {
        $produk = Produk::findOrFail($id);
        //cek apakah kode produk sudah ada di tabel
        $keranjang = Keranjang::where('produk_id',$produk->id)->first();
        //jika keranjang == true /tidak NUll/produk ada
        if ($keranjang) {
            //jika produk sudah ada di keranjang, maka qty ditambah 1
            $keranjang->qty += 1;//Menambahkan qty
            $keranjang->subtotal = $keranjang->qty * $produk->harga;
        } else {
            //Jika produk belum ada di keranjang, maka buat data baru
            $keranjang = new Keranjang;
            $keranjang->produk_id = $produk->id;
            $keranjang->nama_produk = $produk->nama;
            $keranjang->harga = $produk->harga;
            $keranjang->qty = 1;
            $keranjang->subtotal = $keranjang->qty * $produk->harga;
        }
        //Simpan data ke tabel keranjang
        $keranjang->save();
        //kembali ke halaman transaksi
        return redirect('/admin/transaksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Temukan item di keranjang berdasarkan id
        $keranjang = Keranjang::findOrFail($id);
        //hapus data keranjang
        $keranjang->delete();
        //kembali ke halaman transaksi
        return redirect('/admin/transaksi');
    }
}
