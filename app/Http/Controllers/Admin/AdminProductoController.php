<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Porducto;
use App\Categoria;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
class AdminProductoController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('haveacceso','Admin.Producto.index');
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
        Gate::authorize('haveacceso','Admin.Producto.create');
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
Gate::authorize('haveacceso','Admin.Producto.create');
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
        Gate::authorize('haveacceso','Admin.Producto.show');
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
        Gate::authorize('haveacceso','Admin.Producto.edit');
        $producto =Porducto::with('images','categoria')->where('slug_Pro',$slug)->firstOrFail();
        $categorias=Categoria::orderBy('nombre_Cat')->get();

        $estados_productos=$this->Estados_Productos();

        return view('plantillaAdmin.producto.edit',compact('producto','categorias','estados_productos'));
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('haveacceso','Admin.Producto.edit');
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
        Gate::authorize('haveacceso','Admin.Producto.destroy');
        $prod= Porducto::with('images')->findOrFail($id);
        foreach ($prod->images as $imagen) {
          
        $archivo=substr($imagen->url,1);
        File::delete($archivo);
        $imagen->delete();
        }

        $prod->delete();
        return redirect()->route('Admin.Producto.index')->with('datos','Registro Eliminado Correctamente');
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
