<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Porducto;
use App\Categoria;
class AdminProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $nombre= $request->get('nombre');
        $productos=Porducto::where('nombre_Pro','like',"%$nombre%")->orderBy('nombre_Pro')->paginate(2);

        return view('plantillaAdmin.producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias=Categoria::orderBy('nombre_Cat')->get();

        return view('plantillaAdmin.producto.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod= new Porducto();

        $prod->nombre_Pro=$request->nombre;
        $prod->slug_Pro=$request->slug;
        $prod->categoria_id=$request->categoria_id;
        $prod->cantidad_Pro=$request->cantidad;
        $prod->precio_anterior_Pro=$request->precio_anterior_Pro;
        $prod->precio_actual_Pro=$request->precio_actual_Pro;
        $prod->porcentaje_descuento_Pro=$request->porcentaje_descuento_Pro;
        $prod->descripcion_corta_Pro=$request->descripcion_corta_Pro;
        $prod->descripcion_larga_Pro=$request->descripcion_larga_Pro;
        $prod->especificacion_Pro=$request->especificacion_Pro;
        $prod->datoInteres_Pro=$request->datoInteres_Pro;
        $prod->estado_Pro=$request->estado_Pro;

        if($request->activo_Pro){
             $prod->activo_Pro='Si';
        }
        else{
             $prod->activo_Pro='No';
        }
        if($request->slinderprincipal_Pro){
             $prod->slinderprincipal_Pro='Si';
        }
        else{
             $prod->slinderprincipal_Pro='Si';
        }
        $prod->save();
        return $prod;


     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

    }

    public function update(Request $request, $id)
    {
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
