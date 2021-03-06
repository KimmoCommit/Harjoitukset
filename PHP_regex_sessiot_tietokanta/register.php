<?php
require_once "registration.php";
session_start();

if (isset($_POST["rekisteroidy"])) {
  $registration = new Registration($_POST["nimi"], $_POST["puhnro"], $_POST["lahiosoite"], $_POST["ika"], $_POST["sposti"], $_POST["salasana"], $_POST["salasanaVahvistus"]);
  $nameError = $registration->checkNimi();
  $puhnroError = $registration->checkPuhnro();
  $lahiosoiteError = $registration->checkLahiosoite();
  $ikaError = $registration->checkIka();
  $spostiError = $registration->checkSposti();
  $salasanaError = $registration->checkSalasana();
  $salasanaVahvistusError = $registration->checkSalasanaVahvistus();

  if($nameError == 0 && $puhnroError == 0 && $lahiosoiteError == 0 && $ikaError == 0 && $spostiError == 0 && $salasanaError == 0 && $salasanaVahvistusError == 0){
   $_SESSION["registration"] = $registration;
   session_write_close();
   header("location: listdata.php");
   exit;
 }

}

else {

  if(isset($_SESSION["registration"])){
    $registration = $_SESSION["registration"];
  } else {
    $registration = new Registration();

  }
  $nameError =  0;
  $puhnroError = 0;
  $lahiosoiteError = 0;
  $ikaError = 0;
  $spostiError = 0;
  $salasanaError = 0;
  $salasanaVahvistusError = 0;
}

?>



<!DOCTYPE html>
<html lang="fi">
<?php 
	require 'head.php';
?>
    <body>
     <nav class="navbar navbar-default" role="navigation">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Etusivu</a></li>
        <li class="active"><a href="register.php">Rekisteröidy</a></li>
        <li><a href="listall.php">Listaa kaikki</a></li>
        <li><a href="search.php">Hae</a></li>
        <li><a href="delete.php">Poista</a></li>
        <li><a href="settings.php">Asetukset</a></li>
      </ul>
    </nav>
    <div class="container">
      <div class="content-container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <h1> Rekisteröinti </h1>
                <form role="form" action="" method="post">
                  <div class="form-group">
                    <label>Nimi</label>
                    <input name="nimi" type="text" class="form-control" 
                    value="<?php print(htmlentities($registration->getNimi(), ENT_QUOTES, "UTF-8"));?>">

                    <?php
                    print("<h4>" . $registration->getError($nameError) . "</h4>");
                    ?> 

                  </div>
                  <div class="form-group">
                    <label>Puhelinnumero</label>
                    <input name="puhnro" type="text" class="form-control"
                    value="<?php print(htmlentities($registration->getPuhnro(), ENT_QUOTES, "UTF-8"));?>">

                    <?php
                    print("<h4>" . $registration->getError($puhnroError) . "</h4>");
                    ?> 

                  </div>
                  <div class="form-group">
                    <label>Lähiosoite</label>
                    <input name="lahiosoite" type="text" class="form-control"
                    value="<?php print(htmlentities($registration->getLahiosoite(), ENT_QUOTES, "UTF-8"));?>">

                    <?php
                    print("<h4>" . $registration->getError($lahiosoiteError) . "</h4>");
                    ?>

                  </div>
                  <div class="form-group">
                    <label>Ikä</label>
                    <input name="ika" type="text" class="form-control"
                    value="<?php print(htmlentities($registration->getIka(), ENT_QUOTES, "UTF-8"));?>">

                    <?php
                    print("<h4>" . $registration->getError($ikaError) . "</h4>");
                    ?>

                  </div>
                  <div class="form-group">                            
                    <label>Sähköposti</label>
                    <input name="sposti" type="text" class="form-control"
                    value="<?php print(htmlentities($registration->getSposti(), ENT_QUOTES, "UTF-8"));?>">

                    <?php
                    print("<h4>" . $registration->getError($spostiError) . "</h4>");
                    ?>

                  </div> 
                  <div class="form-group">
                    <label>Salasana</label>
                    <input name="salasana" type="text" class="form-control"
                    value="<?php print(htmlentities($registration->getSalasana(), ENT_QUOTES, "UTF-8"));?>">

                    <?php
                    print("<h4>" . $registration->getError($salasanaError) . "</h4>");
                    ?>


                  </div>
                  <div class="form-group">
                    <label>Anna salasana uudelleen</label>
                    <input name="salasanaVahvistus" type="text" class="form-control"
                    value="<?php print(htmlentities($registration->getSalasanaVahvistus(), ENT_QUOTES, "UTF-8"));?>">

                    <?php
                    print("<h4>" . $registration->getError($salasanaVahvistusError) . "</h4>");
                    ?>

                  </div> 

                  <button name="rekisteroidy" type="submit" class="btn btn-default">Rekisteröidy</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
  </body>
  </html>
