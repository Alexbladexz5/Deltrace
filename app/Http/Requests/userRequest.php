<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class userRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:users,name', 'max:75'],
            'last_name' => ['required', 'string', 'unique:users,last_name', 'max:150'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'string', 'unique:users,password', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()]
        ];
    }

    public function withValidator($validator) {
        $validator->after(function($validator) {
            if($validator->errors()->count()) {
                if(!in_array($this->method(),['PUT', 'PATCH'])) {
                    $validator->errors()->add('post', true);
                }
            }
        });
    }
}
