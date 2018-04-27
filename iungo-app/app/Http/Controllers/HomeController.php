<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //ivan 23/04
        $request->user()->authorizeRoles(['user', 'admin']);
        return view('home');
    }
    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */

    public function listarPersonas() {
        $persona = Persona::all();
        return view('todos', ['persona' => $persona]);
    }
    
    

}
