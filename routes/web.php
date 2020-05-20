<?php
use App\Porducto;
use App\Categoria;
use App\Image;
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
//provar imagenes
Route::get('/prueba', function () {

	$producto= App\Porducto::with('images')->get();

return $producto->find(1)->images->find(3);
});
//mostrar resultados
Route::get('/resultados', function () {
	$imagen= App\Image::orderBy('id','Desc')->get();

    return $imagen;
});

Route::get('/', function () {

// $prod = new Porducto();
// $prod->nombre_Pro = 'Producto 3';
// $prod->slug_Pro = 'Producto 3';
// $prod->categoria_id = 1;
// $prod->descripcion_corta_Pro = 'Producto ';
// $prod->descripcion_larga_Pro = 'Producto ';
// $prod->especificacion_Pro = 'Producto ';
// $prod->datoInteres_Pro = 'Producto ';
// $prod->estado_Pro = 'Nuevo';
// $prod->activo_Pro = 'Si';
// $prod->slinderprincipal_Pro = 'No'; 
// $prod->save();
// return $prod;

    return view('tienda.index');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
	return view('plantilla.admin');
})->name('admin');

Route::resource('/admin/categoria','Admin\AdminCategoriaController')->names('Admin.Categoria');
Route::resource('/admin/producto','Admin\AdminProductoController')->names('Admin.Producto');

Route::get('cancelar/{ruta}',function($ruta){
return redirect()->route($ruta)->with('cancelar','Cancelado Correctamente');
})->name('cancelar');