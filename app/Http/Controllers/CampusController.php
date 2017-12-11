<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampusRequest;
use App\Model\Campus;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus = Campus::where('status','=',1)->orderBy('nome','asc')->paginate(15);
        return view('campus.index', compact('campus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus = new Campus();
        return view('campus.cadastrar', compact('campus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampusRequest $request)
    {
        Campus::create($request->all());

        return redirect()->route('campus.index')->with('success','Campus cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campus = Campus::find($id);
        if(is_null($campus))
            throw new ModelNotFoundException('Campus não encontrado');

        return view('campus.visualizar',compact('campus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campus = Campus::find($id);
        if(is_null($campus))
            throw new ModelNotFoundException('Campus não encontrado');

        return view('campus.alterar',compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CampusRequest $request, $id)
    {
        $campus = Campus::find($id);
        if(is_null($campus))
            throw new ModelNotFoundException('Campus não encontrado');

        $campus->fill($request->all())->save();

        return redirect()->route('campus.index')->with('success','Campus alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = Campus::find($id);
        if(is_null($campus))
            throw new ModelNotFoundException('Campus não encontrado');

        $campus->status = 0;
        $campus->save();

        return redirect()->route('campus.index')->with('success','Campus inativado com sucesso!');
    }
}
