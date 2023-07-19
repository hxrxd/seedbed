<?php

namespace App\Exports;

use App\Models\Fiscal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FiscalesElectronicosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('excel.fiscales', [
            'fiscales'=> Fiscal::where('fiscal_electronico','Y')->get()
        ]);
    }
}
