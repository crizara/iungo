<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Iungo') }}</title>

        <!-- Styles 
        
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vistaprincipal.css') }}" rel="stylesheet">

        -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link href="{{ asset('css/userPerfil.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link href="{{ asset('css/table.css') }}" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">

        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">


        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css'>        
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">    
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet"> 

        @yield('linkcss')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ asset('js/moment.js') }}"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js'></script>
        <script src="{{ asset('js/vistaprincipal.js') }}"></script>
        <script src="https://use.fontawesome.com/242f61bc37.js"></script>

        <script src="{{ asset('js/menu.js') }}"></script>

        <script src="{{ asset('js/table.js') }}"></script>

        @yield('linkjs')

    </head>
    <body style="background-color: #ef9797">
        <div id="app">
            <nav class="navbar navbar-fixed-left navbar-minimal animate" role="navigation">
                <div class="navbar-toggler animate">
                    <span class="menu-icon"></span>
                </div>
                <ul class="navbar-menu animate">
                    @if (Auth::guest())


                    <li><a href="{{ url('/') }}">
                            <span class="desc animate"> Home </span>
                            <i class="fas fa-home"></i>
                        </a>
                    </li>

                    <li><a href="{{ route('login') }}">
                            <span class="desc animate"> Login </span>
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </li>



                    @else
                    <li>
                        <a href="{{ url('/chat') }}" class="animate">
                            <span class="desc animate"> Chats </span>
                            <i class="fas fa-comment"></i>           

                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/iungos') }}" class="animate">
                            <span class="desc animate"> Iungos </span>
                            <i class="fas fa-heart"></i>           

                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.perfil') }}" class="animate">
                            <span class="desc animate">Mi perfil </span>
                            <i class="fas fa-user"></i>           
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/') }}" class="animate">
                            <span class="desc animate">Me Gustas </span>
                            <i class="far fa-thumbs-up"></i>
                            </span>
                        </a>
                    </li>

                    @if(Auth::user()->hasRole('admin'))
                    <li>
                        <a href="{{ url('/userList') }}" class="animate">
                            <span class="desc animate">Lista Usuarios </span>
                            <i class="fas fa-list-ol"></i>
                            </span>
                        </a>
                    </li>
                    @endif

                    <li data-toggle="modal" data-target=".bd-example-modal-sm">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                            <span class="desc animate">Cerrar Sessión</span>
                            <i class="fas fa-sign-out-alt"></i>   
                            </span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                </ul>
            </nav>
            @yield('content')
        </div>
    </body>
</html>
