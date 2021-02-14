<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'firstname' => ['string', 'required', 'max:255'],
            'lastname' => ['string', 'required', 'max:255'],
            'description' => ['string', 'nullable'],
            'department_id' => ['string'],
            'avatar' => ['file', 'mimes:png,jpg,jpeg'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($request->user)],
        ];
    }
}
