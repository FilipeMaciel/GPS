<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoordenacaoRequest;
use App\Model\Coordenacao;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CoordenacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordenacao = Coordenacao::where('status','=',1)->orderBy('nome','asc')->paginate(15);
        return view('coordenacao.index', compact('coordenacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordenacao.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoordenacaoRequest $request)
    {
        Coordenacao::create($request->all());

        return redirect()->route('coordenacao.index')->with('success','Coordenação cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordenacao = Coordenacao::find($id);
        if(is_null($coordenacao))
            throw new ModelNotFoundException('Coordenação não encontrada');

        return view('coordenacao.visualizar',compact('coordenacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordenacao = Coordenacao::find($id);
        if(is_null($coordenacao))
            throw new ModelNotFoundException('Coordenação não encontrada');

        return view('coordenacao.editar',compact('coordenacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoordenacaoRequest $request, $id)
    {
        $coordenacao = Coordenacao::find($id);
        if(is_null($coordenacao))
            throw new ModelNotFoundException('Coordenação não encontrada');

        $coordenacao->fill($request->all())->save();

        return redirect()->route('coordenacao.index')->with('success','Coordenação alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coordenacao = Coordenacao::find($id);
        if(is_null($coordenacao))
            throw new ModelNotFoundException('Coordenação não encontrada');

        $coordenacao->status = 0;
        $coordenacao->save();

        return redirect()->route('coordenacao.index')->with('success','Coordenação inativada com sucesso!');
    }
}
