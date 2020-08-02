<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'nullable|min:11|max:11',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Employee First Name is required',
            'last_name.required' => 'Employee Last Name is required',
            'company_id.required' => 'Employee Work Place is required',
            'email.required' => ' Employee Email is required',
            'email.email' => 'Employee Email needs to be a valid email address',
        ];
    }
}
