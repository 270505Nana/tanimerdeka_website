<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // determind rules login. we have 2 column no hp & password
       return [
            'no_hp' => 'required|numeric|digits_between:10,15',
            'password' => 'required|string|min:6',
        ];
    }

    /** error message return to user */
    public function messages(): array
    {
        return [
            'no_hp.required' => 'Nomor handphone wajib diisi.',
            'no_hp.numeric' => 'Nomor handphone harus berupa angka.',
            'password.required' => 'Password tidak boleh kosong.',
        ];
    }
}
