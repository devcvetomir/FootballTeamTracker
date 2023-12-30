<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $data = [

            'order_by' => ['sometimes', 'string', 'in:name,age,nationality,goals_season'],
            'order_direction' => ['sometimes', 'string', 'in:asc,desc'],
        ];
        return $data;
    }

}
