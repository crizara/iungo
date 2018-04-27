$(document).ready(function(){
  var foto = 0;

  var imgs = ["./images/chica.jpg","./images/chico.jpg","./images/fea.jpg","./images/ivan.jpeg", "./images/jordi.jpg"];

  $(".botomg").click(cor);
  $("body").keydown(function(e) {
    if(e.keyCode == 37) {
      dis();
    }
    else if(e.keyCode == 39) {
      cor();
    }
  });



  function cor() {
    console.log('hola');
    $(".fotoperfil img, .nompersona").animate({"left": "+=600%"}, 600 );               
    $(".fotoperfil img, .nompersona").animate({ "left": "-=600%"}, 0 );
    $(".fotoperfil img").attr("src", imgs[foto]);
    foto++;
    if (foto == imgs.length) {
      foto = 0;
    }
  }

  $(".botodis").click(dis);

  function dis() {
    $(".fotoperfil img, .nompersona").animate({"left": "-=600%"}, 600 );               
    $(".fotoperfil img, .nompersona").animate({ "left": "+=600%" }, 0 );
    $(".fotoperfil img").attr("src", imgs[foto]);
    foto++;
    if (foto == imgs.length) {
      foto = 0;
    }
  }

  $(".botoin").click(inf);

  function inf() {
  	
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

  function sleep(miliseconds) {
    var currentTime = new Date().getTime();

    while (currentTime + miliseconds >= new Date().getTime()) {
    }
  }
});