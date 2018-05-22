@extends('layouts.app')

@section('linkcss')

<link href="{{ asset('css/galeria.css') }}" rel="stylesheet"> 

@endsection


@section('content')
	<div class="container" style="background-color:white; margin-top:20px">
		<div class="gallery" style="padding-top:20px">
			<div class="gallery-item contenedor">
				<a href="#"  data-toggle="modal" data-target="#insertargaleria"><div class="contenido">
					<span class="click-aqui">{{$mensaje}} <br><i class="fa fa-plus" aria-hidden="true"></i>
            click aqui para añadir una foto</span></div>
          </a>
        </div>
        @foreach ($fotosgaleria as $fotos)
       <div class="gallery-item iungo-galery snip1548"  >
       <a href="{{ route('delete.galeria', ['idGaleria' => $fotos->idGaleria, 'idPersona' =>$user['idPersona'] ])  }}" style="color:#5379FA"><i class="fas fa-times" onclick="confirm('¿Seguro que quieres eliminar la foto?')"></i></a>
        <img class="gallery-image" src="../../images/{{ $fotos->img}}" alt="">
        </div> 
        @endforeach
      </div>
    </div>

    <!-- MODAL INSERT IMAGE -->
    <div class="modal fade" id="insertargaleria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <p class="titulo-modal">Foto galeria</p>
          <div class="row" style="text-align: center; margin-bottom: 1em;">
           <div class="col col-sm-12" style="margin-bottom: 1em;">
            <img  src="../../images/fondoiungo.jpg" class="img-thumbnail imagen-modal" id="img-galeria" />
          </div>
          <form id="profilePictureForm" action="{{ route('insert.galeria', $user['idPersona']) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="col col-sm-4">
              <span class="btn btn-iungo2 btn-file">Elegir foto <input name="file" type="file" onchange="document.getElementById('img-galeria').src = window.URL.createObjectURL(this.files[0])" />
              </span>
            </div>
            <div class="col col-sm-4">
              <button type="submit" class="btn btn-iungo separar" >Insertar foto</button>
            </div>
          </form>
          <div class="col col-sm-4">
           <a class="btn btn-cancelar" data-dismiss="modal">Cerrar</a>
         </div>
       </div>
     </div>
   </div>
 </div>

<script type="text/javascript">
  $(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);

</script>

@endsection
