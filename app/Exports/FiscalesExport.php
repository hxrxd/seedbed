<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Fiscal;
use App\Models\Mesa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FiscalesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        if(Auth::user()->rol == "Admin"){
            return view('excel.fiscales', [
                'fiscales'=> Fiscal::all()
            ]);
        }

        if(Auth::user()->rol == "Coordinador"){
            return view('excel.coordinador', [
                'mesas'=> Mesa::leftJoin('fiscals', 'mesas.fiscal', '=', 'fiscals.correo')
                ->select('mesas.*', 'fiscals.nombres', 'fiscals.apellidos', 'fiscals.dpi', 'fiscals.telefono','fiscals.fiscal_electronico')
                ->where('mesas.departamento',Auth::user()->location )
                ->get()
            ]);
        }
    }
}
