<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Iungo</title>  
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/firstpage.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid" style="padding: 0px;">  





            <nav class="navbar navbar-fixed-left navbar-minimal animate" role="navigation">
                <div class="navbar-toggler animate">
                    <span class="menu-icon"></span>
                </div>
                <ul class="navbar-menu animate">
                    @if (Auth::guest())

                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li>
                        <a href="#about-us" class="animate">
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
                        <a href="{{ url('/config') }}" class="animate">
                            <span class="desc animate">Mi perfil </span>
                            <i class="fas fa-user"></i>           
                            </span>
                        </a>
                    </li>

                    <li data-toggle="modal" data-target=".bd-example-modal-sm">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            <span class="desc animate"> Salir</span>
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





            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 fotoperfil">
                        <div class="image-window">
                            <img src="{{ asset('images/fea.jpg') }}" height="500">
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 botons">
                        <div class="col-md-12">
                            <div class="col-md-4 botonsfoto">
                                <span class="botodis botofoto"><i class="far fa-times-circle"></i></span>
                            </div>
                            <div class="col-md-4 botonsfoto">
                                <span class="botoin botofoto"><i class="far fa-question-circle"></i></span>
                            </div>
                            <div class="col-md-4 botonsfoto">
                                <span class="botomg botofoto"><i class="far fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js'></script>
            <script src="{{ asset('js/firstpage.js') }}"></script>
            <script src="{{ asset('js/menu.js') }}"></script>
            <script src="{{ asset('js/app.js') }}"></script>



        </div>


        <!-- 


        -->


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>


    </body>

</html>
