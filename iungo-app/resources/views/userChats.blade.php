@extends('layouts.app')

@section('linkcss')

<link href="{{ asset('css/userChats.css') }}" rel="stylesheet">

@endsection

@section('linkjs')

<script src="{{ asset('js/userChats.js') }}"></script>

@endsection

@section('content')



        


        
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

                <div class="chat-history">
                    <ul>
                        <span class="fontchat">Click en una persona para iniciar chat </span> 

                    </ul>

                </div> <!-- end chat-history -->

                <div class="chat-message clearfix">
                    <form id="form1" data-id-user="" method="post">        
                        <textarea name="message-to-send" id="message-to-send" placeholder ="Escribe tu mensaje" rows="3"></textarea>                
<!--                        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-file-image-o"></i>-->
                        <button form="form1">Enviar</button>
                    </form>


                </div> <!-- end chat-message -->

            </div> <!-- end chat -->

        </div> 
        
        



@endsection
