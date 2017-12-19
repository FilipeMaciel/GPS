<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoVisitaRequest extends FormRequest
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
            'disciplina_id' => 'required|exists:disciplinas,id',
            'turma'         => 'required|max:250',
            'num_alunos'    => 'required|integer|min:1',
            'destino'       => 'required|max:250',
            'justificativa' => 'required',
            'endereco'      => 'nullable|max:250',
            'site'          => 'nullable|url|max:250',
            'fone'          => 'nullable|max:30',
            'razao_social'  => 'nullable|max:250',
        ];
    }

    public function messages()
    {
        return [
            'disciplina_id.required'    => 'A disciplina é obrigatória',
            'disciplina_id.exists'      => 'A disciplina informada não foi encontrada',
            'turma.required'            => 'A turma é obrigatória',
            'num_alunos.required'       => 'O número de alunos é obrigatório',
            'destino.required'          => 'O destino da visita é obrigatório',
            'justificativa.required'    => 'A justificativa da visita é obrigatória',
            'site.url'                  => 'O link do site informado é inválido'
        ];
    }
}
