@extends('layouts.app')

@section('content')
    <h1>Welcome to Tambah Pengelola Page</h1>
    <form action="/simpan-pengelola" method="post">
        @csrf
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label for="umur">Umur:</label>
            <input type="number" id="umur" name="umur" required>
        </div>
        <div>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div>
            <label for="jabatan_pengelola_id">Jabatan:</label>
            <select id="jabatan_pengelola_id" name="jabatan_pengelola_id" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatanPengelola as $jabatan)
                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection