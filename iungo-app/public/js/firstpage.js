$(document).ready(function(){
  var numpersona = 0;
  var persones = new Array();
  getpersones();
  carregarpersona();
  console.log(persones);

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
    console.log(persones[numpersona]);
  }

  function getpersones() {    

    $.ajax({
      method: "GET",
      dataType: "json",
      url: "http://172.16.9.24/iungo/iungo-app/public/persona/personesjson",
      success: function( data ) {
        $.each( data, function( key, val ) {
          persones[key] = val;      
        });
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

    $.ajax({
      method: "GET",
      dataType: "json",
      url: "http://172.16.9.24/iungo/iungo-app/public/persona/fotoperfil",
      data: {'idpersona' : persones[numpersona].idPersona},
      success: function( data ) {
          $(".fotoperfil img").attr("src", "./images/" + data.img);
       },
      async: false
      });
    
    numpersona++;
    if (numpersona == persones.length) {
      numpersona = 0;
    }    
  }

  function cor() {
    setmg();
    carregarpersona("cor");    
  }

  function dis() {
    carregarimg("dis");   
  }

  function setmg() {
    $.ajax({
      method: "GET",
      dataType: "json",
      url: "http://172.16.9.24/iungo/iungo-app/public/persona/setmg",
      data: {'idReceptor' : persones[numpersona-1].idPersona},
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