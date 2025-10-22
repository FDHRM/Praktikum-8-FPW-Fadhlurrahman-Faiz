@extends('layouts.app')

@section('content')
    <h1>Welcome to Buku page</h1>
    <div>
        <a href="/tambah-buku"><button>Tambah buku</button></a>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @if ($data == 'null')
                <td>Tidak ada data</td>
            @else
                @foreach ($data as $buku)
                    <tr>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->pengarang }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->kategoriBuku ? $buku->kategoriBuku->nama_kategori : 'Tidak ada kategori' }}</td>
                        <td>
                            <a href="/edit-buku/{{ $buku->id }}"><button>Edit</button></a>
                            <form action="/hapus-buku/{{ $buku->id }}" method="post" style="display:inline;"
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
