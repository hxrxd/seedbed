<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Fiscal;
use App\Models\Mesa;


use Auth;

class FiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$mesas = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->get();
        //return view('mesa.index',['mesas' => $mesas]);
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
            'rango_edad' => ['required', 'string'],
            'sexo' => ['required', 'string'],
            'correo' => ['required', 'string'],
            'status' => ['string'],
        ]);

        $fiscal = Fiscal::create($validatedData);


        return response()->json(['message' => 'Fiscal created successfully', 'data' => $fiscal], 201);
    }

    /**
     * Display the fiscal's profile form.
     */
    /*public function edit(Request $request): View
    {
        return view('fiscal.edit', [
            'fiscal' => $request->fiscal(),
        ]);
    }*/ 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $fiscal = Fiscal::where('correo','=',$id)->first();
        $mesa = Mesa::select('jrv','departamento','municipio','nombre','fiscal')->where('fiscal','=',$fiscal->correo)->first();
        return view('verificacion.fiscal', ['fiscal'=>$fiscal,'mesa'=>$mesa]);
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

}
