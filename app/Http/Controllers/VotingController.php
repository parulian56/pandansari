<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
    {
        // ambil semua calon untuk ditampilkan di halaman coblos
        $calons = Calon::all();
        return view('coblos.index', compact('calons'));
    }

    public function vote(Calon $calon)
    {
        // cek biar 1 user / masyarakat cuma bisa milih sekali
        if (Vote::where('masyarakat_id', auth()->id())->exists()) {
            return redirect()->route('coblos.index')
                ->with('error', 'Anda sudah mencoblos!');
        }

        // simpan suara
        Vote::create([
            'calon_id' => $calon->id,
            'masyarakat_id' => auth()->id(), // ganti kalau login beda (misal pakai NIK)
        ]);

        return redirect()->route('coblos.index')
            ->with('success', 'Suara berhasil disimpan!');
    }
}
