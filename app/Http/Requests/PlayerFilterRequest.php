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
        return [
            'sort' => ['sometimes', 'string', 'in:name,age,nationality,goals_season,id'],
            'direction' => ['sometimes', 'string', 'in:asc,desc'],
            'name' => ['sometimes', 'string'],
            'position' => ['sometimes', 'in:Goalkeeper,Defender,Midfielder,Forward,Useless,Injured'],
            'age' => ['sometimes', 'integer', 'min:13'],
            'nationality' => ['sometimes', 'string'],
            'goals_season' => ['sometimes', 'integer', 'min:0'],
        ];

    }


}
