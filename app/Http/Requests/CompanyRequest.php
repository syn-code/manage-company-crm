<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'logo' => 'nullable|dimensions:max_width=100,max_height=100|mimes:jpeg,png,jpg',
            'website' => 'url|nullable'

        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Company Name is required',
            'name.string' => 'Company Name must be text',
            'email.required' => 'Company Email is required',
            'email.email' => 'Company Email must be a valid email',
            'website.url' => 'Company Website must be a valid url',
        ];
    }
}
