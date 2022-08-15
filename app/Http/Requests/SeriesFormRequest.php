<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'num_seasons' => ['required', 'numeric'],
            'num_episodes' => ['required', 'numeric'],
            'cover' => ['image']
        ];
    }

    public function messages()
    {
        return [
            'cover.mimes' => 'O arquivo para a capa deve ser um arquivo de imagem',
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => 'Nome',
            'num_seasons' => 'Nº de temporadas',
            'num_episodes' => 'Nº de episódios',
        ];    
    }
}
