<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email'=>'required|exists:users,email'
        ];
    }
}
