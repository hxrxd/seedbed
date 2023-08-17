<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Fiscal;
use App\Models\Mesa;
use App\Models\Voto;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class VotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $votos = Voto::all();
        $semilla = Voto::sum('semilla');
        $une = Voto::sum('une');
        $nulo = Voto::sum('nulo');
        $blanco = Voto::sum('blanco');
        $sinusar = Voto::sum('sinusar');
        $mesas = Mesa::whereNotNull('fiscal')->get();
        $votoCount = $votos->count();
        $countMesas = $mesas->count();

        $GTAV =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTAV'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'ALTA VERAPAZ')->groupBy('departamento')->first();
        $GTBV =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTBV'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'BAJA VERAPAZ')->groupBy('departamento')->first();
        $GTCM =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTCM'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'CHIMALTENANGO')->groupBy('departamento')->first();
        $GTCQ =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTCQ'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'CHIQUIMULA')->groupBy('departamento')->first();
        $GTES =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTES'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'ESCUINTLA')->groupBy('departamento')->first();
        $GTGU =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTGU'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'GUATEMALA')->groupBy('departamento')->first();
        $GTHU =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTHU'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'HUEHUETENANGO')->groupBy('departamento')->first();
        $GTIZ =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTIZ'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'IZABAL')->groupBy('departamento')->first();
        $GTJA =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTJA'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'JALAPA')->groupBy('departamento')->first();
        $GTJU =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTJU'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'JUTIAPA')->groupBy('departamento')->first();
        $GTPE =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTPE'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'PETÉN')->groupBy('departamento')->first();
        $GTPR =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTPR'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'EL PROGRESO')->groupBy('departamento')->first();
        $GTQC =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTQC'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'QUICHÉ')->groupBy('departamento')->first();
        $GTQZ =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTQZ'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'QUETZALTENANGO')->groupBy('departamento')->first();
        $GTRE =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTRE'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'RETALULEU')->groupBy('departamento')->first();
        $GTSA =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSA'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'SACATEPÉQUEZ')->groupBy('departamento')->first();
        $GTSM =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSM'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'SAN MARCOS')->groupBy('departamento')->first();
        $GTSO =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSO'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'SOLOLÁ')->groupBy('departamento')->first();
        $GTSR =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSR'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'SANTA ROSA')->groupBy('departamento')->first();
        $GTSU =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSU'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'SUCHITEPÉQUEZ')->groupBy('departamento')->first();
        $GTTO =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTTO'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'TOTONICAPÁN')->groupBy('departamento')->first();
        $GTZA =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTZA'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('departamento', '=', 'ZACAPA')->groupBy('departamento')->first();
        $diff1 = DB::table('votos')->select(DB::raw('departamento, sum(semilla)- sum(une) as diff '))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->groupBy('departamento')->orderByDesc('diff')->first();
        $diff2 = DB::table('votos')->select(DB::raw('departamento, -sum(semilla)+ sum(une) as diff '))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->groupBy('departamento')->orderByDesc('diff')->first();

        if(abs($diff1->diff)>=abs($diff2->diff)){
            $MAX= abs($diff1->diff);
            $MIN= abs($diff1->diff);
        }
        else{
            $MAX= abs($diff2->diff);
            $MIN= abs($diff2->diff);
        }

        $votos = DB::table('votos as v')->select(['semilla','une','blanco','nulo','v.jrv','departamento','municipio','m.nombre'])->join('mesas as m', 'v.jrv', '=', 'm.jrv')->get();


        return view('voto.index', ['votos'=>$votos,'votoCount'=>$votoCount,'countMesas'=>$countMesas,
        'semilla'=>$semilla,'une'=>$une,'nulo'=>$nulo,'blanco'=>$blanco,'sinusar'=>$sinusar,
        'GTAV'=>$GTAV,'GTBV'=>$GTBV,'GTCM'=>$GTCM,'GTCQ'=>$GTCQ,'GTES'=>$GTES,'GTGU'=>$GTGU,'GTHU'=>$GTHU,
        'GTIZ'=>$GTIZ,'GTJA'=>$GTJA,'GTJU'=>$GTJU,'GTPE'=>$GTPE,'GTPR'=>$GTPR,'GTQC'=>$GTQC,'GTQZ'=>$GTQZ,
        'GTRE'=>$GTRE,'GTSA'=>$GTSA,'GTSM'=>$GTSM,'GTSO'=>$GTSO,'GTSR'=>$GTSR,'GTSU'=>$GTSU,'GTTO'=>$GTTO,'GTZA'=>$GTZA,
        'MAX'=>$MAX,'MIN'=>$MIN,'votos'=>$votos]);
    }

    public function indexMuestra()
    {
        //
        $votos = Voto::join('mesas', 'votos.jrv', '=', 'mesas.jrv')
        ->where('mesas.muestra', 1)
        ->select('votos.*')
        ->get();

        $semilla = Voto::join('mesas', 'votos.jrv', '=', 'mesas.jrv')
        ->where('mesas.muestra', 1)->sum('semilla');

        $une = Voto::join('mesas', 'votos.jrv', '=', 'mesas.jrv')
        ->where('mesas.muestra', 1)->sum('une');
        $nulo = Voto::join('mesas', 'votos.jrv', '=', 'mesas.jrv')
        ->where('mesas.muestra', 1)->sum('nulo');
        $blanco = Voto::join('mesas', 'votos.jrv', '=', 'mesas.jrv')
        ->where('mesas.muestra', 1)->sum('blanco');
        $sinusar = Voto::join('mesas', 'votos.jrv', '=', 'mesas.jrv')
        ->where('mesas.muestra', 1)->sum('sinusar');

        $mesas = Mesa::where('muestra',1)->get();
        $votoCount = $votos->count();
        $countMesas = $mesas->count();

        $GTAV =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTAV'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'ALTA VERAPAZ')->groupBy('departamento')->first();
        $GTBV =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTBV'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'BAJA VERAPAZ')->groupBy('departamento')->first();
        $GTCM =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTCM'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'CHIMALTENANGO')->groupBy('departamento')->first();
        $GTCQ =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTCQ'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'CHIQUIMULA')->groupBy('departamento')->first();
        $GTES =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTES'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'ESCUINTLA')->groupBy('departamento')->first();
        $GTGU =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTGU'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'GUATEMALA')->groupBy('departamento')->first();
        $GTHU =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTHU'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'HUEHUETENANGO')->groupBy('departamento')->first();
        $GTIZ =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTIZ'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'IZABAL')->groupBy('departamento')->first();
        $GTJA =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTJA'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'JALAPA')->groupBy('departamento')->first();
        $GTJU =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTJU'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'JUTIAPA')->groupBy('departamento')->first();
        $GTPE =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTPE'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'PETÉN')->groupBy('departamento')->first();
        $GTPR =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTPR'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'EL PROGRESO')->groupBy('departamento')->first();
        $GTQC =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTQC'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'QUICHÉ')->groupBy('departamento')->first();
        $GTQZ =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTQZ'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'QUETZALTENANGO')->groupBy('departamento')->first();
        $GTRE =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTRE'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'RETALULEU')->groupBy('departamento')->first();
        $GTSA =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSA'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'SACATEPÉQUEZ')->groupBy('departamento')->first();
        $GTSM =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSM'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'SAN MARCOS')->groupBy('departamento')->first();
        $GTSO =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSO'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'SOLOLÁ')->groupBy('departamento')->first();
        $GTSR =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSR'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'SANTA ROSA')->groupBy('departamento')->first();
        $GTSU =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTSU'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'SUCHITEPÉQUEZ')->groupBy('departamento')->first();
        $GTTO =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTTO'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'TOTONICAPÁN')->groupBy('departamento')->first();
        $GTZA =DB::table('votos')->select(DB::raw('sum(semilla)- sum(une) as GTZA'))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->where('mesas.muestra',1)->where('departamento', '=', 'ZACAPA')->groupBy('departamento')->first();
        $diff1 = DB::table('votos')->select(DB::raw('departamento, sum(semilla)- sum(une) as diff '))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->groupBy('departamento')->orderByDesc('diff')->first();
        $diff2 = DB::table('votos')->select(DB::raw('departamento, -sum(semilla)+ sum(une) as diff '))->join('mesas', 'votos.jrv', '=', 'mesas.jrv')->groupBy('departamento')->orderByDesc('diff')->first();

        if(abs($diff1->diff)>=abs($diff2->diff)){
            $MAX= abs($diff1->diff);
            $MIN= abs($diff1->diff);
        }
        else{
            $MAX= abs($diff2->diff);
            $MIN= abs($diff2->diff);
        }

        $votos = DB::table('votos as v')->select(['semilla','une','blanco','nulo','v.jrv','departamento','municipio','m.nombre'])->join('mesas as m', 'v.jrv', '=', 'm.jrv')->where('m.muestra',1)->get();


        return view('voto.index', ['votos'=>$votos,'votoCount'=>$votoCount,'countMesas'=>$countMesas,
        'semilla'=>$semilla,'une'=>$une,'nulo'=>$nulo,'blanco'=>$blanco,'sinusar'=>$sinusar,
        'GTAV'=>$GTAV,'GTBV'=>$GTBV,'GTCM'=>$GTCM,'GTCQ'=>$GTCQ,'GTES'=>$GTES,'GTGU'=>$GTGU,'GTHU'=>$GTHU,
        'GTIZ'=>$GTIZ,'GTJA'=>$GTJA,'GTJU'=>$GTJU,'GTPE'=>$GTPE,'GTPR'=>$GTPR,'GTQC'=>$GTQC,'GTQZ'=>$GTQZ,
        'GTRE'=>$GTRE,'GTSA'=>$GTSA,'GTSM'=>$GTSM,'GTSO'=>$GTSO,'GTSR'=>$GTSR,'GTSU'=>$GTSU,'GTTO'=>$GTTO,'GTZA'=>$GTZA,
        'MAX'=>$MAX,'MIN'=>$MIN,'votos'=>$votos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($jrv)
    {
        //comprobación si son las 6 pm
        if(true){
            //copmprobación si ya registro el voto
            $id = Auth::user('email');
            $voto = Voto::where('fiscal',$id->email)->first();
            if($voto==null){


                $mesa = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('jrv',$jrv)->first();
                return view('voto.create', ['mesa'=>$mesa]);
            }
            else{
                return redirect('/voto/'.$voto->id);
            }

        }

    }
    /**
     * Review
     */
    public function createstore(Request $request)
    {
        try{

            $validator = Validator::make($request->all(),
            [
                'semilla' => 'required',
                'une' => 'required',
                'blanco' => 'required',
                'nulo' => 'required',
                'sinusar' => 'required',
            ],
            [
                'semilla.required' => 'Los votos de semilla son obligatorios.',
                'une.required' => 'Los votos de une son obligatorios.',
                'blanco.required' => 'Los votos en blanco son obligatorios.',
                'nulo.required' => 'Los votos  nulos son obligatorios.',
                'sinusar.required' => 'Las papeletas anuladas son obligatorios.',
                // Agrega aquí otros mensajes personalizados para otras reglas de validación
            ]
            );

            if ($validator->fails()) {
                return redirect('voto/create/'.$request->jrv)
                            ->withErrors($validator)
                            ->withInput();
            }

            $semillaold = $request->semilla;
            $uneold = $request->une;
            $blancoold = $request->blanco;
            $nuloold = $request->nulo;
            $sinusarold = $request->sinusar;

            $id = Auth::user('email');
            $fiscal = Fiscal::where('correo',$id->email)->first();
            $mesa = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal',$id->email)->first();

            return view('voto.createv', ['fiscal'=>$fiscal,'mesa'=>$mesa,'semillaold'=>$semillaold,'uneold'=>$uneold,'blancoold'=>$blancoold,'nuloold'=>$nuloold,'sinusarold'=>$sinusarold]);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->messages();
            return response()->json(['errors' => $errors], 422);
        }

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar votos
            $validator = Validator::make($request->all(), [
                'semilla' => 'required|numeric|in:'.$request->semillaold,
                'une' => 'required|numeric|in:'.$request->uneold,
                'blanco' => 'required|numeric|in:'.$request->blancoold,
                'nulo' => 'required|numeric|in:'.$request->nuloold,
                'sinusar' => 'required|numeric|in:'.$request->sinusarold,
            ],
            [
                'semilla.required' => 'Los votos de semilla son obligatorios.',
                'une.required' => 'Los votos de une son obligatorios.',
                'blanco.required' => 'Los votos en blanco son obligatorios.',
                'nulo.required' => 'Los votos  nulos son obligatorios.',
                'sinusar.required' => 'Las papeletas anuladas son obligatorios.',
                //in
                'semilla.in' => 'Los votos de semilla difieren.',
                'une.in' => 'Los votos de une difieren.',
                'blanco.in' => 'Los votos en blanco difieren.',
                'nulo.in' => 'Los votos  nulos difieren.',
                'sinusar.in' => 'Las papeletas anuladas difieren.',
            ]
            );

            if ($validator->fails()) {
                return redirect('voto/create/'.$request->jrv)
                            ->withErrors($validator)
                            ->withInput();
            }
            //Guardar
            $id = Auth::user('email');
            $votos = new Voto;

            $votos->semilla = $request->semilla;
            $votos->une = $request->une;
            $votos->blanco = $request->blanco;
            $votos->nulo = $request->nulo;
            $votos->sinusar = $request->sinusar;
            $votos->jrv = $request->jrv;
            $votos->fiscal = $id->email;
            $votos->save();

            return redirect('/dashboard');
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $voto = Voto::where('jrv',$id)->first();
        return view('voto.show', ['voto'=>$voto]);
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
