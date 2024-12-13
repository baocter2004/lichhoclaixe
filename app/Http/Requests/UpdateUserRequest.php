<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id)
            ],
            'user_image' => 'nullable|image|max:2048',
            'is_active' => [
                'nullable',
                Rule::in([0, 1])
            ],
            'role' => [
                'required',
                Rule::in([User::ROLE_INSTRUCTOR, User::ROLE_ADMIN, User::ROLE_STUDENT])
            ],
        ];
    }
}
