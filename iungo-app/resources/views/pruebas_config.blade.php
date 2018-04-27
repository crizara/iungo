@extends('layouts.app')



@section('content')

Pagina de configuracion

<div class="container">
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">dades</div>
              <label for="nombre">nombre</label>
              <input type="text" name="nombre">
              <label for="apellidos">apellidos</label>
              <input type="text" name="apellidos">
              <label for="dataNeixament">dataNeixament</label>
              <input type="text" name="dataNeixament">
              <label for="sexe">Sexe</label>
              <input type="text" name="sexe">
    
      </div>
      <div class="panel-heading">Galeria de Imagenes</div>
        <div class="panel-body">
          <form method="POST" action="{{ url('formularioconfig') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
