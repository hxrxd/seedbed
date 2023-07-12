<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Fiscal;
use App\Models\Mesa;


class QRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
       
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
        $mesa = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal',$id)->first();
        $qrcode = base64_encode(QrCode::format('svg')->size(64)->errorCorrection('H')->generate(url("").'/verificacion/'.$id));
        $pdf = PDF::loadView('verificacion.acreditacion',['fiscal'=>$fiscal,'mesa'=>$mesa,'qrcode'=>$qrcode])->setPaper("letter","portrait");
        return $pdf->download('invoice.pdf');
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
