@extends('plantilla.admin')
@section('titulo','Ver Rol de Usuario')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('Admin.Rol_User.index')}}">Rol</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
@section('contenido')
<div id=apiUsuario>
    <form action="{{ route('Admin.Rol_User.update',$User->id) }}" method="POST" >
        @csrf
       @method('PUT')
        <span style="display:none" id='editar'>{{$editar}}</span>
<span style="display:none" id='nombretemp'>{{$User->email}}</span>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ver Rol de Usuario</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                 <label for="nombre">Imagen del Usuario</label>
                 @if($User->images)
                  @foreach($User->images as $imagen)
                  <div id="idimagen-{{$imagen->id}}" class="col-sm-2">
                    <a href="{{$imagen->url}}" data-toggle="lightbox"  data-gallery="gallery">
                      <img style="width: 150px; height: 150px" src="{{$imagen->url}}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                    <br>
                    
                  </div>
                  @endforeach
                  @else
                  <div  class="col-sm-2">
                    <a href="{{ asset('imagenes/17004.png')}}" data-toggle="lightbox"  data-gallery="gallery">
                      <img style="width: 150px; height: 150px" src="{{ asset('imagenes/17004.png')}}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                    <br>
                    
                  </div>
                  @endif
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input   class="form-control" type="text" name="nombre" id="nombre" value="{{$User->name}}">
                    <label for="Correo">Correo</label>
                    <input  v-model="Correo" @blur="getCorreo" class="form-control" type="text" name="Correo" id="Correo"  >
                    <div v-if="div_aparecer" v-bind:class="div_class_Correo">
                        @{{ div_mensajeCorreo }}
                    </div>
                    
                    

                    <br>
                    <label for="nombre">Roles del Usuario</label>
                    


                    
                    <hr>
                  @foreach ($roles as $rol)
                    <div class="form-group form-check">
                  @if(in_array($rol->id,$roles_usuario))
                  <input  type="checkbox" class="form-check-input" id="rol_{{$rol->id}}" value="{{$rol->id}}" name="rol[]" checked>
                  @else
                  <input  type="checkbox" class="form-check-input" id="rol_{{$rol->id}}" value="{{$rol->id}}" name="rol[]">
                  @endif

                    
                        
                        <label class="form-check-label" for="exampleCheck1">{{$rol->nombre}}
                          <em>{{$rol->descripcion}}</em>
                        </label>
                    </div>


                  @endforeach 
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a class="btn btn-danger" href="{{ route('cancelar','Admin.Rol_User.index') }}">Cancelar</a>
               <input :disabled="des_buton==1" type="submit" value="Guardar" class="btn btn-primary float-right">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </form>
</div>
@endsection
