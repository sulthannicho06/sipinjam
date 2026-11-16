@extends('layouts.app-bootstrap')

@section('judul', 'Detail Buku')

@section('konten')
    <h2 class="mb-4">Detail Buku</h2>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <tbody>
                <tr>
                    <th class="table-light">Kode buku</th>
                    <td>{{ $buku->kode }}</td>
                </tr>
                <tr>
                    <th class="table-light">Judul</th>
                    <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                    <th class="table-light">Penulis</th>
                    <td>{{ $buku->penulis }}</td>
                </tr>
                <tr>
                    <th class="table-light">Tahun terbit</th>
                    <td>{{ $buku->tahun_terbit }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('buku.edit', $buku) }}" class="btn btn-warning">
        Ubah
    </a>

    <a href="{{ route('buku.index') }}" class="btn btn-secondary">
        Kembali
    </a>
@endsection