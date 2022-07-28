<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePlayerRequest extends FormRequest
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
            'first_name' =>  [
                'required',
                Rule::unique('players', 'first_name')->where(function ($query) {
                    return $query->where('second_name', request()->second_name);
                }),
            ],
            'second_name' =>  [
                'required',
                Rule::unique('players', 'second_name')->where(function ($query) {
                    return $query->where('first_name', request()->first_name);
                }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'first_name.unique' => 'User already exists.',
            'second_name.unique' => 'User already exists.',
        ];
    }
}
