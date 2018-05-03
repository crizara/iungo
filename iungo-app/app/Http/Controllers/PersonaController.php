<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Persona;
use App\User;
use App\Galeria;

class PersonaController extends Controller {

    public function index() {
        $persona = Persona::all();
        return response()->json($persona);
    }

    public function create() {
        //
    }

    public function getFotoPerfil(Request $request)
    {
      $idPersona = $request->input('idpersona');
      $fotoperfil = DB::table('Galeria')->where('idPersona', $idPersona)->where('perfil', '1')->get();
      echo json_encode($fotoperfil[0]);
    }

    public function getIds()
    {
      $persones = DB::table('persona')->select('idPersona')->get();
      echo json_encode($persones);
    }

    public function store(Request $request) {
        $persona = Persona::create($request->all());
        return response()->json($persona);
    }

    public function show() {
      $id=Auth::id();
      $user = DB::table('users')->join('persona', 'users.id', '=', 'persona.idUser')->join('Galeria', 'persona.idPersona', '=', 'Galeria.idPersona')->where('users.id', $id)->get();
       $user = $user->toArray();
        for ($i=0; $i < sizeof($user); $i++) {
          $user[$i] = get_object_vars($user[$i]);
        }
   
      return view('userPerfil', ['user' => $user[0]]);
    }





 public function edit($id){
        //get post data by id
        $user = User::find($id);
        //load form view
        return view('userEdit', ['user' => $user]);
    }
    
    public function update($id, Request $request){
        //validate post data
       // $this->validate($request, [
           // 'title' => 'required',
           // 'content' => 'required'
       // ]);
        
        //get post data
        $userData = $request->all();
        
        //update post data
        User::find($id)->update($userData);
        
        //store status message
       // Session::flash('success_msg', 'Post updated successfully!');

        return redirect('userList');
    }

    public function eliminarUser($id)
    {
       $user = User::find($id);
       $user->delete();
       return redirect('userList');
   }

    public function listarUserPersonas() {
        $user= DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')->select('users.*')->where('role_user.role_id', '!=', '1')->orderBy('users.id')->get();
        $user = $user->toArray();
        for ($i=0; $i < sizeof($user); $i++) {
          $user[$i] = get_object_vars($user[$i]);
        }

        return view ('userList',['user'=>$user]);
    } 





}
