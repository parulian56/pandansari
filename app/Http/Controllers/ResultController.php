<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Tampilkan daftar hasil (index) dengan search & pagination.
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $results = Result::when($q, function($query, $q) {
                // ganti 'title' dengan kolom yang sesuai di tabelmu
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('result.index', compact('results', 'q'));
    }

    /**
     * Tampilkan form create.
     */
    public function create()
    {
        return view('result.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            // ganti rules sesuai kolommu
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'score' => 'nullable|numeric',
            // tambahkan field lain bila perlu
        ]);

        $result = Result::create($data);

        return redirect()->route('result.index')
                         ->with('success', 'Result berhasil dibuat.');
    }

    /**
     * Tampilkan detail satu hasil.
     */
    public function show(Result $result)
    {
        return view('result.show', compact('result'));
    }

    /**
     * Tampilkan form edit.
     */
    public function edit(Result $result)
    {
        return view('result.edit', compact('result'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, Result $result)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'score' => 'nullable|numeric',
        ]);

        $result->update($data);

        return redirect()->route('result.index')
                         ->with('success', 'Result berhasil diupdate.');
    }

    /**
     * Hapus data.
     */
    public function destroy(Result $result)
    {
        $result->delete();

        return redirect()->route('result.index')
                         ->with('success', 'Result berhasil dihapus.');
    }
}
