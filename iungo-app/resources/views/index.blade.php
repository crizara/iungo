<?php 
if(Auth::check()==1){
    header('Location: home');
    echo "string";
}
echo Auth::check();

?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Iungo Home Page</title>
        <link rel="stylesheet" href="css/vistaprincipal.css">
    </head>
    <body>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css'>
        <script src="https://use.fontawesome.com/242f61bc37.js"></script>
    </head>
<body>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
    <section class="page parallax with background fixed background-iungo">
        <nav class="nav">
            <ul>
                <li class=active><a href="#">¡ DÍSELO ! </a></li>
                <li><a href="#" data-page=.page.howtofly>¿ CHATEAMOS ?</a></li>
                <li><a href="#" data-page=.page.about>¡ NOSOTROS!</a></li>
                <li> <a href="{{ url('/login') }}" > ENTRA! </a></li>
            </ul>
        </nav>
       
        <div class="go down" data-page=.page.howtofly>
            <div class="arrow"></div>
        </div>
    </section>
    <section class="page howtofly with white background">
        <div class='inner'>
            <div class='container text right'>
                <h1>Conoce gente nueva.</h1>
                            <p><strong>Registra-te y experimenta</strong><br />Podrás conocer gente interesante.<br>
                            </b></p></font></b></a>
            </div>
        </div>
    </section>

    <section class="page about with background">
        <div class='inner'>
            <div class='container text'>
                <h1>Check us out</h1>
                <i class="fa fa-twitter-square fa-5x"></i>  
                <i class="fa fa-instagram fa-5x"></i>
                <i class="fa fa-facebook-official fa-5x"></i> 




                <!--<p>Contact us<br /><a target=_blank href="https://codepen.io/fershopls/details/GovZmV/">here</a></p>-->
            </div>
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>



    <script  src="js/vistaprincipal.js"></script>




</body>

</html>