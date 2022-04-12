<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:100',
            'content' => 'required|string|min:10|max:255',
            'image' => 'required|string|min:3|max:100',
            'is_published' => 'required|boolean',
            'category.id' => '',
            'category.title' => 'required|string|min:3|max:100',
            'tags.*.id' => '',
            'tags.*.title' => 'required|string|min:3|max:100'
        ];
    }
}
