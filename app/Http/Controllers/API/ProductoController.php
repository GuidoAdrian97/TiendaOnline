<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Porducto;
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
}
