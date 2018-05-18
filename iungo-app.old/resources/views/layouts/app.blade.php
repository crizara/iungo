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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
        <link href="{{ asset('css/userPerfil.css') }}" rel="stylesheet"> 




        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link href="{{ asset('css/table.css') }}" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">



        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css'>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vistaprincipal.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">    
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet"> 





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
                        <a href="#about-us" class="animate">
                            <span class="desc animate"> Notificaciones </span>
                            <i class="fas fa-bell"></i>           

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

        <!-- Scripts -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js'></script>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/vistaprincipal.js') }}"></script>
        <script src="https://use.fontawesome.com/242f61bc37.js"></script>

        <script src="{{ asset('js/menu.js') }}"></script>



        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="{{ asset('js/table.js') }}"></script>


        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script src="{{ asset('js/userPerfil.js') }}"></script>



<!--        <script id="message-template" type="text/x-handlebars-template">
            <li class="clearfix">
            <div class="message-data align-right">
            <span class="message-data-time" >, Today</span> &n                        bsp; &nbsp;
            <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
            </div>
            <div class="message other-message float-right">

            </div>
            </li>
        </script>

        <script        src='http://cdnjs.cloudf        lare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script>
        <script src="{{ asset('js/userChats.js') }}"></script>-->






    </body>
</html>
