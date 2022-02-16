<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            'route_id' => ['required', 'string', 'exists:routes,id'],
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:200'],
            'coordinates' => ['required', 'string', 'max:200'],
            'estimated_time' => ['nullable', 'date', 'max:150']
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
