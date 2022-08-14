<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'family-name' => 'required|max:255',
            'first-name' => 'required|max:255',
            'gender' => 'required',
            'email' => 'required|email|max:255',
            'postcode' => 'required|max:8',
            'address' => 'required|max:255',
            'opinion' => 'required|max:255'
        ];
    }
}
