<?php

namespace App\Http\Requests\Admin;

use App\Enums\Role;
use App\Rules\MustBeAnEmployee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ValidateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'phone' => ['required', 'numeric'],
            'role' => ['nullable', new Enum(Role::class)],
            'password' => ['nullable','min:3'],
            'user_id' => ['nullable', new MustBeAnEmployee]
        ];
    }
}
