

<!DOCTYPE html>
<html lang="fi">
<?php 
	require 'head.php';
?>
    <body>


     <nav class="navbar navbar-default" role="navigation">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Etusivu</a></li>
        <li><a href="register.php">Rekisteröidy</a></li>
        <li><a href="listall.php">Listaa kaikki</a></li>
        <li><a href="search.php">Hae</a></li>
        <li><a href="delete.php">Poista</a></li>
        <li><a href="settings.php">Asetukset</a></li>
      </ul>
    </nav>
    
    <div class="content-container">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron">
                <?php
                if (isset($_COOKIE["asetanimi"])){
                  $nimi = $_COOKIE["asetanimi"];
                  print("<h1>Hei " . $nimi . "</h1>");
                  print("<p>Tervetuloa takaisin PHP:n ihmeelliseen maailmaan!</p>");

                } else {
                  print("<h1>Hei PHP-maailma!</h1>");
                  print("<p>Tällä sivustolla kokeillaan hieman PHP-kielen ominaisuuksia.");
                }

                ?>
                <p><a class="btn btn-primary btn-lg" role="button" href="register.php">Kokeile lisää</a></p>
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
