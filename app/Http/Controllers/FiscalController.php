<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Fiscal;
use App\Models\Mesa;
use App\Models\User;
use Carbon\Carbon;

use Auth;

class FiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fiscales = Fiscal::all();
        return view('fiscal.index',['fiscales' => $fiscales]);
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // fetch departments
        $departments = Mesa::distinct()->pluck('departamento');

        return view('fiscal.register', compact('departments'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'dpi' => ['required', 'integer'],
            'departamento' => ['required', 'string'],
            'municipio' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'fecha_nacimiento' => ['required', 'date'],
            'sexo' => ['required', 'string'],
            'correo' => ['required', 'string'],
            'fiscal_electronico' => ['string'],
            'status' => ['string'],
        ]);

        $validatedData['fecha_nacimiento'] = Carbon::parse($validatedData['fecha_nacimiento']);

        $fiscal = Fiscal::create($validatedData);

        // Merge code from updateJRV method
        $jrv = $request->input('jrv');
        $mesa = Mesa::findOrFail($jrv);
        $currentStatus = $mesa->estatus;

        $user = User::where('email',$request->input('correo'))->first();
        $user->rol="Fiscal";


        if ($currentStatus === 0) {
            $mesa->fiscal = $request->input('fiscal');
            $mesa->estatus = $request->input('estatus');
            $mesa->save();
            $user->save();

            $redirectUrl = url('/dashboard');
            return response()->json(['redirect_url' => $redirectUrl]);
        } else {
            return response()->json(['message' => 'ERROR']);
        }
    }

    /**
     * Display the fiscal's profile form.
     */
    public function edit($email): View
    {
        $fiscal = Fiscal::where('correo', $email)->first();

        if (!$fiscal) {
            abort(404);
        }

        // fetch departments
        $departments = Mesa::distinct()->pluck('departamento');

        return view('fiscal.edit', compact('fiscal','departments'));
    }

    /**
     * Update the fiscal info
     */
    public function updateFiscal(Request $request)
    {
        $fiscal = Fiscal::where('correo',$request->input('correo'))->first();

        if ($fiscal !== null) {
            $fiscal->update($request->all());
        } 

        $redirectUrl = url('/dashboard');
        return response()->json(['redirect_url' => $redirectUrl]);
    }

    /**
     * Downgrade fiscal
     */
    public function downgradeFiscal(Request $request)
    {
        $correo = $request->input('correo');

        Mesa::where('fiscal', $correo)->update([
            'fiscal' => null,
            'estatus' => 0
        ]);

        $user = User::where('email',$correo)->first();
        if ($user !== null) {
            $user->rol="Voluntario";
            $user->save();
        }

        $fiscal = Fiscal::where('correo',$correo)->first();

        if ($fiscal !== null) {
            //$fiscal->status = 'Inactive';
            $fiscal->delete();
        } 

        $redirectUrl = url('/dashboard');
        return response()->json(['redirect_url' => $redirectUrl]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Fetch the cities for a department
     *
     * @return response()
     */
    public function fetchCities(Request $request)
    {
        $data['cities'] = Mesa::distinct()->where("departamento", $request->departamento)
                                ->get(["municipio"]);

        return response()->json($data);
    }

    /**
     * Fetch the JRVs by center
     *
     * @return response()
     */
    public function fetchTablesByCenter(Request $request)
    {
        $center_name =  Mesa::where("jrv", $request->jrv)->pluck('nombre')->first();

        $data['jrvs_by_center'] = Mesa::where("nombre", $center_name)
                                    ->orderBy("jrv")
                                    ->orderBy("estatus")
                                    ->get(["jrv","latitude","longitude","nombre","ubicacion","zona","estatus","municipio"]);

        return response()->json($data);
    }

    /**
     * Fetch the JRVs by city
     *
     * @return response()
     */
    public function fetchTablesByCity(Request $request)
    {
        $center_name =  Mesa::where("jrv", $request->jrv)->pluck('nombre')->first();

        $data['jrvs_by_city'] = Mesa::where("municipio", $request->municipio)
                            ->whereNotIn("nombre", [$center_name]) // Prevent to get the tables in the same center
                            ->orderBy("jrv")
                            ->orderBy("estatus")
                            ->get(["jrv","latitude","longitude","nombre","ubicacion","zona","estatus"]);

        return response()->json($data);
    }

    /**
     * Check the the JRV's current status
     *
     * @return response()
     */
    public function checkJrvStatus(Request $request)
    {
        $status =  Mesa::where("jrv", $request->jrv)->pluck('estatus')->first();

        return response()->json($status);
    }

    /**
     * Update the specified JRV.
     */
    public function updateJRV(Request $request)
    {
        $mesa = Mesa::findOrFail($request->jrv);

        $currentStatus = $mesa->estatus;

        if ($currentStatus === 0) {
            $mesa->fiscal = Auth::user()->email;
            $mesa->estatus = 1;
            $mesa->save();

            $redirectUrl = url('/assignments');
            return response()->json(['redirect_url' => $redirectUrl]);
        } else {
            return response()->json(['message' => 'ERROR']);
        }
    }


    /**
     * Add new assignment
     */
    public function addAssignment(Request $request): View
    {
        $jrv = Mesa::where('fiscal', Auth::user()->email)->value('jrv');

        return view('fiscal.assignment', compact('jrv'));
    }

    /**
     * Check the assignment
     */
    public function checkAssignment(Request $request): View
    {
        $jrv = Mesa::findOrFail($request->jrv);;

        return view('fiscal.assignment-detail', compact('jrv'));
    }

    /**
     * Downgrade fiscal
     */
    public function removeJRV(Request $request)
    {
        Mesa::where('jrv', $request->jrv)->update([
            'fiscal' => null,
            'estatus' => 0
        ]);

        $redirectUrl = url('/dashboard');
        return response()->json(['redirect_url' => $redirectUrl]);
    }

    /**
     * List all asignments for a specific fiscal
     */
    public function listAssignments(Request $request): View
    {
        //$assignments = Mesa::where('fiscal', Auth::user()->email)->get();
        $assignments = Mesa::leftJoin('votos', 'mesas.jrv', '=', 'votos.jrv')
                        ->where('mesas.fiscal', Auth::user()->email)
                        ->select('mesas.*', \DB::raw('CASE WHEN votos.jrv IS NOT NULL THEN 1 ELSE 0 END AS votos'))
                        ->get();

        return view('fiscal.assignments', compact('assignments'));
    }

}
