<?php

namespace App\Http\Requests;

use Urameshibr\Requests\FormRequest;

class SistemaUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'descricao' => 'required|min:3|max:100',
            'sigla' => 'required|min:1|max:10',
            'email' => 'required|email',
            'url' => 'max:50',
            'status' => 'max:50'
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Campo Descrição é obrigatório.',
            'descricao.min' => 'Campo Descrição deve conter mais de 3 caracteres.',
            'descricao.max' => 'Campo Descrição deve conter no máximo 100 caracteres.',
            'sigla.required' => 'Campo Sigla é obrigatório.',
            'sigla.min' => 'Campo Sigla deve conter mais de 1 caracteres.',
            'sigla.max' => 'Campo Sigla deve conter no máximo 10 caracteres.',
            'email.required' => 'Campo E-mail é obrigatório.',
            'email.email' => 'Esse E-mail não válido.',
            'url.max' => 'Campo URL deve conter no máximo 50 caracteres.',
            'status.max' => 'Campo Status deve conter no máximo 50 caracteres.',
        ];
    }
}
