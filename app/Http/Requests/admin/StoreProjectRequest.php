<?php

namespace App\Http\Requests\admin;

use App\Enums\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:projects,slug',
            'description' =>'required|min:3|max:255',
            'deadline' => 'required|date|after:tomorrow',
            'status' => ['nullable', new Enum(ProjectStatus::class)],
            'client_id' => ['required', Rule::exists('clients', 'id')]
        ];
    }
}
