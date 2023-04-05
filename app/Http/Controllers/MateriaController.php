<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMateriaRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateMateriaRequest;

class MateriaController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        //
        // dd($request['name']);
        $estudiante = new Materia();
        $estudiante->name       = $request['name'];
        $estudiante->save();
         return Redirect::to('subjects');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        //
        // dd($request['name']);
        $estudiante =  Materia::find($request['id']);
        $estudiante->name       = $request['name'];
        $estudiante->save();
         // redirect
         return Redirect::to('subjects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
