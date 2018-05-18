<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Persona as Authenticatable;

class Persona extends Model {
    
    public $table = "persona";

    protected $tfillable = 'singular';
    protected $fillable = ['idPersona', 'idUser', 'Nom', 'Cognom', 'dataNeixement', 'idSexe', 'idBusca'];

}
