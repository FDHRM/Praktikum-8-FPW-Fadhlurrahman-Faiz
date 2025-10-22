@extends('layouts.app')

@section('content')
    <h1>Welcome to Edit Pengelola page</h1>
    <form action="/update-pengelola/{{$pengelola->id}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="">nama</label>
            <input type="text" name="nama" value="{{$pengelola->nama}}">
        </div>
        <div>
            <label for="">umur</label>
            <input type="number" name="umur" value="{{$pengelola->umur}}">
        </div>
        <div>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki" {{ $pengelola->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $pengelola->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div>
            <label for="">Jabatan Pengelola</label>
            <select name="jabatan_pengelola_id" required>
                <option value="">-- Pilih Jabatan</option>
                @foreach ($jabatanPengelola as $jabatan)
                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Ubah</button>
        </div>
    </form>
@endsection