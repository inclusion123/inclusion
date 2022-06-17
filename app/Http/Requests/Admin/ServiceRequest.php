<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name' => 'required',
            'page_name' => 'required',
            'title' => 'required',
            'icon' => 'required',
            'desc' => 'required',
            'detailname' => 'required',
            'detail_description' => 'required',
            'status' => 'required'
        ];
    }
}
