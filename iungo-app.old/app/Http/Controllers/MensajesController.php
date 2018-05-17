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

      $columnaChat=DB::select('select chats from (SELECT * from (
        (SELECT idReceptor as chats, hora FROM Missatges WHERE idEnviador = ' . $idloged . ' ORDER by hora DESC)
        UNION
        (SELECT idEnviador as chats, hora FROM Missatges WHERE idReceptor = ' . $idloged . ' ORDER by hora DESC)) bd  
        ORDER BY bd.hora DESC) dd  GROUP by chats ORDER by hora');

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
$idEnviador = DB::select('select idPersona from persona where idUser = :id', ['id' => $idLoged]);
$idloged=$idEnviador[0]->idPersona;
$idPersonaColumna=$id;
$chat=DB::select('select * FROM Missatges WHERE (idEnviador ='.$idloged.' and idReceptor ='.$idPersonaColumna.' ) OR (idEnviador = '.$idPersonaColumna.' and idReceptor = '.$idloged.')  
ORDER BY Missatges.hora');


dd($chat);


return view('userChats', ['chats' => $chats]);


}



}