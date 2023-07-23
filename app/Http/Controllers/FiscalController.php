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
                                    ->get(["jrv","latitude","longitude","nombre","ubicacion","zona","estatus"]);

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
    public function updateJRV(Request $request, $jrv)
    {
        $mesa = Mesa::findOrFail($jrv);

        $currentStatus = $mesa->estatus;

        if ($currentStatus === 0) {
            $mesa->fiscal = $request->input('fiscal');
            $mesa->estatus = $request->input('estatus');
            $mesa->save();

            return response()->json(['message' => 'SUCCESS']);
        } else {
            return response()->json(['message' => 'ERROR']);
        }
    }

}
