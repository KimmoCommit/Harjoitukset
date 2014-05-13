<?php

if(isset($_COOKIE["asetanimi"])){
   $nimi = $_COOKIE["asetanimi"];
} 


if(isset($_POST["asetanimi"])){
  $nimiArvo = $_POST["nimiArvo"];
  setcookie("asetanimi",$nimiArvo, time()+60*60*24*7);
  header("location: namechange.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="utf-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Koski PHP harjoitussivu</title>

  <!-- Koski-tyylitiedosto -->
  <link href="css/koski.css" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.slate.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>


     <nav class="navbar navbar-default" role="navigation">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Etusivu</a></li>
        <li><a href="register.php">Rekisteröidy</a></li>
        <li><a href="listall.php">Listaa kaikki</a></li>
        <li><a href="search.php">Hae</a></li>
        <li><a href="delete.php">Poista</a></li>
        <li class="active"><a href="settings.php">Asetukset</a></li>
      </ul>
    </nav>
    
    <div class="content-container">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <form method="post">
                  <input type="text" name="nimiArvo" placeholder="Syötä nimesi tähän.." value="<?php print($nimi); ?>">
                  <button name="asetanimi" type="submit" class="btn btn-default">Muuta nimeä</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>
