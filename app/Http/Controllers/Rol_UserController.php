<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelRoles\Roles;
use App\ModelRoles\Permisos;
use App\User;
use Illuminate\Support\Facades\Gate;
class Rol_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('haveacceso','Admin.Rol_User.index');
        $nombre= $request->get('nombre');
        $Users = User::where('name','like',"%$nombre%")->orderBy('name')->paginate(7);

        return view('plantillaAdmin.usuarios.index',compact('Users'));

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
    public function show($id)
    {
        Gate::authorize('haveacceso','Admin.Rol_User.show');
        $User= User::where('id',$id)->firstOrFail();
        $roles= Roles::get();
        $roles_usuario=[];
        foreach ($User->roles as $rol){
            $roles_usuario[]=$rol->id;
        }
        $editar='Si';
       // return $roles;
        return view('plantillaAdmin.usuarios.show',compact('roles','User','editar','roles_usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('haveacceso','Admin.Rol_User.edit');
       $User= User::where('id',$id)->firstOrFail();
        $roles= Roles::get();
        $roles_usuario=[];
        foreach ($User->roles as $rol){
            $roles_usuario[]=$rol->id;
        }
        $editar='Si';
       // return $roles;
        return view('plantillaAdmin.usuarios.edit',compact('roles','User','editar','roles_usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('haveacceso','Admin.Rol_User.update');
        $User= User::findOrFail($id);
         $request->validate([
            'Correo'=>'required|unique:roles,nombre,'.$User->id
         ]);
        $User->update($request->all());
        if($request->get('rol')){
            $User->roles()->sync($request->get('rol'));
        }
            return redirect()->route('Admin.Rol_User.index')->with('datos','Roles del Usuario editados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('haveacceso','Admin.Rol_User.destroy');
        $User= User::findOrFail($id);
        $User->delete();
         return redirect()->route('Admin.Rol_User.index')->with('datos','Usuario Removido correctamente');
    }
}
