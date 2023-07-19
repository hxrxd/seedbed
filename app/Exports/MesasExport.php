<?php

namespace App\Exports;

use App\Models\Mesa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MesasExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('excel.mesas', [
            'mesas'=> Mesa::all()
        ]);
    }
}
