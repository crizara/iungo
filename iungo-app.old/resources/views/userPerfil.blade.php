@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="profile large">
        <div class="cover"><img src="../images/{{ $fotoportada}}" style="width: 100%" />
            <div class="layer">
                <div class="loader"></div>
            </div><a class="image-wrapper" data-toggle="modal" data-target="#portada">
                <form id="coverForm" action="#" enctype="multipart/form-data">
                    
                    <label class="edit glyphicon glyphicon-pencil" for="changeCover" title="Editar portada"></label>
                </form></a>
        </div>
        <div class="user-info">
            <div class="profile-pic"><img src="../images/{{ $fotoperfil }}"  />
                <div class="layer">
                    <div class="loader"></div>
                </div>
                <a class="image-wrapper" data-toggle="modal" data-target="#exampleModal">
                <input class="hidden-input" id="changePicture"/>
                <label class="edit glyphicon glyphicon-pencil" for="changePicture" title="Editar perfil" ></label>           
                </a>
            </div>
            <div class="username">
                <div class="name"><span class="verified"></span>{{ $user['Nom'] }} {{ $user['Cognom']}}</div>
                <div class="name"><span class="verified"></span></div>	
                <div class="name"><span class="verified"></span>{{ $user['email'] }}</div>	
            </div>
        </div>
<!--        <button type="button" class="btn btn-primary" style="width: 100%; border-radius: 0px !important;">Editar Perfil<a href="#"></a></button>-->
<a href="{{ route('edit.perfil') }}" class="btn btn-primary" style="width: 100%; border-radius: 0px; color: white !important" role="button">Editar información</a>
    </div>

</div>

<!-- MODAL CHANGE IMAGE PROFILE-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="container">
       <div class="row">
           <div class="col-sm-12">
               <img  src="../images/{{ $fotoperfil }}" class="img-fluid" style="max-width: 50%; display:block;" id="img-perfil" />
           </div>
       </div> 
      </div>
      <form id="profilePictureForm" action="{{ route('update.image.perfil', $user['idPersona']) }}" enctype="multipart/form-data" method="POST">
      {{ csrf_field() }}
        <div class="modal-footer">
        <span class="btn btn-success btn-file" style="width:18%;min-width: 120px">Editar imagen<input name="file" type="file" onchange="document.getElementById('img-perfil').src = window.URL.createObjectURL(this.files[0])" value="../images/{{ $fotoperfil }}" /></span>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>



<!-- MODAL CHANGE IMAGE PORTADA-->

<div class="modal fade" id="portada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="container">
       <div class="row">
           <div class="col-sm-12">
               <img  src="../images/{{ $fotoportada }}" class="img-fluid" style="max-width: 50%; display:block;" id="img-portada" />
           </div>
       </div> 
      </div>
      <form id="profilePictureForm" action="{{ route('update.image.portada', $user['idPersona']) }}" enctype="multipart/form-data" method="POST">
      {{ csrf_field() }}
        <div class="modal-footer">
        <span class="btn btn-success btn-file" style="width:18%;min-width: 120px; ">Editar imagen<input name="file" type="file" onchange="document.getElementById('img-portada').src = window.URL.createObjectURL(this.files[0])" value="../images/{{ $fotoportada }}" /></span>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
     

      </form>


      </div>
     
    </div>
  </div>
</div>




@endsection
