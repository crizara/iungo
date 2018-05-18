<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Persona;
use App\User;
use App\Missatges;

class MensajesController extends Controller
{
   
public function mostrarColumnaChats() {
      $id=Auth::id();
      $idEnviador = DB::select('select idPersona from persona where idUser = :id', ['id' => $id]);
      $idloged=$idEnviador[0]->idPersona;

      $columnaChat=DB::select('select t.chats, max(t.hora) as diahora from (SELECT idReceptor as chats, hora FROM Missatges WHERE idEnviador = ' . $idloged .' UNION SELECT idEnviador as chats, hora FROM Missatges WHERE idReceptor = '. $idloged .' UNION SELECT idEnviador as chats, dia FROM `MeGusta` WHERE idReceptor = ' . $idloged .' and idEnviador in (SELECT idReceptor from MeGusta where idEnviador = ' . $idloged .')
) t group by t.chats ORDER BY diahora  DESC');

      $personesChats = array();

      for ($i=0; $i < sizeof($columnaChat); $i++) { 
       $personesChats[$i]=DB::select('select * from persona INNER JOIN Galeria on persona.idPersona = Galeria.idPersona where persona.idPersona = ' . $columnaChat[$i]->chats . ' AND Galeria.perfil = 1')[0];
      }

      //var_dump($personesChats);
   
 //$personesChats[$i]=DB::select('select Nom from persona where idPersona = :id', ['id' => $columnaChat[$i]->chats]);
   return view('userChats', ['personesChats' => $personesChats]);
    

}
public function mostrarChatCorrespondiente($id){
 $idLoged=Auth::id();  
$idEnviador = DB::select('select * from persona where idUser = :id', ['id' => $idLoged]);
$idloged=$idEnviador[0]->idPersona;
$idPersonaColumna=$id;
$nomReceptor = DB::select('select * from persona where idPersona = :id', ['id' => $idPersonaColumna]);
//dd($nomReceptor);
$chats=DB::select('select * FROM Missatges WHERE (idEnviador ='.$idloged.' and idReceptor ='.$idPersonaColumna.' ) OR (idEnviador = '.$idPersonaColumna.' and idReceptor = '.$idloged.')  
ORDER BY Missatges.hora');

foreach ($chats as $missatge) {
  $missatgeValue = str_replace(">","&gt;",str_replace("<","&lt;", $missatge->value));
	if ($idloged == $missatge->idEnviador) {    

		echo '<li class="clearfix"><div class="message-data align-right"><span class="message-data-time" >' . $missatge->hora . '</span> &nbsp; &nbsp;<span class="message-data-name" >Tú</span> <i class="fa fa-circle me"></i></div><div class="message other-message float-right">' . $missatgeValue .'</div></li>';
	} else {
		echo '<li class="personachat"><div class="message-data"><span class="message-data-name"><i class="fa fa-circle online"></i><span class="persona"> ' . $nomReceptor[0]->Nom . " " . $nomReceptor[0]->Cognom . '</span></span><span class="message-data-time">' . $missatge->hora . '</span></div><div class="message my-message">' . $missatgeValue .'</div></li>';
	}
}

}


public function sendChat(Request $request){

	$id = Auth::id();
    $user = DB::table('users')->join('persona', 'users.id', '=', 'persona.idUser')->where('users.id', $id)->get();

$idreceptor = $request->input('idReceptor');
$mensaje=$request->input('mensaje');

    echo date("Y-m-d H:i:s");

DB::table('Missatges')->insert(
                ['value' => $mensaje, 'idEnviador'=>$user[0]->idPersona,'idReceptor'=>$idreceptor, 'type' => 'text']
        );

}





}