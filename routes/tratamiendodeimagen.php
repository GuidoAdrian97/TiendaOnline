<?php

//saber si un producto tiene imagen
$usuario= App\User::find(1);
	$imagen= $usuario->image;
	if($imagen){
		echo 'Tiene una imagen';
	}else{
		echo 'NO tiene una imagen';
	}
    return $imagen;

//crear una imagen para un usuario
$imagen=new App\Image(['url'=>'imagenes/avatar.png']);
	$usuario= App\User::find(1);
	$usuario->image()->save($imagen);

    return $usuario;
//obtener imagen atravez del usuario
$usuario= App\User::find(1);
return $usuario->image->url;

//creando varias imagenes para productos usando savemany
    $producto= App\Porducto::find(1);
	$producto->images()->saveMany([

		new App\Image(['url'=>'imagenes/avatar.png']),
		new App\Image(['url'=>'imagenes/avatar2.png']),
		new App\Image(['url'=>'imagenes/avatar3.png']),

	]);

    return $producto;
//actualizar imagen
	$usuario= App\User::find(1);
	$usuario->image='imagenes/avatar2.png';
	$usuario->push();
	return $usuario->image;
//actualizar imagenv especigica
	$usuario= App\User::find(1);
	$usuario->image[0]->url='imagenes/avatar2.png';
	$usuario->push();
	return $usuario->image;
//agregar campo de contar 

$usuario= App\User::withCount('image')->get();
$usuario=$usuario->find(1);
return $usuario;

//traer tablas relacionadas 
$producto= App\Porducto::with('images')->get();

return $producto;
return $producto->find(1)->images->find(3);
return $producto->find(1)->images;

//delimitar datos de tablas relacionadas

$producto= App\Porducto::with('images:id,imageable_id')->get();

return $producto->find(1)->images->find(3);