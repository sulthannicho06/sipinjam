<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBukuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $buku = $this->route('buku');

        return [
            'kode' => [
                'required',
                'string',
                'max:20',
                Rule::unique('bukus', 'kode')->ignore($buku?->id),
            ],
            'judul' => ['required', 'string', 'min:3', 'max:150'],
            'penulis' => ['required', 'string', 'max:100'],
            'tahun_terbit' => [
                'required',
                'integer',
                'between:1000,' . date('Y'),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode buku wajib diisi.',
            'kode.string' => 'Kode buku harus berupa teks.',
            'kode.max' => 'Kode buku maksimal 20 karakter.',
            'kode.unique' => 'Kode buku sudah digunakan.',

            'judul.required' => 'Judul buku wajib diisi.',
            'judul.string' => 'Judul buku harus berupa teks.',
            'judul.min' => 'Judul buku minimal 3 karakter.',
            'judul.max' => 'Judul buku maksimal 150 karakter.',

            'penulis.required' => 'Nama penulis wajib diisi.',
            'penulis.string' => 'Nama penulis harus berupa teks.',
            'penulis.max' => 'Nama penulis maksimal 100 karakter.',

            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa bilangan bulat.',
            'tahun_terbit.between' =>
                'Tahun terbit harus antara 1000 dan ' . date('Y') . '.',
        ];
    }
}