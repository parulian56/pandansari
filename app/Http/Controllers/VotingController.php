<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    // Halaman coblos
    public function index()
    {
        $calon = Calon::all(); // ambil semua calon
        return view('coblos.index', compact('calon'));
    }

    // Proses vote
    public function vote(Request $request, Calon $calon)
    {
        // Cek apakah user sudah pernah coblos
        if (Auth::user()->sudah_vote) {
            return redirect()->route('coblos.index')->with('error', 'Kamu sudah memilih!');
        }

        // Tambah 1 ke suara calon
        $calon->increment('jumlah_suara');

        // Tandai user sudah coblos
        $user = Auth::user();
        $user->sudah_vote = true;
        $user->save();

        return redirect()->route('coblos.index')->with('success', 'Terima kasih sudah memilih!');
    }
}
