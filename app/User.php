<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image(){
        return $this->morphOne('App\Image','imageable');
    }

    public function roles(){
        return $this->belongsToMany('App\ModelRoles\Roles')->withTimesTamps();
    }

    public function havepermisos($permisos){

        foreach ($this->roles as $rol) {
           if($rol['fullacceso']=='yes'){
            return true;
           }
           foreach ($rol->permisos as $perm) {
           if($perm->slug==$permisos){
            return true;
           }

        }

        }
       return false;
    }

}
