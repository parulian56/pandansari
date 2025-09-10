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

        // Upload foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_calon', 'public');
        }

        Calon::create($data);

        return redirect()->route('calon.index')->with('success', 'Data calon berhasil ditambahkan.');
    }
}
