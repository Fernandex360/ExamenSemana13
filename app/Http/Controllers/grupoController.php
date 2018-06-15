<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class grupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $grupos=Grupo::all();
        return view('vistas.grupo',['grupos' =>$grupos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo=new Grupo;
        $grupo->nombre=$request->nombre;
        $grupo->save();
        
        return redirect('/grupo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo=Grupo::find($id);
        return view('editar.grupo',compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'nombre'=>'required|string']);
        Grupo::find($id)->update($request->all());
        return redirect()->route('grupo.index')->with('success','Registro actualizado
        satisfactoriamente');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Grupo::find($id)->delete();
        return redirect()->route('grupo.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
