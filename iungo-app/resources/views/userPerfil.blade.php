<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>AJAX: Profile picture update</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link href="{{ asset('css/userPerfil.css') }}" rel="stylesheet">  
</head>
<body> 
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
    </div>
  </div>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src="{{ asset('js/userPerfil.js') }}"></script>
</body>
</html>
