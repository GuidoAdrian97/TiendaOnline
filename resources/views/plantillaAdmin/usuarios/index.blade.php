@extends('plantilla.admin')
@section('titulo','Pincipal Usuarios') 




@section('breadcrumb')

 <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection



@section('contenido')
<style type="text/css" >
  .table1{
    width: 100%;
    margin-bottom: 1rem;
    color:#212529;
    text-align: center;
  }
  .table1 td, .table1 th{
    padding: .75rem;
    vertical-align: center;
    border-top: 1px solid #dee2e6;
  }
</style>


      <div id="apiconfirmareliminar" class="row">
       <span style="display: none" id="urlbase">{{route('Admin.Rol_User.index')}}</span> 
       @include('custom.modal_eliminar')
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Seccion de Roles</h3>

                <div class="card-tools">

                  <form>

                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="nombre" class="form-control float-right" placeholder="Buscar" value="{{request()->get('nombre')}}">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>

                  </form>

                </div>
              </div>
              

              <div class="card-body table-responsive p-0" style="height: 300px">
                <table class="table1 table-head-fixed">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Foto</th>
                      <th>nombre</th>
                      <th>email</th>
                      <th>Rol</th>
                      <th>Fecha Creacion Usuario</th>
                      <th>Fecha Modificacion Rol</th>
                      <th colspan="3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Users as $User)
                    	<tr>
                      <td>{{$User->id}}</td>
                      <td>
                      @if($User->images)
                         <img style="height:100px; width:100px" src="{{$User->images->url}}" class="rounded-circle" >
                        @else
                        <img style="height:100px; width:100px"  src="/imagenes/17004.png" class="rounded-circle" >
                        @endif
                      </td>	
                      <td>{{$User->name}}</td>
                      <td>{{$User->email}}</td>
                      @if($User->roles)
                      <td>
                        /@foreach ($User->roles as $rol){{$rol->nombre}}/@endforeach 
                      </td>
                      @endif
                      <td>{{$User->updated_at}}</td>
                      <td>{{$User->created_at}}</td>
                      <td ><a class="btn btn-default" href="{{ route('Admin.Rol_User.show',$User->id) }}" > <i class="far fa-eye"></i></a></td>
                      <td ><a class="btn btn-info" href="{{ route('Admin.Rol_User.edit',$User->id) }}" > <i class="fas fa-user-tag"></i></a></td>
                      <td ><a v-on:click.prevent="deseas_eliminar({{$User->id}})" class="btn btn-danger" href="{{ route('Admin.Rol_User.index') }}" > <i class="far fa-trash-alt"></i></a></td>
                      
                    </tr>
                    @endforeach 
                    
                  </tbody>
                </table>

                {{$Users->appends($_GET)->links()}}
              </div>
              
            </div>
            
          </div>
        </div>
@endsection