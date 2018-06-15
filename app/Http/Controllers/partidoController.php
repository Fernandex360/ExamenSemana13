<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Partido;
use App\Lugar;
use App\Pais;
class partidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $consultas=DB::table('partidos')
                    ->join('paises','partidos.equipo1','=','paises.id')
                    ->join('lugares','partidos.id_lugares','=','lugares.id')
                    ->join('paises as c','partidos.equipo2','=','c.id')
                    ->select('paises.nombre as pais1','c.nombre as pais2','lugares.nombre','partidos.*')
                    ->get();
        $lugares=Lugar::all();
        $paises=Pais::all();
        $partidos=Partido::all();
        return view('vistas.partido',['partidos'=>$partidos,'paises'=>$paises,'lugares'=>$lugares ,'consultas'=>$consultas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $partido=new Partido;
        $partido->fecha=$request->fecha;
        $partido->hora=$request->hora;
        $partido->equipo1=$request->equipo1;
        $partido->equipo2=$request->equipo2;
        $partido->id_lugares=$request->lugar;
        $partido->save();
        
        return redirect('/partido');
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
        $lugares=Lugar::all();
        $pais=Pais::all();
        $partido=Partido::find($id);
        return view('editar.partido',['partido'=>$partido,'paises'=>$pais ,'lugares'=>$lugares ]);
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
        Partido::find($id)->update($request->all());
        return redirect()->route('partido.index')->with('success','Registro actualizado
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
        Partido::find($id)->delete();
        return redirect()->route('partido.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
