<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Model\Curso;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curso = Curso::where('status','=',1)->orderBy('nome','asc')->paginate(15);
        return view('curso.index', compact('curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        Curso::create($request->all());

        return redirect()->route('curso.index')->with('success','Curso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);
        if(is_null($curso))
            throw new ModelNotFoundException('Curso não encontrado');

        return view('curso.visualizar',compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        if(is_null($curso))
            throw new ModelNotFoundException('Curso não encontrado');

        return view('curso.editar',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, $id)
    {
        $curso = Curso::find($id);
        if(is_null($curso))
            throw new ModelNotFoundException('Curso não encontrado');

        $curso->fill($request->all())->save();

        return redirect()->route('curso.index')->with('success','Curso alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        if(is_null($curso))
            throw new ModelNotFoundException('Curso não encontrado');

        $curso->status = 0;
        $curso->save();

        return redirect()->route('curso.index')->with('success','Curso inativado com sucesso!');
    }
}
