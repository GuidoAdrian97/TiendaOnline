@extends('plantilla.admin')
@section('titulo','Pincipal Roles') 




@section('breadcrumb')

 <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection



@section('contenido')



      <div id="apiconfirmareliminar" class="row">
       <span style="display: none" id="urlbase">{{route('Admin.Rol.index')}}</span> 
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

              	<a class="m-2 float-right btn btn-primary" href="{{ route('Admin.Rol.create') }}" > <i class="far fa-plus-square"></i> Roles</a>

                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>nombre</th>
                      <th>slug</th>
                      <th>descripcion</th>
                      <th>fullacceso</th>
                      <th>Fecha Creacion</th>
                      <th>Fecha Modificacion</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $rol)
                    	<tr>
                      <td>{{$rol->id}}</td>	
                      <td>{{$rol->nombre}}</td>
                      <td>{{$rol->slug}}</td>
                      <td>{{$rol->descripcion}}</td>
                      <td>{{$rol->fullacceso}}</td>
                      <td>{{$rol->updated_at}}</td>
                      <td>{{$rol->created_at}}</td>
                      <td ><a class="btn btn-default" href="{{ route('Admin.Rol.show',$rol->slug) }}" > <i class="far fa-eye"></i></a></td>
                      <td ><a class="btn btn-info" href="{{ route('Admin.Rol.edit',$rol->slug) }}" > <i class="far fa-edit"></i></a></td>
                      <td ><a v-on:click.prevent="deseas_eliminar({{$rol->id}})" class="btn btn-danger" href="{{ route('Admin.Rol.index') }}" > <i class="far fa-trash-alt"></i></a></td>
                      
                    </tr>
                    @endforeach 
                    
                  </tbody>
                </table>

                {{$roles->appends($_GET)->links()}}
              </div>
              
            </div>
            
          </div>
        </div>
@endsection