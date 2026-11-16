@extends('layouts.app-bootstrap')

@section('judul', 'Detail Alat')

@section('konten')
    <h2 class="mb-4">Detail Alat</h2>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <tbody>
                <tr>
                    <th class="table-light">Kode</th>
                    <td>{{ $alat->kode }}</td>
                </tr>
                <tr>
                    <th class="table-light">Nama</th>
                    <td>{{ $alat->nama }}</td>
                </tr>
                <tr>
                    <th class="table-light">Stok</th>
                    <td>
                        @if ($alat->stok == 0)
                            <strong class="text-danger">
                                {{ $alat->stok }}
                            </strong>
                        @else
                            {{ $alat->stok }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="table-light">Kondisi</th>
                    <td>{{ $alat->kondisi }}</td>
                </tr>
                <tr>
                    <th class="table-light">Lokasi</th>
                    <td>{{ $alat->lokasi }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('alat.edit', $alat) }}" class="btn btn-warning">
        Ubah
    </a>

    <a href="{{ route('alat.index') }}" class="btn btn-secondary">
        Kembali
    </a>
@endsection