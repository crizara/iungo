$(document).ready(function(){
	var persona;
  getpersona();
  carregarpersona();
  

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
   
$("#a-info").attr("href", "user/info/"+ persona.idPersona);

  }

  function getpersona() {    

    $.ajax({
      method: "GET",
      dataType: "json",
      url: "persona/personajson",
      success: function( data ) {
          persona = data[0];
      },
      async: false
      });
  }

  function carregarpersona(cor) {

    if (cor == "cor") {
      $(".fotoperfil img").animate({"left": "+=600%"}, 600 );               
      $(".fotoperfil img").animate({ "left": "-=600%"}, 0 );
      $
    } 
    if(cor == "dis") {
      $(".fotoperfil img").animate({"left": "-=600%"}, 600 );               
      $(".fotoperfil img").animate({ "left": "+=600%" }, 0 );
    }

    $(".fotoperfil img").attr("src", "./images/" + persona.img);   
  }

  function cor() {
  	setvista();
    setmg();
    getpersona();
    carregarpersona("cor");    
  }

  function dis() {
  	setvista();
  	getpersona();
    carregarpersona("dis");   
  }

  function setvista() {
  	$.ajax({
      method: "GET",
      dataType: "json",
      url: "persona/setvista",
      data: {'idReceptor' : persona.idPersona},
      async: false
      });
  }

  function setmg() {
    $.ajax({
      method: "GET",
      dataType: "json",
      url: "persona/setmg",
      data: {'idReceptor' : persona.idPersona},
      async: false
      });
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