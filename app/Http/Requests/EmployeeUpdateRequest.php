<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.string' => 'First Name is required to be a string.',
            'first_name.required' => 'First Name is required.',
            'last_name.string' => 'Last Name is required to be a string.',
            'last_name.required' => 'Last Name is required.',
        ];
    }
}
