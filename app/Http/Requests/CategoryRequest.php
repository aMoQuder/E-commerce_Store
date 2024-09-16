<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

    public function rules()
    {
        return
        ( [
            "name"=>"required|min:3|unique:categories",
            "image" => "required|mimes:jpeg,gif,png",
        ]);
    }
}
