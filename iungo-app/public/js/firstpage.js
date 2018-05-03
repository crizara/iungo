$(document).ready(function(){
  var foto = 0;
  var persones = new Array();
  getpersona();

  var imgs = ["./images/chica.jpg","./images/chico.jpg","./images/fea.jpg","./images/ivan.jpeg", "./images/jordi.jpg"];  

  $("body").keydown(function(e) {
    if(e.keyCode == 37) {
      dis();
    }
    else if(e.keyCode == 39) {
      cor();
    }
  });

  $(".botomg").click(cor);

  $(".botodis").click(dis);  

  $(".botoin").click(inf);

  function inf() {
    getfoto(persones.shift());
  }

  function getpersona() {    

    $.getJSON( "http://172.16.9.24/iungo/iungo-app/public/persona/getids", function( data ) {
      $.each( data, function( key, val ) {
        persones[key] = val.idPersona;        
      });
    });
  }

  function getfoto(id) {
    $.get( "http://172.16.9.24/iungo/iungo-app/public/persona/fotoperfil",
     { idpersona: id} ).done(
     function( data ) {
      alert( data );
    });
   }

   function cor() {    
    $(".fotoperfil img, .nompersona").animate({"left": "+=600%"}, 600 );               
    $(".fotoperfil img, .nompersona").animate({ "left": "-=600%"}, 0 );
    $(".fotoperfil img").attr("src", imgs[foto]);
    foto++;
    if (foto == imgs.length) {
      foto = 0;
    }
  }

  function dis() {
    $(".fotoperfil img, .nompersona").animate({"left": "-=600%"}, 600 );               
    $(".fotoperfil img, .nompersona").animate({ "left": "+=600%" }, 0 );
    $(".fotoperfil img").attr("src", imgs[foto]);
    foto++;
    if (foto == imgs.length) {
      foto = 0;
    }
  }

  $(".botomg").hover(function(){
    $(this).find('i').attr('class', 'fas fa-heart');
  }, function(){
    $(this).find('i').attr('class', 'far fa-heart');
  });
  $(".botodis").hover(function(){
    $(this).find('i').attr('class', 'fas fa-times-circle');
  }, function(){
    $(this).find('i').attr('class', 'far fa-times-circle');
  });
  $(".botoin").hover(function(){
    $(this).find('i').attr('class', 'fas fa-question-circle');
  }, function(){
    $(this).find('i').attr('class', 'far fa-question-circle');
  });

});