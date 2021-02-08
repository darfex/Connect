<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'body' => 'required|max:280',
            'image' => 'file|mimes:png,jpg,jpeg'
        ];
    }

    public function message()
    {
        return [
            'body.required' => 'The post body is required',
            'body.max:280' => 'The post body cannot be more than 280 characters',
            'image.file' => 'The image must be a file',
            'image.mimes' => 'The image must be a png, jpg, or jpeg file'
        ];
    }
}
