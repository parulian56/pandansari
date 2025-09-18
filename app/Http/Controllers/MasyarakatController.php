<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    // ✅ Menampilkan daftar masyarakat
    public function index()
    {
        $masyarakats = Masyarakat::all();
        return view('data-people', compact('masyarakats'));
    }

    // ✅ Menyimpan data masyarakat baru
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:masyarakats,nik',
            'kk' => 'required',
            'nama_lengkap' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
            'rt' => 'nullable',
        ]);

        Masyarakat::create($request->all());

        return back()->with('success', 'Data masyarakat berhasil ditambahkan!');
    }
}
