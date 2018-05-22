@extends('layouts.app')
@section('linkcss')

<link href="{{ asset('css/firstpage.css') }}" rel="stylesheet">

@endsection

@section('linkjs')

<script src="{{ asset('js/firstpage.js') }}"></script>

@endsection

@section('content')


<div class="centrar">
    <div class="row">
        <div class="fotoperfil">
            <div class="image-window">
                <img id="imatge1" src="" alt="fotoperfil">
            </div>
            <div class="col-xs-12" >
                <ul class="social">
                    <li><span class="botodis botofoto"><i class="far fa-times-circle"></i></span></li>
                    <a href="#" id="a-info"> <li><span class="botoin botofoto"><i class="far fa-question-circle"></i></span></li></a>
                    <li><span class="botomg botofoto"><i class="far fa-heart"></i></span></li>
                </ul>
            </div>   
        </div>
    </div>
</div>

<script>
    $("#logout-form").on("submit", function () {
        event.preventDefault();
        return confirm("Do you want to delete this item?");
    });
</script>


@endsection