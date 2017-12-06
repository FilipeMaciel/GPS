<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequerimentoVisitaRequest;
use App\Model\RequerimentoVisita;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RequerimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requerimento = RequerimentoVisita::where('status','=',1)->orderBy('nome','asc')->paginate(15);
        return view('requerimento.index', compact('requerimento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requerimento.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequerimentoVisitaRequest $request)
    {
        RequerimentoVisita::create($request->all());

        return redirect()->route('requerimento.index')->with('success','Requerimento cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requerimento = RequerimentoVisita::find($id);
        if(is_null($requerimento))
            throw new ModelNotFoundException('Requerimento não encontrado');

        return view('requerimento.visualizar',compact('requerimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requerimento = RequerimentoVisita::find($id);
        if(is_null($requerimento))
            throw new ModelNotFoundException('Requerimento não encontrado');

        return view('requerimento.editar',compact('requerimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequerimentoVisitaRequest $request, $id)
    {
        $requerimento = RequerimentoVisita::find($id);
        if(is_null($requerimento))
            throw new ModelNotFoundException('Requerimento não encontrado');

        $requerimento->fill($request->all())->save();

        return redirect()->route('requerimento.index')->with('success','Requerimento alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requerimento = RequerimentoVisita::find($id);
        if(is_null($requerimento))
            throw new ModelNotFoundException('Requerimento não encontrado');

        $requerimento->status = 0;
        $requerimento->save();

        return redirect()->route('requerimento.index')->with('success','Requerimento inativado com sucesso!');
    }
}
