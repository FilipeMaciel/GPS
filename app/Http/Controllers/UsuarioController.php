<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Model\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::where('status','=',1)->orderBy('nome','asc')->paginate(15);
        return view('usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new Usuario();
        return view('usuario.cadastrar', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        Usuario::create($request->all());

        return redirect()->route('usuario.index')->with('success','Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        if(is_null($usuario))
            throw new ModelNotFoundException('Usuário não encontrado');

        return view('usuario.visualizar',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        if(is_null($usuario))
            throw new ModelNotFoundException('Usuário não encontrado');

        return view('usuario.editar',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $usuario = Usuario::find($id);
        if(is_null($usuario))
            throw new ModelNotFoundException('Usuário não encontrado');

        $usuario->fill($request->all())->save();

        return redirect()->route('usuario.index')->with('success','Usuário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if(is_null($usuario))
            throw new ModelNotFoundException('Usuário não encontrado');

        $usuario->status = 0;
        $usuario->save();

        return redirect()->route('usuario.index')->with('success','Usuário inativado com sucesso!');
    }
}
