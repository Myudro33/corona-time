<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'=>'required',
            'password'          =>  'required|min:3',
            'confirm_password'  =>  'required|same:password'
        ];
    }
}
