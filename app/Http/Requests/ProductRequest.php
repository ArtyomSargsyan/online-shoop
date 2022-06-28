<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:2|max:15',
            'displayName' => 'required|min:2|max:35',
            'description'=>'required|min:8|max:40',
            'price' => 'required|min:1|max:10',
            'images' => 'required'
        ];
    }
}
