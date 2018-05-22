@extends('layouts.app')

@section('linkcss')

<link href="{{ asset('css/userPerfil.css') }}" rel="stylesheet">

@endsection

@section('content')


<div class="container" >
    <div class="profile large">
        <div class="cover"><img src="../../images/{{ $fotoportada}}" style="width: 100%" />
            <div class="layer">
                <div class="loader"></div>
            </div>
        </div>
        <div class="user-info">
            <div class="profile-pic"><img src="../../images/{{ $fotoperfil }}"  />
                <div class="layer">
                    <div class="loader"></div>
                </div>
            </div>
            <div class="username">
                <span id="infouser"><i class="fas fa-info" style="margin-right: 10px;"></i>INFORMACIÓN</span> |
                <span id="galeriauser"><i class="fas fa-images" style="margin-right: 10px;"></i>GALERIA</span>

                <div class="infouserdiv">
                  <div class="name">
                    <span class="verified"></span>
                    <span>Nombre: {{ $user['Nom'] }} {{ $user['Cognom']}}</span><br>
                    <span>Data nacimiento: {{ $user['dataNeixement'] }}</span>
                  </div>
                </div>
                <div class="galeriauserdiv">
                  @foreach ($galeria as $gal)
                  <div class="imatgesgaleria">
                    <img src="../../images/{{ $gal->img }}">
                  </div>                    
                  @endforeach
                </div>

                
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

$(document).ready(function(){

  $('#infouser').click(function () {
    $('.infouserdiv').css('display', 'block');
    $('.galeriauserdiv').css('display', 'none');
  });
  $('#galeriauser').click(function () {
    $('.infouserdiv').css('display', 'none');
    $('.galeriauserdiv').css('display', 'block');
  });
});

</script>

<style type="text/css">
  #infouser, #galeriauser {
    cursor: pointer;
  }
  .galeriauserdiv {
    display: none;
  }

  .infouserdiv {
    margin-top: 15px;
  }

  .imatgesgaleria {
    text-align: center;
    height: 100px;
    float: left;
  }
  .imatgesgaleria img{
    height: 100%;
    width: auto;
  }
</style>

@endsection
