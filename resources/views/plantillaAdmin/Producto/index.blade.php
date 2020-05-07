@extends('plantilla.admin')
@section('titulo','Pincipal producto') 




@section('breadcrumb')

 <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection



@section('contenido')



      <div id="apiconfirmareliminar" class="row">
       <span style="display: none" id="urlbase">{{route('Admin.Producto.index')}}</span> 
       @include('custom.modal_eliminar')
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Seccion de productos</h3>

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

              	<a class="m-2 float-right btn btn-primary" href="{{ route('Admin.Producto.create') }}" > <i class="far fa-plus-square"></i> producto</a>

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
                    @foreach ($productos as $producto)
                    	<tr>
                      <td>{{$producto->id}}</td>	
                      <td>{{$producto->nombre_Pro}}</td>
                      <td>{{$producto->slug_Pro}}</td>
                      <td>{{$producto->descripcion_Pro}}</td>
                      <td>{{$producto->updated_at}}</td>
                      <td>{{$producto->created_at}}</td>
                      <td ><a class="btn btn-default" href="{{ route('Admin.Producto.show',$producto->slug_Pro) }}" > <i class="far fa-eye"></i></a></td>
                      <td ><a class="btn btn-info" href="{{ route('Admin.Producto.edit',$producto->slug_Pro) }}" > <i class="far fa-edit"></i></a></td>
                      <td ><a v-on:click.prevent="deseas_eliminar({{$producto->id}})" class="btn btn-danger" href="{{ route('Admin.Producto.index') }}" > <i class="far fa-trash-alt"></i></a></td>
                      
                    </tr>
                    @endforeach 
                    
                  </tbody>
                </table>

                {{$productos->appends($_GET)->links()}}
              </div>
              
            </div>
            
          </div>
        </div>
@endsection