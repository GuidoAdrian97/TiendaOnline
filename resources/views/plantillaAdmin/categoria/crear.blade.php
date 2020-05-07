@extends('plantilla.admin')
@section('titulo','Crear Categoria') 
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('Admin.Categoria.index')}}">Categorias</a></li>
 <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
@section('contenido')

        <div id=apicategoria>
          <form action="{{ route('Admin.Categoria.store') }}" method="POST">
      @csrf

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración de Categorias</h3>

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
    
                            @blur="getCategoria" 
                            @focus = "div_aparecer= false"
                        
                        class="form-control" type="text" name="nombre" id="nombre">
                        <label for="slug">Slug</label>
                        <input 
                        readonly 
                        v-model="generarSlug"  
                        class="form-control" type="text" name="slug" id="slug">
                       
                        <div v-if="div_aparecer" v-bind:class="div_class_slug">
                           @{{ div_mensajeSlug }}
                        </div>
                        <br v-if="div_aparecer">
                        
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                        
                    </div>
                   

        </div>
        <!-- /.card-body -->
        <div class="card-footer">

          <a class="btn btn-danger" href="{{ route('cancelar','Admin.Categoria.index') }}">Cancelar</a>


                    <input 
                    :disabled = "des_buton==1"
                  type="submit" value="Guardar" class="btn btn-primary float-right">
          
                
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
       </div>
@endsection