<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function cek_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        // dd($request);
        // die;

        if (Auth::attempt($credentials)) {
            //cek  user/email atau password benar/tersedia
            $request->session()->regenerate();
            //ambil data hak akses dari user yang login
            $hak_akses = Auth::user()->hak_akses;
            // dd($hak_akses);
            // die;
        }if ($hak_akses == 'admin') {
            //menampilkan halaman admin/home
            return redirect()->intended('/admin/home');
        }elseif ($hak_akses == 'kasir') {
            echo "<H1>Selamat Datang Kasir</H1>";
        }else {
            echo "Hak akses belum terdaftar";
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
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
    public function destroy(string $id)
    {
        //
    }
}
