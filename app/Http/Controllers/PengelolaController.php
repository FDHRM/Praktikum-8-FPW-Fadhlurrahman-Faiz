<?php

namespace App\Http\Controllers;

use App\Models\pengelola;
use Illuminate\Http\Request;
use App\Models\JabatanPengelola;

class PengelolaController extends Controller
{
    public function index()
    {
        $data = pengelola::with('JabatanPengelola')->get();
        return view('pages.pengelola', compact('data'));
    }

    public function create()
    {
        $jabatanPengelola = JabatanPengelola::all();
        return view('pages.tambah-pengelola', compact('jabatanPengelola'));
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'jabatan_pengelola_id' => 'required|exists:jabatan_pengelola,id',
        ]);

        pengelola::create($validasi);
        return redirect('/pengelola');
    }
    public function edit($id)
    {
        $pengelola = Pengelola::find($id);
        $jabatanPengelola = JabatanPengelola::all();
        return view('pages.edit-pengelola', compact('pengelola', 'jabatanPengelola'));
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'required|string|sometimes|max:255',
            'umur' => 'required|integer|sometimes|min:0',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'jabatan_pengelola_id' => 'required|exists:jabatan_pengelola,id',
        ]);

        Pengelola::where('id', $id)->update($validasi);
        return redirect('/pengelola');
    }

    public function destroy($id)
    {
        Pengelola::destroy($id);
        return redirect('/pengelola');
    }
}
