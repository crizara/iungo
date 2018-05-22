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

    public function getFotoPerfil(Request $request) {
        $idPersona = $request->input('idpersona');
        $fotoperfil = DB::table('Galeria')->where('idPersona', $idPersona)->where('perfil', '1')->get();
        echo json_encode($fotoperfil[0]);
    }

    public function persona_json() {
        $id = Auth::id();
        $persona = DB::table('users')->select('persona.*')->join('persona', 'users.id', '=', 'persona.idUser')->where('users.id', $id)->get()[0];

        $seguir = false;

        while($seguir == false) {
            $aBuscar = DB::select('SELECT * FROM `persona` INNER JOIN Galeria on persona.idPersona = Galeria.idPersona WHERE persona.idPersona != ? and idSexe = ? and idbusca = ? and persona.idPersona not in (SELECT vistas.idReceptor from vistas where vistas.idEnviador = ?) ORDER by persona.idPersona LIMIT 1', [$persona->idPersona, $persona->idbusca, $persona->idSexe, $persona->idPersona]);
            if (sizeof($aBuscar) == 0) {
                $this->reiniciarVistes($persona->idPersona);
                $seguir = false;
            } else {
                $seguir = true;
            }
        }        
        echo json_encode($aBuscar);
    }

    public function reiniciarVistes($id) {
        DB::table('vistas')->where('idEnviador', '=', $id)->delete();
    }

    public function getIds() {
        $persones = DB::table('persona')->select('idPersona')->get();
        echo json_encode($persones);
    }

    public function store(Request $request) {
        $persona = Persona::create($request->all());
        return response()->json($persona);
    }

    public function show() {
        $id = Auth::id();
        $user = DB::table('users')->join('persona', 'users.id', '=', 'persona.idUser')->where('users.id', $id)->first();

        $user = get_object_vars($user);

        $fotoperfil = DB::table('Galeria')->where('idPersona', $user["idPersona"])->where('perfil', '1')->first();
        $fotoportada=DB::table('Galeria')->where('idPersona', $user["idPersona"])->where('perfil', '2')->first();

        if (sizeof($fotoperfil) == 0) {
            $fotoperfil = 'res.jpg';
        } else {
            $fotoperfil = $fotoperfil->img;
        }

        if (sizeof($fotoportada) == 0) {
            $fotoportada = 'res.jpg';
        } else {
            $fotoportada = $fotoportada->img;
        }

        if (sizeof($user) > 0) {
            return view('userPerfil', ['user' => $user, 'fotoperfil' => $fotoperfil, 'fotoportada' =>$fotoportada]);
        } else {
            return 'error no té persona';
        }
    }
    
    public function setMg(Request $request){
        
        $receptor = $request->input('idReceptor');
        
        $id = Auth::id();
        $user = DB::table('users')->join('persona', 'users.id', '=', 'persona.idUser')->where('users.id', $id)->get();
        DB::table('MeGusta')->insert(
                ['idEnviador'=>$user[0]->idPersona,'idReceptor'=>$receptor]
        );
    }

    public function setVista(Request $request){
        
        $receptor = $request->input('idReceptor');
        
        $id = Auth::id();
        $user = DB::table('users')->join('persona', 'users.id', '=', 'persona.idUser')->where('users.id', $id)->get();
        DB::table('vistas')->insert(
                ['idEnviador'=>$user[0]->idPersona,'idReceptor'=>$receptor]
        );
    }

    public function showperfil() {
        $id = Auth::id();
        $user = DB::table('users')->select('persona.*')->join('persona', 'users.id', '=', 'persona.idUser')->where('users.id', $id)->get();
        $user = $user->toArray();
        $arraySexe=DB::table('Sexo')->select('*')->get();
        $arraySexe = $arraySexe->toArray();

        for ($i = 0; $i < sizeof($arraySexe); $i++) {
            $arraySexe[$i] = get_object_vars($arraySexe[$i]);
        }
        //dd($arraySexe);
        for ($i = 0; $i < sizeof($user); $i++) {
            $user[$i] = get_object_vars($user[$i]);
        }
        if (sizeof($user) > 0) {

            return view('userPerfilEdit', ['user' => $user[0] , 'arraySexe' => $arraySexe]);
        } else {
            return 'error no té persona';
        }
    }

    public function edit($id) {
        $user = User::find($id);
        return view('userEdit', ['user' => $user]);
    }

    public function update($id, Request $request) {
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

    public function updateperfil($id, Request $request) {
        $userData = $request->all();
         DB::table('persona')
                ->where('idPersona', $id)
                ->update(
                        ['Cognom' => $userData["Cognom"]]
        );

        DB::table('persona')
                ->where('idPersona', $id)
                ->update(['Nom' => $userData["Nom"]]);
        
        DB::table('persona')
                ->where('idPersona', $id)
                ->update(['dataNeixement' => $userData["dataNeixement"]]);
          
        DB::table('persona')
                ->where('idPersona', $id)
                ->update(['idSexe' => $userData["idSexe"]]);
        DB::table('persona')
                ->where('idPersona', $id)
                ->update(['idbusca' => $userData["idbusca"]]);


        return redirect('/user/perfil');
    }

    public function eliminarUser($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('userList');
    }

    public function listarUserPersonas() {
        $user = DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')->select('users.*')->where('role_user.role_id', '!=', '1')->orderBy('users.id')->get();
        $user = $user->toArray();
        for ($i = 0; $i < sizeof($user); $i++) {
            $user[$i] = get_object_vars($user[$i]);
        }

        return view('userList', ['user' => $user]);
    }
public function update_img($idPersona){
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tem_Loc = $_FILES['file']['tmp_name'];    
if($file_name==""){
    return redirect('/user/perfil');
/*$imagen = DB::table('Galeria')->select('Galeria.img')->where('idPersona', $idPersona)->get();
    dd($imagen);*/
}else {
$file_store = public_path()."/images/". $file_name;
    move_uploaded_file($file_tem_Loc, $file_store);
    $existePortada=false;
    $fotoportada=DB::table('Galeria')->where('idPersona', $idPersona)->where('perfil', '1')->first();
    if($fotoportada==null) {
     DB::table('Galeria')->insert(
        ['idPersona' => $idPersona, 'img' => $file_name, 'ordre' => '0', 'perfil' =>'1' ]
        );
 }
 else {
  DB::table('Galeria')
  ->where('idPersona', $idPersona)->where('perfil', "1")
  ->update(
    ['img' => $file_name]
    );
}

}

return redirect('/user/perfil');
}

public function update_portada($idPersona){
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tem_Loc = $_FILES['file']['tmp_name'];    
    if($file_name==""){
        return redirect('/user/perfil');
/*$imagen = DB::table('Galeria')->select('Galeria.img')->where('idPersona', $idPersona)->get();
dd($imagen);*/
}else {
    $file_store = public_path()."/images/". $file_name;
    move_uploaded_file($file_tem_Loc, $file_store);
    $existePortada=false;
    $fotoportada=DB::table('Galeria')->where('idPersona', $idPersona)->where('perfil', '2')->first();
    if($fotoportada==null) {
     DB::table('Galeria')->insert(
        ['idPersona' => $idPersona, 'img' => $file_name, 'ordre' => '0', 'perfil' =>'2' ]
        );
 }
 else {
  DB::table('Galeria')
  ->where('idPersona', $idPersona)->where('perfil', "2")
  ->update(
    ['img' => $file_name]
    );
}
}
return redirect('/user/perfil');
}



public function info($idPersona){

        $user = DB::table('persona')->where('idPersona', $idPersona)->first();
        $user = get_object_vars($user);
        $fotoperfil = DB::table('Galeria')->where('idPersona', $user["idPersona"])->where('perfil', '1')->first();

        $fotoportada=DB::table('Galeria')->where('idPersona', $user["idPersona"])->where('perfil', '2')->first();

        $galeria=DB::table('Galeria')->where('idPersona', $user["idPersona"])->where('perfil', '0')->get();

        if (sizeof($fotoperfil) == 0) {
            $fotoperfil = 'res.jpg';
        } else {
            $fotoperfil = $fotoperfil->img;
           
        }

        if (sizeof($fotoportada) == 0) {
            $fotoportada = 'res.jpg';
        } else {
            $fotoportada = $fotoportada->img;
        }

        if (sizeof($user) > 0) {
            return view('userInfo', ['user' => $user, 'fotoperfil' => $fotoperfil, 'fotoportada' =>$fotoportada, 'galeria' => $galeria]);
        } else {
            return 'error no té persona';
        }



}
public function iungos() {
     $id = Auth::id();
        $user = DB::table('users')->select('persona.*')->join('persona', 'users.id', '=', 'persona.idUser')->where('users.id', $id)->first();

        $match = DB::select('SELECT persona.Nom, max(`MeGusta`.`dia`) as data FROM `MeGusta` INNER JOIN persona on MeGusta.idEnviador = persona.idPersona WHERE idReceptor = ? and idEnviador in (SELECT idReceptor from MeGusta where idEnviador = ?) group by `persona`.`nom` ORDER BY data DESC ',[$user->idPersona, $user->idPersona]);        
       
        return view('iungos',['match' => $match]);
    }

//WEB SERVICE

public function getpersones() {
    $persones = DB::table('persona')->get();

    return json_encode($persones);
}

public function getpersona($id) {
    $persona = DB::table('persona')->where('idPersona', $id)->first();

    return json_encode($persona);
}



}
