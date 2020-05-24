<?php

namespace App\ModelRoles;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
	//desde aqui comienza el codigo
    protected $fillable = [
        'nombre', 'slug', 'descripcion','fullacceso',
    ];

    public function users(){
    	return $this->belongsToMany('App\User')->withTimesTamps();
    }
    public function permisos(){
        return $this->belongsToMany('App\ModelRoles\Permisos')->withTimesTamps();
    }
}
