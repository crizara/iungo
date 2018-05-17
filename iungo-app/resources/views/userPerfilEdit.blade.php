<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Iungo') }}</title>
    <!-- Styles -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css'>  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">       
</head>
<body>
    <div class="principal">
        <div class="editar-perfil">
            <div class="container titulo-principal">
              <div class="row">
                
                  <div class="col-sm-12 titulo">
                  Edita tu <span>perfil</span>
                  </div>
                
              </div>
          </div>

          <form action="{{ route('perfil.update', $user['idPersona']) }}" method="POST">
            {{ csrf_field() }}

            <div class="container">
              <div class="row">
                  <label class="col-sm-2" for="nombre">Nombre</i></label>
                  <div class="col-sm-8">
                    <input type="text" name="Nom" class="texto" value="{{ $user['Nom'] }}"  required autofocus align="center">
                </div>
                <div class="col-sm-2">
                </div>
            </div>
        </div>
        <br/>
        <div class="container">
          <div class="row">
              <label class="col-sm-2" for="nombre">Cognom</i></label>
              <div class="col-sm-8">
                <input type="text" name="Cognom"  class="texto"  value="{{ $user['Cognom'] }}" required autofocus>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </div>
    <br/>
    <div class="container">
      <div class="row">
          <label class="col-sm-2" for="nombre">Data de Nacimiento</i></label>
          <div class="col-sm-8">
             <input type="text" name="dataNeixement"  class="texto" value="{{ $user['dataNeixement'] }}" required autofocus>
         </div>
         <div class="col-sm-2">
         </div>
     </div>
 </div>
 <br/>
 <div class="container">
  <div class="row">
      <label class="col-sm-2" for="nombre">Sexe</i></label>
      <div class="col-sm-8">
       <select  name="idSexe"  class="texto" >
        @foreach ($arraySexe as $sexe)
        @if($sexe['idSexe']==$user['idSexe'])
        <option value="{{$sexe['idSexe']}}" selected >{{ $sexe['nom'] }}</option> 
        @else
        <option value="{{$sexe['idSexe']}}">{{ $sexe['nom'] }}</option> 
        @endif
        @endforeach
    </select>
</div>
<div class="col-sm-2">
</div>
</div>
</div>
<br/>
<div class="container">
  <div class="row">
      <label class="col-sm-2" for="nombre">Buscas</i></label>
      <div class="col-sm-8">
       <select name="idbusca"  class="texto" >
        @foreach ($arraySexe as $sexe)
        @if($sexe['idSexe']==$user['idbusca'])
        <option value="{{$sexe['idSexe']}}" selected >{{ $sexe['nom'] }}</option> 
        @else
        <option value="{{$sexe['idSexe']}}">{{ $sexe['nom'] }}</option> 
        @endif
        @endforeach
    </select>
</div>
<div class="col-sm-2">
</div>
</div>
</div>

<div class="container">
  <div class="row">
   <div class="col-sm-2">
   </div>
   <div class="col-sm-8">
     <input  type="submit" value="Editar">
 </div>
 <div class="col-sm-2">
 </div>
</div>
</div>
<div class="container">
  <div class="row">
   <div class="col-sm-2">
   </div>
   <div class="col-sm-8">
     <a href="{{route('user.perfil')}}"><button class="cancelar" type="button">CANCELAR</button></a>
 </div>
 <div class="col-sm-2">
 </div>
</div>
</div>
</form>

</div>


</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
</body>
</html>

