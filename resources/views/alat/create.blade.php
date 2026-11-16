@extends('layouts.app-bootstrap')

@section('judul', 'Tambah Alat')

@section('konten')
    <h2 class="mb-4">Tambah Alat</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alat.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kode" class="form-label">Kode alat</label>
            <input type="text" id="kode" name="kode"
                   class="form-control"
                   value="{{ old('kode') }}">
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama alat</label>
            <input type="text" id="nama" name="nama"
                   class="form-control"
                   value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" id="stok" name="stok"
                   class="form-control"
                   value="{{ old('stok', 0) }}">
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select id="kondisi" name="kondisi" class="form-select">
                @foreach (['baik', 'rusak ringan', 'rusak berat'] as $kondisi)
                    <option value="{{ $kondisi }}"
                        @selected(old('kondisi', 'baik') === $kondisi)>
                        {{ ucfirst($kondisi) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="lokasi" class="form-label">Lokasi alat</label>
            <input type="text" id="lokasi" name="lokasi"
                   class="form-control"
                   value="{{ old('lokasi') }}"
                   placeholder="Contoh: Lemari A">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('alat.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
@endsection