<?php

include_once 'inc/functions.php';
include_once 'inc/team.php';
include_once 'inc/config.php';
session_start();

// Header
DEFINE('APP_TITLE', 'Live Stream : Vidéo à la demande (VOD)');
include_once 'inc/head.php';

?>

<body class="container">

<!-- Navbar -->
<nav class="navbar navbar-light" style="background-color: #A5AED5;">
  <a class="navbar-brand" href="#">
    <img src="img/icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    <?php echo APP_NAME ?>
  </a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

<?php

// Vérification de connexion
if(!isset($_SESSION['isauth']) || !$_SESSION['isauth']){
    $isauth = false;
}else {
    $isauth = true;
}

// Message en fonction du code $_GET
if(isset($_GET['code']) && !empty($_GET['code']) || isset($_GET['code']) && $_GET['code'] === '0'){
    switch($_GET['code']){
        case 0 :
            $col = 'warning';
            $msg = 'Nom d\'utilisateur ou mot de passe incorrect';
            break;
        case 1 :
            $col = 'success';
            $msg = 'Bienvenue ';
            $isauth ? $msg .= $_SESSION['fname']." !" : " !";
            break;
        case 2 :
            $col = 'danger';
            $msg = 'Un problème est survenu. Veuillez réessayer.';
            break;
        case 4 :
            $col = 'info';
            $msg = 'La session est échue.';
            break;
        case 5 :
            $col = 'success';
            $msg = 'Votre compte a bien été créé !';
            break;
    }

    if(isset($col) && isset($msg)){
        echo '<div class="alert alert-'.$col.' alert-dismissible fade show" role="alert">
        <p>'.$msg.'</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }

}


?>

<div class="jumbotron">
  <h1 class="display-4"><?php echo APP_NAME ?></h1>
  <p class="lead">Bienvenue sur la plateforme <?php echo APP_NAME ?>. Ce site a été mis en ligne par la Garamont Coders Crew il y a 
      <?php echo daysAgo(13,01,2022) ?>  
      jours. Elle permet de louer des films HD en ligne</p>

<a class="btn btn-primary <?php echo !$isauth? 'd-none' : ''; ?>" " href="logout.php" role="button">Deconnexion</a>
<a class="btn btn-primary <?php echo $isauth? 'd-none' : ''; ?>" href="login.php" role="button">Connexion</a>
<a class="btn btn-outline-info <?php echo $isauth? 'd-none' : ''; ?>" href="register.php" role="button">Inscription</a>


</div>

<div class="row row-cols-1 row-cols-md-3">

  <div class="col mb-4">
    <div class="card h-100 womanBorder">
      <img src="img/woman.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Rokia</h5>
        <p class="card-text">Age : 20 ans</p>
        <p class="card-text">Hobbies : Sports, Musique</p>
        <a href="#" class="btn btn-outline-danger">Contacter</a>
      </div>
    </div>
  </div>

<?php


foreach($crew as $membre){
    $borderSex = $membre["sexe"] == "F" ? "womanBorder" : "manBorder";
    $buttonSex = $membre["sexe"] == "F" ? "btn btn-outline-danger" : "btn-outline-primary";
    $html = "";
    $html .= 
    '<div class="col mb-4">
    <div class="card h-100 '.$borderSex.'">';

// Image différente en fonction du sexe
if($membre["sexe"] == "F"){
    $html .= '<img src="img/woman.jpg" class="card-img-top" alt="'.$membre["fname"].'">';
}else{
    $html .= '<img src="img/man.jpg" class="card-img-top" alt="'.$membre["fname"].'">';
}

$html .= '
        <div class="card-body">
            <h5 class="card-title">'.$membre["fname"].'</h5>
            <p class="card-text">Age : '.$membre["age"].' ans</p>
            <p class="card-text">Hobbies : '.implode(",", $membre["hobbies"]).'</p>
            <a href="#" class="btn '.$buttonSex.'">Contacter</a>
        </div>
      </div>
  </div>';

echo $html;

}

?>

</div>

<!-- JQuery 3.5.1-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>