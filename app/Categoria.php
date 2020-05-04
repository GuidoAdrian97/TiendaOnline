<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   public function Porducto(){
    	return $this->hasMany('App\Porducto');
    }
}
