<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetoVisitaRequest;
use App\Model\Disciplina;
use App\Model\ProjetoVisita;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projeto = ProjetoVisita::where('status','=',1)->orderBy('nome','asc')->paginate(15);
        return view('projeto.index', compact('projeto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas = Disciplina::where('status','=',1)->orderBy('nome','asc')->get();
        return view('projeto.cadastrar',compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetoVisitaRequest $request)
    {
        ProjetoVisita::create($request->all());

        return redirect()->route('projeto.index')->with('success','Projeto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeto = ProjetoVisita::find($id);
        if(is_null($projeto))
            throw new ModelNotFoundException('Projeto não encontrado');

        return view('projeto.visualizar',compact('projeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto = ProjetoVisita::find($id);
        if(is_null($projeto))
            throw new ModelNotFoundException('Projeto não encontrado');

        $disciplinas = Disciplina::where('status','=',1)->orderBy('nome','asc')->get();

        return view('projeto.alterar',compact('projeto','disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjetoVisitaRequest $request, $id)
    {
        $projeto = ProjetoVisita::find($id);
        if(is_null($projeto))
            throw new ModelNotFoundException('Projeto não encontrado');

        $projeto->fill($request->all())->save();

        return redirect()->route('projeto.index')->with('success','Projeto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projeto = ProjetoVisita::find($id);
        if(is_null($projeto))
            throw new ModelNotFoundException('Projeto não encontrado');

        $projeto->status = 0;
        $projeto->save();

        return redirect()->route('projeto.index')->with('success','Projeto inativado com sucesso!');
    }
}
