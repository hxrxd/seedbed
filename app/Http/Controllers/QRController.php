<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Fiscal;
use App\Models\Mesa;

use Auth;


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
        // Si el usuario es coordinador o admin
        if(Auth::user()->rol == "Admin" || Auth::user()->rol == "Coordinador"){
            $fiscal = Fiscal::where('correo',$id)->first();
            $fiscal->status = "Acreditado";
            $fiscal->save();

            $mesas = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal',$id)->get();
            $qrcode = base64_encode(QrCode::format('svg')->size(64)->errorCorrection('H')->generate(url("").'/verificacion/'.$id));
            $pdf = PDF::loadView('verificacion.acreditacion',['fiscal'=>$fiscal,'mesas'=>$mesas,'qrcode'=>$qrcode])->setPaper("letter","portrait");
            return $pdf->download('acreditacion.pdf');


        }

        // Si el susuario es fiscal
        if(Auth::user()->rol == "Fiscal"){

            $fiscal = Fiscal::where('correo',$id)->first();

            if( $fiscal->status == "Acreditado"){
                $mesas = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal',$id)->get();
                $qrcode = base64_encode(QrCode::format('svg')->size(64)->errorCorrection('H')->generate(url("").'/verificacion/'.$id));
                $pdf = PDF::loadView('verificacion.acreditacion',['fiscal'=>$fiscal,'mesas'=>$mesas,'qrcode'=>$qrcode])->setPaper("letter","portrait");
                return $pdf->download('acreditacion.pdf');
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function authorizeFiscal(Request $request)
    {
        $id = $request->id;
        // Si el usuario es coordinador o admin
        if(Auth::user()->rol == "Admin" || Auth::user()->rol == "Coordinador") {
            $fiscal = Fiscal::where('correo',$id)->first();
            $fiscal->status = "Acreditado";
            $fiscal->save();

            /*$mesas = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal',$id)->get();
            $qrcode = base64_encode(QrCode::format('svg')->size(64)->errorCorrection('H')->generate(url("").'/verificacion/'.$id));
            $pdf = PDF::loadView('verificacion.acreditacion',['fiscal'=>$fiscal,'mesas'=>$mesas,'qrcode'=>$qrcode])->setPaper("letter","portrait");
            return $pdf->download('acreditacion.pdf');*/
            
            $redirectUrl = url('admin/fiscales');
            return response()->json(['redirect_url' => $redirectUrl]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function downloadAuthorization($id)
    {
        //$id = $request->id;
        $fiscal = Fiscal::where('correo',$id)->first();
        // Si el usuario es coordinador o admin
        if(Auth::user()->rol == "Admin" || Auth::user()->rol == "Coordinador"){
            $mesas = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal',$id)->get();
            $qrcode = base64_encode(QrCode::format('svg')->size(64)->errorCorrection('H')->generate(url("").'/verificacion/'.$id));
            $pdf = PDF::loadView('verificacion.acreditacion',['fiscal'=>$fiscal,'mesas'=>$mesas,'qrcode'=>$qrcode])->setPaper("letter","portrait");
            return $pdf->download('acreditacion.pdf');
        }
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
