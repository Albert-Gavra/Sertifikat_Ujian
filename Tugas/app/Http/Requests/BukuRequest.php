<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul_buku'            => 'required',
            'penulis_buku'          => 'required',
            'tanggalTerbit_buku'    => 'required',
            'id_kategori'           => 'required'
        ];
    }

    public function messages()
    {
        return [
            'judul_buku.required'                   => 'Judul Buku harus diisi.',
            'penulis_buku.required'                 => 'Penulis Buku harus diisi',
            'tanggalTerbit_buku.required'           => 'Tanggal Terbit harus diisi',
            'id_kategori.required'                  => 'Kategori harus diisi',
        ];
    }
}
