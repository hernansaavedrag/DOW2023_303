<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Support\Facades\Storage;

class JugadoresController extends Controller
{
    public function index(){
        $jugadores = Jugador::all();
        $equipos = Equipo::all();
        return view ('jugadores.index',compact('jugadores','equipos'));
    }

    public function store(Request $request){
        $jugador = new Jugador();
        $jugador->apellido = $request->apellido;
        $jugador->nombre = $request->nombre;
        $jugador->posicion = $request->posicion;
        $jugador->numero = $request->numero;
        $jugador->equipo_id = $request->equipo;
        $jugador->imagen = $request->imagen->store('public/jugadores');
        $jugador->save();
        return redirect()->route('jugadores.index');

    }

    public function edit(Jugador $jugador){
        $equipos = Equipo::all();
        return view('jugadores.edit',compact('jugador','equipos'));
    }

    public function update(Jugador $jugador,Request $request){
        $jugador->apellido = $request->apellido;
        $jugador->nombre = $request->nombre;
        $jugador->posicion = $request->posicion;
        $jugador->numero = $request->numero;
        $jugador->equipo_id = $request->equipo;

        if(isset($request->imagen)){
            //borrar imagen actual
            Storage::delete($jugador->imagen);
            //subir imagen nueva
            $jugador->imagen = $request->imagen->store('public/jugadores');
        }

        $jugador->save();
        return redirect()->route('jugadores.index');



    }
}
