@extends('layouts.app-bootstrap')

@section('judul', 'Ubah Buku')

@section('konten')
    <h2 class="mb-4">Ubah Buku</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.update', $buku) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode" class="form-label">Kode buku</label>
            <input type="text" id="kode" name="kode"
                   class="form-control"
                   value="{{ old('kode', $buku->kode) }}">
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul buku</label>
            <input type="text" id="judul" name="judul"
                   class="form-control"
                   value="{{ old('judul', $buku->judul) }}">
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" id="penulis" name="penulis"
                   class="form-control"
                   value="{{ old('penulis', $buku->penulis) }}">
        </div>

        <div class="mb-4">
            <label for="tahun_terbit" class="form-label">
                Tahun terbit
            </label>
            <input type="number" id="tahun_terbit" name="tahun_terbit"
                   class="form-control"
                   value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Perubahan
        </button>

        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
@endsection