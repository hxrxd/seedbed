<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Fiscal;
use App\Models\Mesa;
use Illuminate\Support\Facades\DB;

class VerificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $municipios = Mesa::distinct()->pluck('municipio');
        return view('verificacion.index',['municipios'=>$municipios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $fiscal = Fiscal::where('correo',$id)->first();
        $mesas = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal',$id)->get();
        return view('verificacion.fiscal', ['fiscal'=>$fiscal,'mesas'=>$mesas]);
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

     /**
     * Descarga todas las acreditaciones de un municipio
     */
    public function getAcreditaciones(Request $request)
    {
        //
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        $acreditaciones = DB::table('mesas')
                            ->join('fiscals', 'mesas.fiscal', '=', 'fiscals.correo')
                            ->whereNotNull('mesas.fiscal')
                            ->where('mesas.municipio', $request->municipio)
                            ->select('fiscals.nombres', 'fiscals.apellidos', 'fiscals.dpi',  'mesas.nombre as mesa', 'mesas.jrv','mesas.fiscal')
                            ->get();

        $pdf = PDF::loadView('verificacion.fiscales',['acreditaciones'=>$acreditaciones])->setPaper("letter","portrait");
        return $pdf->stream('acreditacion.pdf');
    }
}
