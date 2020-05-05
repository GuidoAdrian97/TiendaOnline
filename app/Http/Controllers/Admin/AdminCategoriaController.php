<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;
class AdminCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=Categoria::orderBy('nombre')->paginate(2);
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
        $cat->nombre=$request->nombre;
        $cat->slug =$request->slug;
        $cat->descripcion=$request->descripcion;
        $cat->save();
        return redirect()->route('Admin.Categoria.index')->with('datos','Registro Creado Correctamente');
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         $cat= Categoria::where('slug',$slug)->firstOrFail();
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
        $cat->nombre=$request->nombre;
        $cat->slug =$request->slug;
        $cat->descripcion=$request->descripcion;
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
        //
    }
}
