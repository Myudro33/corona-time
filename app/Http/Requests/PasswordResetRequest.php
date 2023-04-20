<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'=>'required|not_in:password_reset_tokens,email',
            'password'          =>  'required|min:3',
            'confirm_password'  =>  'same:password'
        ];
    }
}
