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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css'>  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">       
</head>
<body>
    <div class="principal">

      <div class="header">
        <div>
       <img src="https://images.vexels.com/media/users/3/138854/isolated/preview/9a37016e6bfa621501edd29d47229daa-pareja-caminar-en-la-playa-silueta-by-vexels.png" style="width: 10%; height: 10%;">
        Iun<span>go</span>
        </div>
    </div>
    <div class="login">
        <form  method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <input id="email" placeholder="email" type="email"  name="email" value="{{ old('email') }}" required autofocus align="center">
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif

            <input id="password" type="password" placeholder="password" name="password" required autofocus>

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif

            <input type="submit" value="Conectate">
            <span class="help-block">
            <a href="{{ url('/register') }}" data-page=.page.about>Aun no estras registrado? Registrate</a>
            </span>


                     <!--   <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>-->

                     <!--   <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidaste la contraseña?
                                </a>
                            </div>
                        </div>-->
                    </form>

                </div>


            </div>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
        </body>
        </html>

        