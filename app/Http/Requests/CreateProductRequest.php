<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'price' => 'required|integer',
            'grouping' => 'sometimes|required|exists:product_groupings,id',
//            'category' => 'sometimes|required|exists:product_categories,id',
            'main_image' => 'required|image',
            'banner_image' => 'image',
        ];
    }
}
