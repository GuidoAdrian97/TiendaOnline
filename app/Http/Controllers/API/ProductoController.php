<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Porducto;
use App\Image;
use Illuminate\Support\Facades\File;
class ProductoController extends Controller
{
    public function index()
    {
       //  $cat=new Porducto();
       // $cat->nombre='Mujer';
       // $cat->slug='mujer';
       // $cat->descripcion='ROPA DE MUJER';
       // $cat->save();
         return Porducto::all();
    }

    public function show($slug)
    {
        if(Porducto::where('slug_Pro',$slug)->first()){
            return 'Slug Existe';
        }else{
            return 'Slug Disponible';
        }
       
    }

    public function eliminarimagen($id)
    {
        $imagen=Image::find($id);
        $archivo=substr($imagen->url,1);
        $eliminar=File::delete($archivo);
        $imagen->delete();
       return 'La imagen con id '+$id+' se elimino correctamente';
    }
}
