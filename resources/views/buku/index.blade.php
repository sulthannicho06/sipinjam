@extends('layouts.app-bootstrap')

@section('judul', 'Daftar Buku')

@section('konten')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Buku</h2>

        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            + Tambah Buku
        </a>
    </div>

    @if (session('sukses'))
        <div class="alert alert-success">
            {{ session('sukses') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($buku as $b)
                    <tr>
                        <td>{{ $b->kode }}</td>
                        <td>{{ $b->judul }}</td>
                        <td>{{ $b->penulis }}</td>
                        <td>{{ $b->tahun_terbit }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('buku.show', $b) }}"
                                   class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('buku.edit', $b) }}"
                                   class="btn btn-warning btn-sm">
                                    Ubah
                                </a>

                                <form action="{{ route('buku.destroy', $b) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
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
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data buku.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="text-muted">Total buku: {{ $buku->total() }}</p>

    {{ $buku->links('pagination::bootstrap-5') }}
@endsection