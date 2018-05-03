<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['idPersona', 'idUser', 'Nom', 'Cognom', 'dataNeixement','Sexe'];
}
