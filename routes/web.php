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

	
    return view('tienda.index');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
	return view('plantilla.admin');
});

Route::resource('/admin/categoria','Admin\AdminCategoriaController')->names('Admin.Categoria');

Route::get('cancelar/{ruta}',function($ruta){
return redirect()->route('Admin.Categoria.index')->with('datos','Cancelado Correctamente');
})->name('cancelar');