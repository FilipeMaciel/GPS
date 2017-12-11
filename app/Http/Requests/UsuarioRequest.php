<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'nome' => 'required|max:250',
            'login' => "required|max:250|unique:usuarios,login,$id",
            'email' => 'required|email|max:250',
            'cargo' => 'nullable|max:250'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'login.required' => 'A matricula é obrigatória',
            'login.unique' => 'A matricula informada já cadastrada',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email é inválido'
        ];
    }
}
