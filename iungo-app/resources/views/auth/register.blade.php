@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">





<div class="container " style="margin-top: 10%;" >
    <div class="row"> 
        <div class="col-md-12 texto-centrado">
           <div class="header ">
               <div class="corazon">
                   <i class="fa fa-heart" aria-hidden="true"></i>
               </div> Regís<span>trate</span>
           </div>
       </div>
   </div>
   <div class="register">
      <form  method="POST" action="{{ route('register') }}" onsubmit="return validacion()">
        {{ csrf_field() }}
        <div class="row texto-centrado margin color-white">
          <label class="col col-md-4 texto-derecha"  for="nombre"><i class="icon-color fa fa-envelope"  aria-hidden="true"></i>
          </label>
          <div class="col col-md-5">
              <input id="email" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus >
              @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
          </div > 
          <div class="col col-md-3"></div>
          
        </div>

        <div class="row texto-centrado margin color-white" >
        <label class=" col col-md-4 texto-derecha" for="nombre"><i class="icon-color fa fa-key"  aria-hidden="true"></i>
        </label>
        <div class=" col col-md-5">
          <input id="password" type="password" name="password"  placeholder="Contraseña" required autofocus >
          @if ($errors->has('password'))
      <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif
      </div > 
      <div class="col col-md-3"></div>
      
</div>
        <div class="row texto-centrado margin color-white" >
        <label class=" col col-md-4 texto-derecha"  for="nombre"><i class="icon-color fa fa-key"  aria-hidden="true"></i>
        </label>
        <div class=" col col-md-5">
          <input id="password-confirm" type="password"  name="password_confirmation"  placeholder="Confirma contraseña" required autofocus >
      </div> 
      <div class="col col-md-3"></div>
      
</div>


<!-- -->
<div class="row texto-centrado margin color-white" >
        <label class=" col col-md-4 texto-derecha"  for="nombre"><i class="icon-color fa fa-user"  aria-hidden="true"></i>
        </label>
        <div class=" col col-md-5">
          <input id="name" type="text"  name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>
      </div> 
      <div class="col col-md-3"></div>
      
</div>
 <div class="row texto-centrado margin color-white" >
        <label class=" col col-md-4 texto-derecha"  for="nombre"><i class="icon-color fa fa-user"  aria-hidden="true"></i>
        </label>
        <div class=" col col-md-5">
          <input id="cognom" type="text"  name="cognom" value="{{ old('cognom') }}" placeholder="Apellidos" required autofocus>
      </div> 
      <div class="col col-md-3"></div>
      
</div>
 <div class="row texto-centrado margin color-white" >
        <label class=" col col-md-4 texto-derecha"  for="nombre"><i class="icon-color fa fa-calendar"  aria-hidden="true"></i>
        </label>
        <div class=" col col-md-5">
         <input id="dataNeixement" type="text"  name="dataNeixement" value="{{ old('dataNeixement') }}" placeholder="Fecha de nacimiento" required autofocus>
      </div> 
      <div class="col col-md-3"></div>
      
</div>

 <div class="row texto-centrado margin color-white" >
        <label class=" col col-md-4 texto-derecha"  for="nombre"><i class="icon-color fa fa-transgender"  aria-hidden="true"></i>
        </label>
        <div class=" col col-md-5">
        <select id="idSexe" type="text"  name="idSexe" value="{{ old('idSexe') }}" required >
            <option selected disabled>Tu sexo</option>
            <option value="1" class="colorLetra">Dona</option>
            <option value="2" class="colorLetra">Home</option>
        </select>
      </div> 
      <div class="col col-md-3"></div>
      
</div>
<div class="row texto-centrado margin color-white" >
        <label class=" col col-md-4 texto-derecha"  for="nombre"><i class="icon-color fa fa-transgender"  aria-hidden="true"></i>
        </label>
        <div class=" col col-md-5">
             <select id="idBusca" type="text"  name="idBusca" value="{{ old('idBusca') }}"  placeholder="sexo que buscas" required autofocus>
             <option selected disabled>Que te interesa?</option>
            <option value="1" class="colorLetra">Dona</option>
            <option value="2" class="colorLetra">Home</option>
        </select></div>
      <div class="col col-md-3"></div>
</div>



<div class="row texto-centrado margin">
   <div class="col col-md-4 texto-derecha"></div>
   <div class="col col-md-5">
   <input type="submit" value="Registrarse">
  </div>
  <div class="col col-md-3"></div>
</div> 
<div class="row texto-centrado margin">
   <div class="col col-md-4">
   </div>
   <div class="col col-md-5">
     <a href="{{ url('/login') }}"><input type="button" value="Ya estoy registrado"></a>
 </div>
 <div class="col col-md-3">
 </div>
</div>
</form>
</div>
</div>

<script>
  $( document ).ready(function() {
    $( "#dataNeixement" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  });
  </script>

@endsection
