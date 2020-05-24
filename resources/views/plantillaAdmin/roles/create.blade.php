@extends('plantilla.admin')
@section('titulo','Crear Roles')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('Admin.Rol.index')}}">Roles</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
@section('contenido')
<div id=apirol>
    <form action="{{ route('Admin.Rol.store') }}" method="POST">
        @csrf
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administración de Roles</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input v-model="nombre" @blur="getCategoria" @focus="div_aparecer= false" class="form-control" type="text" name="nombre" id="nombre"
                    value="{{old ('name')}}"
                    >
                    <label for="slug">Slug</label>
                    <input readonly v-model="generarSlug" class="form-control" type="text" name="slug" id="slug"  value="{{old ('slug')}}">
                    <div v-if="div_aparecer" v-bind:class="div_class_slug">
                        @{{ div_mensajeSlug }}
                    </div>
                    <br v-if="div_aparecer">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" {{old ('descripcion')}}></textarea>

                    <br>
                    <label for="nombre">Full Accesos</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fullacceso" id="fullaccesoyes" value="Yes" >
                        <label class="form-check-label" for="fullaccesoyes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fullacceso" id="fullaccesono" value="No" checked>
                        <label class="form-check-label" for="fullaccesono">
                            No
                        </label>
                    </div>
                    <hr>
                  @foreach ($permisos as $permiso)
                    
                  
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="permiso_{{$permiso->id}}" value="{{$permiso->id}}" name="permiso[]">
                        <label class="form-check-label" for="exampleCheck1">{{$permiso->nombre}}
                          <em>{{$permiso->descripcion}}</em>
                        </label>
                    </div>
                  @endforeach 
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a class="btn btn-danger" href="{{ route('cancelar','Admin.Rol.index') }}">Cancelar</a>
                <input :disabled="des_buton==1" type="submit" value="Guardar" class="btn btn-primary float-right">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </form>
</div>
@endsection
