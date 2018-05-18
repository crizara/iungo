<?php
header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>

<html lang="es" >

    <head>
        <meta charset="UTF-8">
        <title>Iungo - Chat</title>



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

        <link href="{{ asset('css/userChats.css') }}" rel="stylesheet"> 
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->

        <link href="{{ asset('css/menu.css') }}" rel="stylesheet"> 

    </head>

    <body>


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
                    <a href="{{ url('/chat') }}" class="animate">
                        <span class="desc animate"> Chats </span>
                        <i class="fas fa-comment"></i>           


                    </a>
                </li>

                <li>
                    <a href="{{ url('#') }}" class="animate" data-toggle="modal" data-target="#exampleModalCenter">
                        <span class="desc animate"> Notificaciones </span>
                        <i class="far fa-bell"></i>
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
                        <span class="desc animate"> Cerrar Sessión</span>
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
        <div class="container clearfix">
            <div class="people-list" id="people-list">
                <div class="search">
                    <input type="text" placeholder="search" />
                    <i class="fa fa-search"></i>
                </div>



                <ul class="list">
                    @foreach ($personesChats as $persona)
                    <li class="clearfix" data-id="{{ $persona->idPersona }}">
                        <div class="image-chat">
                            <img src="images/{{ $persona->img }}" height="50">
                        </div>
                        <div class="about">
                            <div class="name"> {{ $persona->Nom }} {{$persona->Cognom}} </div>
                        </div>
                    </li>
                    @endforeach      
                </ul>

            </div>

            <div class="chat">
                <!--                <div class="chat-header clearfix">
                                   <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
                
                                   <div class="chat-about">
                                        <div class="chat-with">Chat with Vincent Porter</div>
                                    </div>
                                </div> -->

                <div class="chat-history">
                    <ul>
                        <span class="fontchat">Click en una persona para iniciar chat </span> 

                    </ul>

                </div> <!-- end chat-history -->

                <div class="chat-message clearfix">
                    <form id="form1" data-id-user="" method="post">        
                        <textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>                
<!--                        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-file-image-o"></i>-->
                        <button form="form1">Enviar</button>
                    </form>


                </div> <!-- end chat-message -->

            </div> <!-- end chat -->

        </div> <!-- end container -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>



        <script id="message-template" type="text/x-handlebars-template">
            <li class="clearfix">
            <div class="message-data align-right">
            <span class="message-data-time" >, Today</span> &nbsp; &nbsp;
            <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i            >
            </div            >
            <div class="message other-message float-right">

            </div>
            </li>
        </script>

        <script id="message-response-template" type="text/x-handlebars-template">
            <li>
            <div class="message-data">
            <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
            <span class="message-data-time">, Today</span>
            </div>
            <div class="message my-message">

            </div>
            </li>
        </script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script>
        <script src="{{ asset('js/menu.js') }}"></script>
        <script src="{{ asset('js/userChats.js') }}"></script>


    </body>

</html>
