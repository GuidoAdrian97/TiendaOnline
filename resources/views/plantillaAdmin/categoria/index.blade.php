@extends('plantilla.admin')
@section('titulo','Pincipal Categoria') 




@section('breadcrumb')

 <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection



@section('contenido')



      <div id="apiconfirmareliminar" class="row">
       <span style="display: none" id="urlbase">{{route('Admin.Categoria.index')}}</span> 
       @include('custom.modal_eliminar')
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Seccion de Categorias</h3>

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

              	<a class="m-2 float-right btn btn-primary" href="{{ route('Admin.Categoria.create') }}" > <i class="far fa-plus-square"></i> Categoria</a>

                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Slug</th>
                      <th>Descripcion</th>
                      <th>Fecha Creacion</th>
                      <th>Fecha Modificacion</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categorias as $categoria)
                    	<tr>
                      <td>{{$categoria->id}}</td>	
                      <td>{{$categoria->nombre}}</td>
                      <td>{{$categoria->slug}}</td>
                      <td>{{$categoria->descripcion}}</td>
                      <td>{{$categoria->updated_at}}</td>
                      <td>{{$categoria->created_at}}</td>
                      <td ><a class="btn btn-default" href="{{ route('Admin.Categoria.show',$categoria->slug) }}" > <i class="far fa-eye"></i></a></td>
                      <td ><a class="btn btn-info" href="{{ route('Admin.Categoria.edit',$categoria->slug) }}" > <i class="far fa-edit"></i></a></td>
                      <td ><a v-on:click.prevent="deseas_eliminar({{$categoria->id}})" class="btn btn-danger" href="{{ route('Admin.Categoria.index') }}" > <i class="far fa-trash-alt"></i></a></td>
                      
                    </tr>
                    @endforeach 
                    
                  </tbody>
                </table>

                {{$categorias->appends($_GET)->links()}}
              </div>
              
            </div>
            
          </div>
        </div>
@endsection