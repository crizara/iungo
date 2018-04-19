<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $persona = Persona::all();
        return response()->json($persona);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $persona = Persona::create($request->all());
        return response()->json($persona);
    }

    /**
     * Display the specified resource.
     *
     * @param  Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona) {
        return response()->json($persona);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona) {
        $persona = $persona->update($request->all());
        return response()->json($persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($persona) {
        $persona->delete();
    }

}
