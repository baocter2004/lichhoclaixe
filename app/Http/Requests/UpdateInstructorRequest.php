<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInstructorRequest extends FormRequest
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
        $id = $this->segment(3);
        return [
            'license_number' => [
                'required',
                'max:50',
                Rule::unique('instructors')->ignore($id)
            ],
            'experience_years' => 'required|numeric',
            'user_id' => [
                Rule::exists('users', 'id')
            ]
        ];
    }
}
