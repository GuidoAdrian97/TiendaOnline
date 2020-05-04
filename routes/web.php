<?php
use App\Porducto;
use App\Categoria;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	// $prod=Categoria::find(2)->porducto;
// $prod->nombre='Prodcuto 3';
// $prod->slug='Prodcuto 3';
// $prod->categoria_id=2;
// $prod->descripcion_corta='Prodcuto 3';
// $prod->descripcion_larga='Prodcuto 3';
// $prod->especificacion='Prodcuto 3';
// $prod->datoInteres='Prodcuto 3';
// $prod->estado='Nuevo';
// $prod->activo='Si';
// $prod->slinderprincipal='No';
// $prod->save();
    // return $prod;
    // 
    return view('tienda.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
