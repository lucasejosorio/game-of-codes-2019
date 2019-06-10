<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
            'user_id' => 'required',
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'user.required' => 'É obrigatório específicar um usuário',
          'text.required' => 'É obrigatório preencher o campo de texto',
        ];
    }
}
