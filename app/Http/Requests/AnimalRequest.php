<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth() -> check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'nullable|file|image|mimes:jpeg,png,webp|max:2048',
            'name' => 'required',
            'birth_day' => 'required',
            'description' => 'required',
            'breed' => 'required'
        ];
    }

    public function messages(){
         return[
            'image.image' => 'A imagem precisa ser válida',
            'image.mimes' => 'A imagem precisa ser jpeg, png ou webp',
            'image.max' => 'A imagem precisa ser precisa ser menor que 2MB',
            'image.required' => 'O campo de imagem é obrigatório',
            'name.required' => 'O campo de nome é obrigatório',
            'birth_day.required' => 'O campo de data de nascimento é obrigatório',
            'description.required' => 'O campo de descrição é obrigatório',
            'breed.required' => 'O campo de raça é obrigatório',
        ];
    }
}
