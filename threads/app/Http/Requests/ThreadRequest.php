<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
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
            'name' => 'required|max:20',
            'content' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name.max' => trans('validation.max'),
            'content.required' => trans('validation.required'),
            'content.max' => trans('validation.max'),
        ];
    }
}
