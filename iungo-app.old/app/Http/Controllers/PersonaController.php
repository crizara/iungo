<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\User;

class PersonaController extends Controller {

    public function index() {
        $persona = Persona::all();
        return response()->json($persona);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $persona = Persona::create($request->all());
        return response()->json($persona);
    }

    public function show(Persona $persona) {
        return response()->json($persona);
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, Persona $persona) {
        $persona = $persona->update($request->all());
        return response()->json($persona);
    }

    public function eliminarUser($id)
    {
       $user = User::find($id);
       $user->delete();
       return redirect('userList');
   }

    public function listarUserPersonas() {
        $user=User::all();
        return view ('userList',['user'=>$user]);
    } 





}
