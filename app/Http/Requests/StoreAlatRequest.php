<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $alat = $this->route('alat');

        return [
            'kode' => [
                'required',
                'string',
                'max:20',
                Rule::unique('alats', 'kode')->ignore($alat?->id),
            ],
            'nama' => ['required', 'string', 'min:3', 'max:100'],
            'stok' => ['required', 'integer', 'min:0'],
            'kondisi' => ['required', 'in:baik,rusak ringan,rusak berat'],
            'lokasi' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode alat wajib diisi.',
            'kode.string' => 'Kode alat harus berupa teks.',
            'kode.max' => 'Kode alat maksimal 20 karakter.',
            'kode.unique' => 'Kode alat sudah digunakan.',

            'nama.required' => 'Nama alat wajib diisi.',
            'nama.string' => 'Nama alat harus berupa teks.',
            'nama.min' => 'Nama alat minimal 3 karakter.',
            'nama.max' => 'Nama alat maksimal 100 karakter.',

            'stok.required' => 'Stok alat wajib diisi.',
            'stok.integer' => 'Stok harus berupa bilangan bulat.',
            'stok.min' => 'Stok tidak boleh kurang dari 0.',

            'kondisi.required' => 'Kondisi alat wajib dipilih.',
            'kondisi.in' => 'Kondisi alat tidak valid.',

            'lokasi.required' => 'Lokasi alat wajib diisi.',
            'lokasi.string' => 'Lokasi alat harus berupa teks.',
            'lokasi.max' => 'Lokasi alat maksimal 100 karakter.',
        ];
    }
}