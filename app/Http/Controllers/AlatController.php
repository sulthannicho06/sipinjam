<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlatRequest;
use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $validated = $request->validate([
        'cari' => ['nullable', 'string', 'max:100'],
    ], [
        'cari.string' => 'Pencarian harus berupa teks.',
        'cari.max' => 'Pencarian maksimal 100 karakter.',
    ]);

    $cari = trim($validated['cari'] ?? '');

    $alat = Alat::query()
        ->when($cari !== '', function ($query) use ($cari) {
            $query->where('nama', 'like', '%' . $cari . '%');
        })
        ->orderBy('kode')
        ->paginate(10)
        ->withQueryString();

    return view('alat.index', compact('alat', 'cari'));
}
    public function create()
{
    return view('alat.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlatRequest $request)
{
    Alat::create($request->validated());

    return redirect()
        ->route('alat.index')
        ->with('sukses', 'Alat berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Alat $alat)
{
    return view('alat.show', compact('alat'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alat $alat)
{
    return view('alat.edit', compact('alat'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAlatRequest $request, Alat $alat)
{
    $alat->update($request->validated());

    return redirect()
        ->route('alat.index')
        ->with('sukses', 'Alat berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alat $alat)
{
    if ($alat->peminjaman()->exists()) {
        return redirect()
            ->route('alat.index')
            ->with('error', 'Alat tidak dapat dihapus karena memiliki riwayat peminjaman.');
    }

    $alat->delete();

    return redirect()
        ->route('alat.index')
        ->with('sukses', 'Alat berhasil dihapus.');
}
}
