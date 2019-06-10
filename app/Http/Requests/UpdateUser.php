<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name'   => 'required',
            'email'  => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone'  => 'min:9|max:11',
        ];
    }


    public function messages()
    {
        return [
            'name.require'  => 'O campo nome é obrigatório',
            'email.require' => 'O campo e-mail é obrigatório',
            'avatar.image'  => 'O campo avatar deve ser uma imagem',
            'avatar.max'    => 'O tamanho do avatar não deve ser maior que 2048px',
            'phone'         => 'O campo telefone deve ter no mínimo 9 e no máximo 11 digitos',
        ];
    }
}
