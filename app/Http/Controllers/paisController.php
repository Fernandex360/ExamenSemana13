<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pais;
use App\Grupo;
use Storage;    
class paisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos=Grupo::all();

        $paises=DB::table('paises')
                    ->join('grupos','paises.id_grupo','=','grupos.id')
                    ->select('paises.*','grupos.nombre as grupo')
                    ->get();
        return view('vistas.pais',['paises'=> $paises,'grupos'=> $grupos]);
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
        $pais=new Pais;
        $pais->nombre=$request->nombre;

        $img=$request->file('foto');
        $file_route=time().$img->getClientOriginalName();
        Storage::disk('img')->put($file_route,file_get_contents($img->getRealPath()));
        
        $pais->foto=$file_route;

        $pais->id_grupo=$request->grupo;
        
        $pais->save();
        
        return redirect('/pais');
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
        $grupos=Grupo::all();
        $pais=Pais::find($id);
        return view('editar.pais',['grupos'=>$grupos,'pais'=>$pais]);
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
        Pais::find($id)->update($request->all());
        return redirect()->route('pais.index')->with('success','Registro actualizado
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
        Pais::find($id)->delete();
        return redirect()->route('pais.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
