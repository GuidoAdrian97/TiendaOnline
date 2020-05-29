<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\ModelRoles\Roles;
use App\ModelRoles\Permisos;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //VALIDAR SI SE REGISTRA EL PRIMER USUARIO
        
        if(User::get()->isNotEmpty()){
            $rolid = Roles::where('slug','cliente')->firstOrFail();
         
     }else{
        if(Permisos::get()->isEmpty()){
        //Permiso CLiente
        Permisos::create([
         'nombre'=>'cliente',
         'slug'=>'cliente',
         'descripcion'=>'cliente',       
        ]);

        Permisos::create([
         'nombre'=>'Seccion Admin',
         'slug'=>'admin',
         'descripcion'=>'Accede a la vista principal de administrador',       
        ]);

        Roles::create([
        'nombre'=>'Cliente',
        'slug'=>'cliente',
        'descripcion'=>'Tiene acceso solo a las vistas de cliente',
        'fullacceso'=>'no'
        ]); 
        
        Roles::create([
        'nombre'=>'Super Administrador',
        'slug'=>'super_administrador',
        'descripcion'=>'Tiene acceso a todo',
        'fullacceso'=>'yes'
        ]); 
        

        //PERMISOS CATEGORIA
        Permisos::create([
         'nombre'=>'Ve lista Categorias',
         'slug'=>'Admin.Categoria.index',
         'descripcion'=>'Ve lista de las categorias',       
        ]);
        Permisos::create([
         'nombre'=>'Crear Categorias Productos',
         'slug'=>'Admin.Categoria.create',
         'descripcion'=>'Crea categorias de productos',       
        ]);
        Permisos::create([
         'nombre'=>'Ve Categoria',
         'slug'=>'Admin.Categoria.show',
         'descripcion'=>'Ve lista de categorias y todos sus datos',       
        ]);
        Permisos::create([
         'nombre'=>'Edita categoria de producto',
         'slug'=>'Admin.Categoria.edit',
         'descripcion'=>'Edita categorias de productos',       
        ]);
        Permisos::create([
         'nombre'=>'Elimina Categoria',
         'slug'=>'Admin.Categoria.destroy',
         'descripcion'=>'Elimina categorias de productos',       
        ]);

        //PRODUCTOS PERMISOS
        Permisos::create([
         'nombre'=>'Ve lista Productos',
         'slug'=>'Admin.Producto.index',
         'descripcion'=>'Ve lista de productos',       
        ]);
        Permisos::create([
         'nombre'=>'Crear Productos',
         'slug'=>'Admin.Producto.create',
         'descripcion'=>'Crea productos',       
        ]);
        Permisos::create([
         'nombre'=>'Ve Producto',
         'slug'=>'Admin.Producto.show',
         'descripcion'=>'Ve lista de productos y todos sus datos',       
        ]);
        Permisos::create([
         'nombre'=>'Edita Producto',
         'slug'=>'Admin.Producto.edit',
         'descripcion'=>'Edita cualquier productos',       
        ]);
        Permisos::create([
         'nombre'=>'Elimina Producto',
         'slug'=>'Admin.Producto.destroy',
         'descripcion'=>'Elimina cualquier productos',       
        ]);

        //ROL PERMISOS
        Permisos::create([
         'nombre'=>'Ve lista Rol',
         'slug'=>'Admin.Rol.index',
         'descripcion'=>'Ve lista de Rol',       
        ]);
        Permisos::create([
         'nombre'=>'Crear Rol',
         'slug'=>'Admin.Rol.create',
         'descripcion'=>'Crea Rol',       
        ]);
        Permisos::create([
         'nombre'=>'Ve Rol',
         'slug'=>'Admin.Rol.show',
         'descripcion'=>'Ve lista de Rol y todos sus datos',       
        ]);
        Permisos::create([
         'nombre'=>'Edita Rol',
         'slug'=>'Admin.Rol.edit',
         'descripcion'=>'Edita cualquier Rol',       
        ]);
        Permisos::create([
         'nombre'=>'Elimina Rol',
         'slug'=>'Admin.Rol.destroy',
         'descripcion'=>'Elimina cualquier Rol',       
        ]);
        }
        $rolid = Roles::where('slug','super_administrador')->firstOrFail();
     }
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ])->roles()->sync([$rolid->id]);
        
         $newuser= User::where('email',$data['email'])->firstOrFail();
         
         
         return $newuser;
    }
    public function redirectPath()
    {
        if (auth()->user()->havepermisos('admin')) {
            return '/admin';
        }

        return '/';
    }
}
