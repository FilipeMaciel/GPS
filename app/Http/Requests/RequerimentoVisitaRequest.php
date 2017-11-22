<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequerimentoVisitaRequest extends FormRequest
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
            'projeto_id' => 'required|exists:projetos,id',
            'coordenacao_id' => 'required|exists:coordenacoes,id',
            'campus_id' => 'required|exists:campus,id',
            'fone' => 'nullable|max:30',
            'local' => 'required|max:250',
            'percurso' => 'required|max:250',
            'quilometragem' => 'required|number|min:1',
            'chegada' => 'required|date_format:d/m/Y',
            'saida' => 'required|date_format:d/m/Y',
            'motivacao' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'projeto_id.required' => 'O projeto é obrigatório',
            'projeto_id.exists' => 'O projeto informado não foi encontrado',
            'coordenacao_id.required' => 'A coordenção é obrigatória',
            'coordenacao_id.exists' => 'A coordenção informada não foi encontrada',
            'campus_id.required' => 'O campus é obrigatório',
            'campus_id.exists' => 'O campus informado não foi encontrado',
            'local.required' => 'O local da visita é obrigatório',
            'percurso.required' => 'O percurso é obrigatório',
            'quilometragem.required' => 'A quilometragem é obrigatória',
            'quilometragem.number' => 'A quilometragem informada é inválida',
            'chegada.required' => 'A data de chegada é obrigatória',
            'chegada.date_format' => 'A data de chegada informada é inválida',
            'saida.required' => 'A data de saida é obrigatória',
            'saida.date_format' => 'A data de saida informa é inválida',
            'motivacao.required' => 'A motivação da visita é obrigatória'
        ];
    }
}
