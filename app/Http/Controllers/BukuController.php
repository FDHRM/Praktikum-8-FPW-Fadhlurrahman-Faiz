<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\KategoriBuku;

class BukuController extends Controller
{
    public function index(){
        $data = Buku::with('KategoriBuku')->get();
        return view('pages.buku', compact('data'));
    }

    public function create(){
        $kategoriBuku = KategoriBuku::all();
        return view('pages.tambah-buku', compact('kategoriBuku'));
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'kategori_buku_id' => 'required|exists:kategori_buku,id',
        ]);

        Buku::create($validasi);
        return redirect('/buku');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        $kategoriBuku = KategoriBuku::all();
        return view('pages.edit-buku', compact('buku', 'kategoriBuku'));
    }

    public function update(Request $request, $id) {
        $validasi = $request->validate([
            'judul' => 'required|string|sometimes|max:255',
            'pengarang' => 'required|string|sometimes|max:255',
            'penerbit' => 'required|string|sometimes|max:255',
            'kategori_buku_id' => 'required|exists:kategori_buku,id',
        ]);

        Buku::where('id', $id)->update($validasi);
        return redirect('/buku');
    }

    public function destroy($id) {
        Buku::destroy($id);
        return redirect('/buku');
    }
}
