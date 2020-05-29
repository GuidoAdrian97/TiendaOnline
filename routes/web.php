<?php
use Illuminate\Support\Facades\Gate;
use App\Porducto;
use App\Categoria;
use App\Image;
use App\User;
use App\ModelRoles\Roles;
use App\ModelRoles\Permisos;
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

	// return Roles::create([
	// 	'nombre'=>'Editor',
	// 	'slug'=>'edito',
	// 	'descripcion'=>'Persona que edita',
	// 	'fullacceso'=>'no'
	// ]);
	
	// return Roles::create([
	// 	'nombre'=>'cliente',
	// 	'slug'=>'cliente',
	// 	'descripcion'=>'cliente',
	// 	'fullacceso'=>'no'
	// ]); 
	// 
	// $rol= User::find(1);
	// $rol->roles()->attach([1]);
	// $rol->roles()->sync([1,2]);
	// return $rol->roles;
	
	// return Permisos::create([
	// 	'nombre'=>'cliente',
	// 	'slug'=>'cliente',
	// 	'descripcion'=>'cliente',		
	// ]); 
	// // 
	// $rol= Roles::find(1);
	// $rol->permisos()->attach([1]);
	// return $rol->permisos;
	// $usuario = User::find(2);
	// $usuario->roles()->sync([4]);
	// return $usuario->havepermisos('Admin.Producto.show');
	// Gate::authorize('haveacceso','Admin.Producto.show');
	// return $usuario;

	return User::get();
	
});
//mostrar resultados
Route::get('/resultados', function () {
	$imagen= App\Image::orderBy('id','Desc')->get();

    return $imagen;
});

// Route::get('/', function () {

// // $prod = new Porducto();
// // $prod->nombre_Pro = 'Producto 3';
// // $prod->slug_Pro = 'Producto 3';
// // $prod->categoria_id = 1;
// // $prod->descripcion_corta_Pro = 'Producto ';
// // $prod->descripcion_larga_Pro = 'Producto ';
// // $prod->especificacion_Pro = 'Producto ';
// // $prod->datoInteres_Pro = 'Producto ';
// // $prod->estado_Pro = 'Nuevo';
// // $prod->activo_Pro = 'Si';
// // $prod->slinderprincipal_Pro = 'No'; 
// // $prod->save();
// // return $prod;

//     return view('tienda.index');
// })->name('index');
Route::get('/', 'HomeController@index')->name('index');


Auth::routes();



Route::get('/admin', function () {
	Gate::authorize('haveacceso','admin');
	return view('plantillaAdmin.index');
})->name('admin')->middleware('auth');

Route::resource('/admin/rol', 'RolesController')->names('Admin.Rol');
Route::resource('/admin/roles-usuario', 'Rol_UserController')->names('Admin.Rol_User');
Route::resource('/admin/categoria','Admin\AdminCategoriaController')->names('Admin.Categoria');
Route::resource('/admin/producto','Admin\AdminProductoController')->names('Admin.Producto');

Route::get('cancelar/{ruta}',function($ruta){
return redirect()->route($ruta)->with('cancelar','Cancelado Correctamente');
})->name('cancelar');