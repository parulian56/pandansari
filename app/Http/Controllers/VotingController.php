<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    // Halaman daftar calon untuk dicoblos
    public function index()
    {
        $calons = Calon::all(); // ambil semua calon
        return view('voting.index', compact('calons'));
    }

    // Proses vote
    public function vote(Request $request, Calon $calon)
    {
        $user = Auth::user();

        // Cek apakah user sudah pernah coblos
        if ($user->sudah_vote) {
            return redirect()->route('voting.index')->with('error', 'Kamu sudah memilih!');
        }

        // Tambah 1 ke suara calon
        $calon->increment('jumlah_suara');

        // Tandai user sudah coblos
        $user->sudah_vote = true;
        $user->save();

        return redirect()->route('voting.index')->with('success', 'Terima kasih sudah memilih!');
    }
}
