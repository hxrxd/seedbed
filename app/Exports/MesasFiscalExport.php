<?php

namespace App\Exports;

use App\Models\Mesa;
use App\Models\Fiscal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;


class MesasFiscalExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        //
        $mesas = DB::table('mesas')
                ->join('fiscals', 'mesas.fiscal', '=', 'fiscals.correo')
                ->select('mesas.*', 'fiscals.nombres','fiscals.apellidos','fiscals.dpi','fiscals.telefono','fiscals.fiscal_electronico')
                ->where('mesas.fiscal','!=','null')
                ->get();

        return view('excel.mesasfiscal', [
            'mesas'=> $mesas
        ]);
    }
}
