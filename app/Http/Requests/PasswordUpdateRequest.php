<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'email'=> 'required|email|exists:users,email|unique:password_reset_tokens,email',
		];
	}
}
