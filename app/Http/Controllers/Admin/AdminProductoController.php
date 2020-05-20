<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Porducto;
use App\Categoria;
class AdminProductoController extends Controller
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
        $productos=Porducto::with('images','categoria')->where('nombre_Pro','like',"%$nombre%")->orderBy('nombre_Pro')->paginate(2);

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

        $estados_productos=$this->Estados_Productos();
        return view('plantillaAdmin.producto.create',compact('categorias','estados_productos'));
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
            'nombre'=>'required|unique:porductos,nombre_Pro',
            'slug'=>'required|unique:porductos,slug_Pro',
            'imagenes.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);

        $urlimagenes=[];

        if($request->hasFile('imagenes')){
            $imagenes=$request->file('imagenes');
            foreach ($imagenes as $imagen) {
                $nombre= time().'_'.$imagen->getClientOriginalName();

                $ruta=public_path().'/imagenes';
                $imagen->move($ruta,$nombre);

                $urlimagenes[]['url']='/imagenes/'.$nombre;
            }
        }



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
        $prod->images()->createMany($urlimagenes);
        return redirect()->route('Admin.Producto.index')->with('datos','Registro Creado Correctamente');
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $producto =Porducto::with('images','categoria')->where('slug_Pro',$slug)->firstOrFail();
        $categorias=Categoria::orderBy('nombre_Cat')->get();

        $estados_productos=$this->Estados_Productos();

        return view('plantillaAdmin.producto.show',compact('producto','categorias','estados_productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $producto =Porducto::with('images','categoria')->where('slug_Pro',$slug)->firstOrFail();
        $categorias=Categoria::orderBy('nombre_Cat')->get();

        $estados_productos=$this->Estados_Productos();

        return view('plantillaAdmin.producto.edit',compact('producto','categorias','estados_productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required|unique:porductos,nombre_Pro,'.$id,
            'slug'=>'required|unique:porductos,slug_Pro,'.$id,
            'imagenes.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);

        $urlimagenes=[];

        if($request->hasFile('imagenes')){
            $imagenes=$request->file('imagenes');
            foreach ($imagenes as $imagen) {
                $nombre= time().'_'.$imagen->getClientOriginalName();

                $ruta=public_path().'/imagenes';
                $imagen->move($ruta,$nombre);

                $urlimagenes[]['url']='/imagenes/'.$nombre;
            }
        }



        $prod= Porducto::findOrFail($id);

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
        $prod->images()->createMany($urlimagenes);
        return redirect()->route('Admin.Producto.edit',$prod->slug_Pro)->with('datos','Registro Actualizado Correctamente');
       
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

    public function Estados_Productos(){
        return [
            '',
            'Nuevo',
            'En Oferta',
            'Popular'
        ];
    }
}
