<?php

namespace App\Http\Requests\Admin;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class ItemRequest extends FormRequest
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
        $id='';
        $slug =  $this->slug?$this->slug:'';
        if($slug !=''){
            $item = Item::where('slug', $slug)->first();
            if(isset($item)){
                $id = $item->id;
            }
        }


        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'name' => 'required',
                'slug' => 'required','unique:items,slug' . $id,
                'title' => 'required',
                'title_description' => 'required',
                'download_link' => 'required',
                'selectedCategories' => 'required',
                'selectedTags' => 'required',
                'highlight_details' => 'required',
                'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'gallery' => 'image'
            ];
        }else{
            return [
                'name' => 'required',
                'slug' => 'required|unique:items,slug',
                'title' => 'required',
                'title_description' => 'required',
                'download_link' => 'required',
                'selectedCategories' => 'required',
                'selectedTags' => 'required',
                'highlight_details' => 'required',
                'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'gallery' => 'image'
            ];
        }
    }
    public function messages()
    {
      return [
        'featured_image.required' => "You must use the 'Choose file' button to select which file you wish to upload",
        'featured_image.max' => "Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB"
      ];
    }
}
