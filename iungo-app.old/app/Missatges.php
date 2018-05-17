<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Missatges extends Model
{
   protected $fillable = ['idMissatge', 'value', 'hora', 'idEnviador', 'idReceptor	','type'];



}
