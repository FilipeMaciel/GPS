<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplinaRequest;
use App\Model\Curso;
use App\Model\Disciplina;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplina = Disciplina::where('status','=',1)->orderBy('nome','asc')->paginate(15);
        return view('disciplina.index', compact('disciplina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplina = new Disciplina();
        $cursos = Curso::where('status','=',1)->orderBy('nome','asc')->get();
        return view('disciplina.cadastrar',compact('cursos','disciplina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {
        Disciplina::create($request->all());

        return redirect()->route('disciplina.index')->with('success','Disciplina cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disciplina = Disciplina::find($id);
        if(is_null($disciplina))
            throw new ModelNotFoundException('Disciplina não encontrada');

        return view('disciplina.visualizar',compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disciplina = Disciplina::find($id);
        if(is_null($disciplina))
            throw new ModelNotFoundException('Disciplina não encontrada');

        $cursos = Curso::where('status','=',1)->orderBy('nome','asc')->get();

        return view('disciplina.editar',compact('disciplina','cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaRequest $request, $id)
    {
        $disciplina = Disciplina::find($id);
        if(is_null($disciplina))
            throw new ModelNotFoundException('Disciplina não encontrada');

        $disciplina->fill($request->all())->save();

        return redirect()->route('disciplina.index')->with('success','Disciplina alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disciplina = Disciplina::find($id);
        if(is_null($disciplina))
            throw new ModelNotFoundException('Disciplina não encontrada');

        $disciplina->status = 0;
        $disciplina->save();

        return redirect()->route('disciplina.index')->with('success','Disciplina inativada com sucesso!');
    }
}
