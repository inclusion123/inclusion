<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'designation' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
      return [            
        'image.required' => "You must use the 'Choose file' button to select which file you wish to upload",
        'image.max' => "Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB"
      ];
    }
}
