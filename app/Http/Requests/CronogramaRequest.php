<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CronogramaRequest extends FormRequest
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
            'atividade' => 'required|max:250',
            'data' => 'required|date_format:d/m/Y',
            'projeto_id' => 'required|exists:projetos,id'
        ];
    }

    public function messages()
    {
        return [
            'atividade.required' => 'A atividade é obrigatória',
            'data.required' => 'A data é obrigatória',
            'data.date_format' => 'A data informada é inválida',
            'projeto_id.required' => 'O projeto é obrigatório',
            'projeto_id.exists' => 'O projeto informado não existe'
        ];
    }
}
