<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelRoles\Roles;
use App\ModelRoles\Permisos;

class RolesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         $nombre= $request->get('nombre');
         $roles=Roles::where('nombre','like',"%$nombre%")->orderBy('id','Desc')->paginate(5);
        return view('plantillaAdmin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $permisos= Permisos::get();
       return view('plantillaAdmin.roles.create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:50|unique:roles,nombre',
            'slug'=>'required|max:50|unique:roles,slug',
            'fullacceso'=>'required|in:Yes,No'
         ]);

        $role= Roles::create($request->all());
        if($request->get('permiso')){
            $role->permisos()->sync($request->get('permiso'));
        }
            return redirect()->route('Admin.Rol.index')->with('datos','Rol guardado correctamente');
        



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $roles= Roles::where('slug',$slug)->firstOrFail();
        $permisos= Permisos::get();
        $roles_permisos=[];
        foreach ($roles->permisos as $permisosr) {
            $roles_permisos[]=$permisosr->id;
         }         
        $editar='Si';
        //return $roles_permisos;
       return view('plantillaAdmin.roles.show',compact('permisos','roles','editar','roles_permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $roles= Roles::where('slug',$slug)->firstOrFail();
         $permisos= Permisos::get();
         $roles_permisos=[];
         foreach ($roles->permisos as $permisosr) {
            $roles_permisos[]=$permisosr->id;
         }
         
        $editar='Si';
        //return $roles_permisos;
       return view('plantillaAdmin.roles.edit',compact('permisos','roles','editar','roles_permisos'));    
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
        $roles= Roles::findOrFail($id);
         $request->validate([
            'nombre'=>'required|max:50|unique:roles,nombre,'.$roles->id,
            'slug'=>'required|max:50|unique:roles,slug,'.$roles->id,
            'fullacceso'=>'required|in:Yes,No'
         ]);

        $roles->update($request->all());
        if($request->get('permiso')){
            $roles->permisos()->sync($request->get('permiso'));
        }
            return redirect()->route('Admin.Rol.index')->with('datos','Rol editados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles= Roles::findOrFail($id);
        $roles->delete();
         return redirect()->route('Admin.Rol.index')->with('datos','Rol Removido correctamente');
    }
}
