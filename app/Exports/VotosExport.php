<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Mesa;



class VotosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        //
        $mesasConVotos = Mesa::leftJoin('votos', 'mesas.jrv', '=', 'votos.jrv')
            ->select('mesas.*', 'votos.id', 'votos.semilla', 'votos.une', 'votos.blanco', 'votos.nulo', 'votos.sinusar')
            ->where('mesas.muestra',1)
            ->get();
        return view('excel.votos',['mesasConVotos'=>$mesasConVotos]);
    }
}
