<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourceRequest extends FormRequest
{
    /**
     * Tentukan apakah user boleh membuat request ini.
     */
    public function authorize()
    {
        return true; // Semua user yang login boleh (nanti bisa dihubungkan dengan Policy)
    }

    /**
     * Aturan validasi untuk menyimpan resource baru.
     */
    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'sumber' => 'required|url|max:500',
        ];
    }

    /**
     * Pesan error kustom (opsional, tapi bagus untuk UX).
     */
    public function messages()
    {
        return [
            'nama.required' => 'Nama sumber belajar wajib diisi.',
            'nama.max' => 'Nama terlalu panjang, maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.max' => 'Deskripsi terlalu panjang, maksimal 1000 karakter.',
            'sumber.required' => 'Link sumber wajib diisi.',
            'sumber.url' => 'Link harus format URL yang valid (contoh: https://example.com).',
            'sumber.max' => 'Link terlalu panjang, maksimal 500 karakter.',
        ];
    }
}