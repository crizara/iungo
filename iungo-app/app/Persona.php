<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

     protected $fillable = ['name', 'cognom', 'email', 'password', 'privilegis', 'dataNeixement'];

}
