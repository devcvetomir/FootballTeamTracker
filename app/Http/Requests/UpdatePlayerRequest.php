<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'position' => 'nullable|in:Goalkeeper,Defender,Midfielder,Forward,Useless,Injured',
            'age' => 'nullable|integer|min:13',
            'nationality' => 'nullable|string|max:255',
            'goals_season' => 'integer|min:0',
        ];
    }
}
