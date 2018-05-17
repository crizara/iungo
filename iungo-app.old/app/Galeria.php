<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $fillable = ['idGaleria', 'idPersona', 'img', 'ordre', 'perfil'];
}
