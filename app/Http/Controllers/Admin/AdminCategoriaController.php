<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;
class AdminCategoriaController extends Controller
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
        $categorias=Categoria::where('nombre_Cat','like',"%$nombre%")->orderBy('nombre_Cat')->paginate(2);

        return view('plantillaAdmin.Categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('plantillaAdmin.categoria.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $cat = new Categoria();

         $request->validate([
            'nombre'=>'required|max:50|unique:categorias,nombre_Cat',
            'slug'=>'required|max:50|unique:categorias,slug_Cat',
         ]);

        $cat->nombre_Cat=$request->nombre;
        $cat->slug_Cat =$request->slug;
        $cat->descripcion_Cat=$request->descripcion;
        $cat->save();
        return redirect()->route('Admin.Categoria.index')->with('datos','Registro Creado Correctamente');
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cat= Categoria::where('slug_Cat',$slug)->firstOrFail();
        $editar='Si';
        return view('plantillaAdmin.categoria.show',compact('cat','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         $cat= Categoria::where('slug_Cat',$slug)->firstOrFail();
        $editar='Si';
        return view('plantillaAdmin.categoria.edit',compact('cat','editar'));
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
        
        $cat= Categoria::findOrFail($id);
        $request->validate([
            'nombre'=>'required|max:50|unique:categorias,nombre_Cat',
            'slug'=>'required|max:50|unique:categorias,slug_Cat',
         ]);
        $cat->nombre_Cat=$request->nombre;
        $cat->slug_Cat=$request->slug;
        $cat->descripcion_Cat=$request->descripcion;
        
        $cat->save();

        return redirect()->route('Admin.Categoria.index')->with('datos','Registro Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= Categoria::findOrFail($id);
        $cat->delete();
        return redirect()->route('Admin.Categoria.index')->with('datos','Registro Eliminado Correctamente');
    }
}
