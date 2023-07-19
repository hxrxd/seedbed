<?php

namespace App\Exports;


use App\Models\Mesa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class MesasSinFiscalExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $mesas = Mesa::whereNull('fiscal')->get();
        return view('excel.mesassinfiscal', [
            'mesas'=> $mesas
        ]);
    }
}
