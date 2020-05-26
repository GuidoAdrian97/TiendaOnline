<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\User;
class UsuarioController extends Controller
{
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($correo)
    {
        
        if(User::where('email',$correo)->first()){
            return 'Correo Existe';
        }else{
            return 'Correo Disponible';
        }
    }
}
