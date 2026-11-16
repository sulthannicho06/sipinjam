@extends('layouts.app-bootstrap')

@section('judul', 'Daftar Alat')

@section('konten')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Alat</h2>

        <a href="{{ route('alat.create') }}" class="btn btn-primary">
            + Tambah Alat
        </a>
    </div>

    @if (session('sukses'))
        <div class="alert alert-success">
            {{ session('sukses') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('alat.index') }}" method="GET" class="mb-4">
        <label for="cari" class="form-label">Cari nama alat</label>

        <div class="input-group">
            <input type="text" id="cari" name="cari"
                   class="form-control @error('cari') is-invalid @enderror"
                   value="{{ $cari }}"
                   placeholder="Masukkan nama alat">

            <button type="submit" class="btn btn-primary">Cari</button>

            <a href="{{ route('alat.index') }}"
               class="btn btn-outline-secondary">
                Reset
            </a>
        </div>

        @error('cari')
            <p class="text-danger mt-2">{{ $message }}</p>
        @enderror
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($alat as $a)
                    <tr>
                        <td>{{ $a->kode }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>
                            @if ($a->stok == 0)
                                <strong class="text-danger">
                                    {{ $a->stok }}
                                </strong>
                            @else
                                {{ $a->stok }}
                            @endif
                        </td>
                        <td>{{ $a->kondisi }}</td>
                        <td>{{ $a->lokasi }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('alat.show', $a) }}"
                                   class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('alat.edit', $a) }}"
                                   class="btn btn-warning btn-sm">
                                    Ubah
                                </a>

                                <form action="{{ route('alat.destroy', $a) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus alat ini?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Tidak ada data alat yang ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="text-muted">Jumlah hasil: {{ $alat->total() }}</p>

    {{ $alat->links('pagination::bootstrap-5') }}
@endsection