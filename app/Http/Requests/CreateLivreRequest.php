<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLivreRequest extends FormRequest
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
            "libelle" => "required|min:3|max:50|unique:livres",
            "prix" => "required|numeric|between:500,1000000",
            "description" => "required|min:8|max:200",
        ];
    }
}
