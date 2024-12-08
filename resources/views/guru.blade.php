@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Guru</h1>

    {{-- Success and Error Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Button to Create a New Guru --}}
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Data Guru</a>

    {{-- Guru Table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($guru as $key => $g)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $g->nip }}</td>
                    <td>{{ $g->nama_guru }}</td>
                    <td>{{ $g->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $g->alamat }}</td>
                    <td>
                        {{-- Edit Button --}}
                        <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        {{-- Delete Form --}}
                        <form action="{{ route('guru.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data guru.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
