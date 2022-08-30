<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
        $rules =  [
            'title' => 'required',
            'description' => 'required',
            'publication_date' => 'required|date'
        ];

        return $rules;
    }

    public function messages() {
        return [
            'title.required' => 'Please enter name',
            'description' => 'Please enter description',
            'publication_date' => 'Please enter valid date'
        ];
    }
}
