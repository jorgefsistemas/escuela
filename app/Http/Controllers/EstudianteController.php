<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // dd("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        //
        // dd($request['name']);
        $estudiante = new Estudiante;
        $estudiante->name       = $request['name'];
        $estudiante->email      = $request['email'];
        $estudiante->save();
         return Redirect::to('students');

    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // dd( $request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        //
        // dd($request['name']);
        $estudiante =  Estudiante::find($request['id']);
        $estudiante->name       = $request['name'];
        $estudiante->email      = $request['email'];
        $estudiante->save();
         // redirect
         return Redirect::to('students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
