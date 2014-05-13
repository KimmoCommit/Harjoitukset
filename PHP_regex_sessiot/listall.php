<?php
require_once "registration.php";
session_start();


if(isset($_POST["korjaa"])){
  $registration = $_SESSION["registration"];
  session_write_close();
  header("location: register.php");
  exit;
}

if(isset($_POST["peruuta"])) {
  $_SESSION = array();
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
      );
  }
  session_destroy(); 
  header("location: index.php");
  exit;
}

if(isset($_POST["tallenna"])){
 $_SESSION = array();
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
      );
  }
  session_destroy(); 
  header("location: saved.php");
  exit;
}

if(isset($_SESSION["registration"])){
  $registration = $_SESSION["registration"];
  } else {
    header("location: index.php");
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
        <li class="active"><a href="listall.php">Listaa kaikki</a></li>
        <li><a href="search.php">Hae</a></li>
        <li><a href="delete.php">Poista</a></li>
        <li><a href="settings.php">Asetukset</a></li>
      </ul>
    </nav>
    
    <div class="content-container">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Rekisteröintitietosi:</h3>
              </div>
              <div class="panel-body">
                <form method="post">
                  <table class="listall-table">
                    <tr>
                      <td>Nimi:</td><td><?php print($registration->getNimi()); ?> </td>
                    </tr>
                    <tr>
                      <td>Puhelinnumero:</td><td><?php print($registration->getPuhnro()); ?> </td>
                    </tr>
                    <tr>
                      <td>Lähiosoite:</td><td><?php print($registration->getLahiosoite()); ?></td>
                    </tr>
                    <tr>
                      <td>Ikä:</td><td><?php print($registration->getIka()); ?></td>
                    </tr>
                    <tr>
                      <td>Sähköposti:</td><td> <?php print($registration->getSposti()); ?></td>
                    </tr>
                    <tr>
                      <td>Salasana:</td><td> <?php print($registration->getSalasana()); ?> </td>
                    </tr>
                  </table>
                  <button name="tallenna" type="submit" class="btn btn-default">Tallenna</button>
                  <button name="korjaa" type="submit" class="btn btn-default">Korjaa</button>
                  <button name="peruuta" type="submit" class="btn btn-default">Peruuta</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
