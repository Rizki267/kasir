<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //memanggil data dari table kategori
        $kategori = Kategori::all();
        //query untuk memanggil data dari table Produk
        $data['produk'] = Produk::all();
        // dd($data);
        // die();
        //manampilkan halaman Produk dan mengirim data kategori ke view
        return view('admin.produk', compact('kategori'), $data);
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
        //$produk diisi dengan objek dari ambil produk
        //$produk->nama_produk diisi dengan nama field di table
        //$produk->nama_produk diisi sesuai dengan nama pada input form
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->Kategori_id = $request->Kategori_id;
        $produk->save();

        return redirect('/admin/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //mengambil data dari form edit
        $produk = Produk::findOrFail($id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->Kategori_id = $request->Kategori_id;
        $produk->save();

        return redirect('/admin/produk');
    }

    public function cetak_produk()
    {
        //ambil data produk dari database
        $produk = Produk::with('kategori')->get();

        //load view cetak dan ubah menjadi pdf
        $pdf = PDF::loadView('admin.cetak.produk_cetak',compact('produk'))->setPaper('A4','potrait');

        return $pdf->stream('laporan-produk.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //menghapus data berdasarkan id
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect('/admin/produk');
    }
}
