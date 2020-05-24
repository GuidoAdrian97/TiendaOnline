<?php

namespace App\ModelRoles;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
	protected $fillable = [
        'nombre', 'slug', 'descripcion',
    ];
    public function roles(){
        return $this->belongsToMany('App\ModelRoles\Roles')->withTimesTamps();
    }
}
