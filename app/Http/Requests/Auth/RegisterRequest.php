<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'first_name'=> 'required',
            'last_name'=> 'required',
            'address'=> 'required',
            'contact_number'=> ['required', 'numeric'],
            'password'=> 'required',
            'password_confirmation'=> ['required', 'same:password'],
        ];
    }
}
