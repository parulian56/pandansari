<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('candidates', 'public');

        Candidate::create([
            'name'  => $validated['name'],
            'image' => $path,
        ]);

        return redirect()->route('candidate.index')->with('success', 'Candidate berhasil ditambahkan!');
    }

    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }

    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', compact('candidate'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('candidates', 'public');
            $validated['image'] = $path;
        }

        $candidate->update($validated);

        return redirect()->route('candidate.index')->with('success', 'Candidate berhasil diupdate!');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidate.index')->with('success', 'Candidate berhasil dihapus!');
    }
}
