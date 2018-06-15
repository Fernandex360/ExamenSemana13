<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Partido;
use App\Lugar;
use App\Pais;
use App\Grupo;

class principalController extends Controller
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
                    ->join('grupos','paises.id_grupo','=','grupos.id')
                    ->select('paises.nombre as pais1','paises.foto as img1','c.nombre as pais2','c.foto as img2','c.id_grupo','lugares.nombre','partidos.*','grupos.nombre as grupo')->orderBy('fecha','ASC')
                    ->get();         
        $lugares=Lugar::all();
        $paises=Pais::all();
        $partidos=Partido::all();
        return view('vistas.principal',['partidos'=>$partidos,'paises'=>$paises,'lugares'=>$lugares ,'consultas'=>$consultas]);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
