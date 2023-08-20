<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Mesa;


class VotosCompleteExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        //
        $mesasConVotos = Mesa::join('votos', 'mesas.jrv', '=', 'votos.jrv')
        ->select('mesas.*', 'votos.id', 'votos.semilla', 'votos.une', 'votos.blanco', 'votos.nulo', 'votos.sinusar')
        ->get();
    return view('excel.votos',['mesasConVotos'=>$mesasConVotos]);

    }
}
