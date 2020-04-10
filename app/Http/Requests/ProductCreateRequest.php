<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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

            'title' => 'required|min:5',
            'description'=>'required|min:5',
            'meta_key'=>'required|min:5',
            'slug' => 'max:200',
            'price' => 'numeric',
            'excerpt'=>'max:200',
            'category_id' => 'numeric|required|exists:product_categories,id',
            'content_raw' => 'required',
//            'image' => 'required|file|image|mimes:jpeg,png,gif,jpg|max:2048'
        ];
    }
}
