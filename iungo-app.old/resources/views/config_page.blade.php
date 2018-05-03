@extends('layouts.app')



@section('content')

Pagina de configuracion

<div class="container">
 
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Galeria de Imagenes</div>
        <div class="panel-body">
           <a href="{{ url('userList') }}">Listar Users</a>


          <form method="POST" action="{{ url('userList') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            
 
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

