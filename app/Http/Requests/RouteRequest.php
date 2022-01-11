<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class RouteRequest extends FormRequest
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
    public function rules() {
        return [
            'user_id' => ['required', 'string', 'unique:users,name', 'max:75'],
            'date_time' => ['required', 'date', 'unique:users,last_name', 'max:150']
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
