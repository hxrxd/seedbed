<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiscal;
use App\Models\Mesa;
use App\Models\Voto;

use Illuminate\Support\Facades\Auth;

class VotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //comprobación si son las 6 pm
        if(true){
            //copmprobación si ya registro el voto
            $id = Auth::user('email');
            $voto = Voto::where('fiscal',$id->email)->first();
            if($voto==null){

                $fiscal = Fiscal::where('correo',$id->email)->first();
                $mesa = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal',$id->email)->first();
                return view('voto.create', ['fiscal'=>$fiscal,'mesa'=>$mesa]);
            }
            else{
                return redirect('/voto/'.$voto->id);
            }

        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //registrando votos

        $this->validate($request,[
            'semilla' => 'required',
            'une' => 'required',
            'blanco' => 'required',
            'nulo' => 'required',
            'sinusar' => 'required',
        ]);

        $id = Auth::user('email');

        $votos = new Voto;

        $votos->semilla = $request->semilla;
        $votos->une = $request->une;
        $votos->blanco = $request->blanco;
        $votos->nulo = $request->nulo;
        $votos->sinusar = $request->sinusar;
        $votos->jrv = $request->jrv;
        $votos->fiscal = $id->email;
        $votos->save();

        return redirect('/dashboard');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $voto = Voto::find($id);
        return view('voto.show', ['voto'=>$voto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
