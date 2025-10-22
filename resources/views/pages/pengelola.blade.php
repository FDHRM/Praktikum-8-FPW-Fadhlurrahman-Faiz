@extends('layouts.app')

@section('content')
    <h1>Welcome to Pengelola Page</h1>
    <div>
        <a href="/tambah-pengelola"><button>tambah pengelola</button></a>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan Pengelola</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @if ($data == 'null')
                <td>Tidak ada data</td>
            @else
                @foreach($data as $pengelola)
                    <tr>
                        <td>{{ $pengelola->nama }}</td>
                        <td>{{ $pengelola->umur }}</td>
                        <td>{{ $pengelola->jenis_kelamin }}</td>
                        <td>{{ $pengelola->jabatanPengelola ? $pengelola->jabatanPengelola->nama_jabatan : 'Tidak ada jabatan' }}</td>
                        <td><a href="/edit-pengelola/{{ $pengelola->id }}"><button>Edit</button></a>
                            <form action="/hapus-pengelola/{{ $pengelola->id }}" method="post" style="display:inline;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection