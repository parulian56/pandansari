<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use Illuminate\Http\Request;

class CalonController extends Controller
{
    public function index()
    {
        $calons = Calon::all();
        return view('calon.index', compact('calons'));
    }

    public function create()
    {
        return view('calon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:calons',
            'nama_lengkap' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_calon', 'public');
        }

        Calon::create($data);

        return redirect()->route('calon.index')->with('success', 'Data calon berhasil ditambahkan.');
    }

    public function show($id)
    {
        $calon = Calon::findOrFail($id);
        return view('calon.show', compact('calon'));
    }

    public function edit($id)
    {
        $calon = Calon::findOrFail($id);
        return view('calon.edit', compact('calon'));
    }

    public function update(Request $request, $id)
    {
        $calon = Calon::findOrFail($id);

        $request->validate([
            'nik' => 'required|unique:calons,nik,' . $calon->id,
            'nama_lengkap' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_calon', 'public');
        }

        $calon->update($data);

        return redirect()->route('calon.index')->with('success', 'Data calon berhasil diupdate.');
    }

    public function destroy($id)
    {
        $calon = Calon::findOrFail($id);
        $calon->delete();

        return redirect()->route('calon.index')->with('success', 'Data calon berhasil dihapus.');
    }
}
