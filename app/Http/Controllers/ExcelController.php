<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiscal;
use App\Models\Mesa;
use App\Exports\MesasExport;
use App\Exports\MesasFiscalExport;
use App\Exports\MesasSinFiscalExport;
use App\Exports\FiscalesElectronicosExport;
use App\Exports\FiscalesExport;
use App\Exports\VotosExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getMesas()
    {
        return Excel::download(new MesasExport, 'TotalMesas.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function getMesasConFiscal()
    {
        return Excel::download(new MesasFiscalExport, 'MesasConFiscal.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function getMesasSinFiscal()
    {
        return Excel::download(new MesasSinFiscalExport, 'MesasSinFiscal.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function getFiscales()
    {
        return Excel::download(new FiscalesExport, 'Fiscales.xlsx');
    }

    public function getFiscalesElectronicos()
    {
        return Excel::download(new FiscalesElectronicosExport, 'FiscalesElectronicos.xlsx');
    }

    public function getVotos()
    {
        return Excel::download(new FiscalesExport, 'Fiscales.xlsx');
    }

    public function getVotosMuestra()
    {
        return Excel::download(new VotosExport, 'Votos.xlsx');
    }

}
