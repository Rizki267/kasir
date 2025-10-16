<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;

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
        $data['total'] = $data['keranjang']->sum('subtotal');
        $data['kodeTransaksi'] = $this->kodeOtomatis();
        $data['jumlahItem'] = Keranjang::count();

        return view('admin.transaksi',$data);
    }

    public function kodeOtomatis()
    {
        $tanggal = date('Ymd');
        $dataHariIni = Transaksi::whereDate('tanggal_transaksi',today())->get();
        $maxNumber = 0;
        foreach ($dataHariIni as $item) {
            if (preg_match('/TRS(\d+)-/',$item->kode_transaksi,$matches)) {
                $angka = (int)$matches[1];
                if ($angka > $maxNumber) {
                    $maxNumber = $angka;
            }
        }
        // $query = Transaksi::selectRaw('MAX(RIGHT(kode_transaksi, 3)) as max_kode');
        // $kode = "001";
        // if ($query->count() > 0) {
        //     $data = $query->first();
        //     $number = ((int)$data->max_kode) + 1;
        //     $kode = sprintf("%03s", $number);
        // }
        // return 'TRS' . $kode;
        }

        $kode = sprintf("%03d", $maxNumber + 1);

        return 'TRS' . $kode . '-' . $tanggal;
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

    public function updateQty(Request $request, $id)
    {
        //Validasi input
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        //Temukan item di keranjang berdasarkan id
        $keranjang = Keranjang::findOrFail($id);
        //Update qty dan subtotal
        $keranjang->qty = $request->input('qty');
        $keranjang->subtotal = $keranjang->qty * $keranjang->harga;
        //Simpan perubahan
        $keranjang->save();
        //kembali ke halaman transaksi
        return redirect('/admin/transaksi');
    }

    public function simpanTransaksi(){
        $kodeTransaksi = $this->kodeOtomatis();
        $tanggalTransaksi = Carbon::now()->format('Y-m-d');
        $keranjang = Keranjang::all();
        $total = $keranjang->sum('subtotal');

        //Insert data transaksi ke database
        $transaksi = new Transaksi();
        $transaksi->kode_transaksi = $kodeTransaksi;
        $transaksi->tanggal_transaksi = $tanggalTransaksi;
        $transaksi->total = $total;
        $transaksi->save();

        foreach ($keranjang as $cart) {
            $detailTransaksi = new TransaksiDetail();
            $detailTransaksi->transaksi_id = $kodeTransaksi;
            $detailTransaksi->produk_id = $cart->produk_id;
            $detailTransaksi->qty = $cart->qty;
            $detailTransaksi->harga = $cart->harga;
            $detailTransaksi->subtotal = $cart->subtotal;
            $detailTransaksi->save();
        }
        Keranjang::truncate();

        //Kiriim response dalam format JSON
        return response()->json([
            'status' => 'success',
            'kode_transaksi' => $kodeTransaksi,
        ]);
    }

    public function cetak($kode_transaksi,Request $request)
    {
        $transaksi = Transaksi::where('kode_transaksi',$kode_transaksi)->firstOrFail();
        $detail = TransaksiDetail::with('produk')->where('transaksi_id',$kode_transaksi)->get();

        //Ambil tunai & kembali dari query string (tidak dari database)
        $tunai = $request->query('tunai',0);
        $kembali = $request->query('kembali',0);

        $pdf = PDF::loadView('admin.struk', compact('transaksi','detail','tunai','kembali'))->setPaper([0,0,250,600], 'potrait');

        return $pdf->stream('struk.pdf');
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
