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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"  crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css'>  
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">       
</head>
<body>  
    <div class="container centrado">
        <div class="row">

            <div class="col col-xs-6">
                <div class="header texto-centrado">
                    <img src="https://images.vexels.com/media/users/3/138854/isolated/preview/9a37016e6bfa621501edd29d47229daa-pareja-caminar-en-la-playa-silueta-by-vexels.png" style="width: 10%; min-width: 50px; ">
                    Iun<span>go</span>
                </div>
            </div>
            <div class="col col-xs-6 login texto-centrado ">
                <form  method="POST" action="{{ route('login') }}">
                 {{ csrf_field() }}

                 <div class="row">
                        <label class=" col-sm-1" for="nombre" style="text-align: left;"><i class="icon-color fa fa-envelope"  aria-hidden="true"></i>
                        </label>
                        <div class="col-sm-10">
                          <input id="email" placeholder="email" type="email"  name="email" required autofocus >
                        </div>
                        <div class="col-sm-2"></div>
                </div>
                 @if ($errors->has('email'))
                 <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <div class="row" >
                        <label class=" col-sm-1" for="nombre" style="text-align: left;"><i class="icon-color fa fa-key" aria-hidden="true"></i>
                        </label>
                        <div class="col-sm-10">
                          <input id="password" type="password" placeholder="password" name="password" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                </div>              
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
                <div class="row">
                       <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                          <input type="submit" value="Conectate">
                        </div>
                        <div class="col-sm-2"></div>
                </div> 
                
            </form>

            <p class="message">¿No estás registrado? <a href="{{ url('/register') }}">Crear una cuenta</a></p>
        </div>

    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
</body>
</html>

