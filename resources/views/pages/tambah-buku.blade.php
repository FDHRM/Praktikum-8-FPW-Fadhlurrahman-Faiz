@extends('layouts.app')

@section('content')
    <h1>Welcome to Tambah Buku Page</h1>
    <form action="/simpan-buku" method="post">
        @csrf
        <div>
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" required>
        </div>
        <div>   
            <label for="pengarang">Pengarang:</label>
            <input type="text" id="pengarang" name="pengarang" required>
        </div>
        <div>
            <label for="penerbit">Penerbit:</label>
            <input type="text" id="penerbit" name="penerbit" required>  
        </div>
        <div>
            <label for="kategori_buku_id">Kategori Buku</label>
            <select name="kategori_buku_id" id="kategori_buku_id" required>
                <option value="">-- Pilih Kategori --</option>

                @forelse($kategoriBuku as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_buku_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @empty
                    <option disabled>Tidak ada kategori</option>
                @endforelse
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection