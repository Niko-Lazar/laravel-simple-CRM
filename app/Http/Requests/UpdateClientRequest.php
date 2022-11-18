<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => ['required', 'min:3', 'max:255', Rule::unique('clients', 'slug')->ignore($this->client)],
            'website' => 'nullable'
        ];
    }
}
