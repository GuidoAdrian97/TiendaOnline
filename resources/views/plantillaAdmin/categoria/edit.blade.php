@extends('plantilla.admin')
@section('titulo','Editar Categoria') 
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('Admin.Categoria.index')}}">Categorias</a></li>
 <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
@section('contenido')

        <div id=apicategoria>
          <form action="{{route('Admin.Categoria.update',$cat->id)}}" method="POST">
            @csrf
            @method('PUT')
         
<!-- Default box -->

<span style="display:none" id='editar'>{{$editar}}</span>
<span style="display:none" id='nombretemp'>{{$cat->nombre_Cat}}</span>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar</h3>

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
                    <input v-model="nombre"
                    @blur="getCategoria "
                    @focus="div_aparecer= false"

                     class="form-control" type="text" name="nombre" id="nombre">

                    <label for="slug">Slug</label>
                    <input readonly v-model="generarSlug" class="form-control" type="text" name="slug" id="slug">
                    <div v-if='div_aparecer' v-bind:class="div_class_slug">
                        @{{div_mensajeSlug}}
                    </div>
                    <br v-if='div_aparecer'>
                    <label for="descripcion">Descripcion</label>

                    <textarea class="form-control" type="text" name="descripcion" id="descripcion">{{$cat->descripcion_Cat}}</textarea>

                </div>



        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a class="btn btn-danger" href="{{route('cancelar','Admin.Categoria.index')}}" title="">Cancelar</a> 
         <input :disabled="des_buton==1" type="submit" value="Guardar" class="btn btn-primary float-rigth">
           
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
       </form>
       </div>
@endsection