@extends('layouts.app')



@section('content')
<div class="container">
    <div class="profile large">
        <div class="cover"><img src="../images/{{ $user['img'] }}"/>
            <div class="layer">
                <div class="loader"></div>
            </div><a class="image-wrapper" href="#">
                <form id="coverForm" action="#">
                    <input class="hidden-input" id="changeCover" type="file"/>
                    <label class="edit glyphicon glyphicon-pencil" for="changeCover" title="Change cover"></label>
                </form></a>
        </div>
        <div class="user-info">
            <div class="profile-pic"><img src="../images/{{ $user['img'] }}"/>
                <div class="layer">
                    <div class="loader"></div>
                </div><a class="image-wrapper" href="#">
                    <form id="profilePictureForm" action="#">
                        <input class="hidden-input" id="changePicture" type="file"/>
                        <label class="edit glyphicon glyphicon-pencil" for="changePicture" type="file" title="Change picture"></label>
                    </form></a>
            </div>
            <div class="username">
                <div class="name"><span class="verified"></span>{{ $user['Nom'] }} {{ $user['Cognom'] }}</div>
                <div class="name"><span class="verified"></span>{{ $user['Sexe'] }}</div>	
                <div class="name"><span class="verified"></span>{{ $user['email'] }}</div>	
            </div>
        </div>
<!--        <button type="button" class="btn btn-primary" style="width: 100%; border-radius: 0px !important;">Editar Perfil<a href="#"></a></button>-->
<a href="{{ route('edit.perfil') }}" class="btn btn-primary" style="width: 100%; border-radius: 0px;" role="button">Editar</a>
    </div>

</div>


@endsection
