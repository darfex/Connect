<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePublicationRequest extends FormRequest
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
            'title' => 'string|required|max:255',
            'abstract' => 'string|required|min:300',
            'document' => 'file|required|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Title must be a string.',
            'title.required' => 'Enter the title of the publication.',
            'title.max' => 'Title cannot be more than 255 characters.',
            'abstract.string' => 'Abstract must be a string.',
            'abstract.required' => 'Enter the abstract of the publication.',
            'abstract.min:300' => 'The abstract must be at least 300 characters.',
            'document.file' => 'The document must be a file.',
            'document.required' => 'The document is required.',
            'document.mimes' => 'The document must be a pdf file'
        ];
    }
}
