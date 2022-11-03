<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AdminPasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'password' => 'required|confirmed|string|min:6'
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }


    /**
     * Returns validations errors.
     *
     * @param Validator $validator
     * @throws  HttpResponseException
     */
    public function failedValidation(Validator $validator)
    {
        if ($this->wantsJson()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        parent::failedValidation($validator);
    }
}
