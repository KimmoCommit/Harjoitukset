

<!DOCTYPE html>
<html lang="fi">
<?php 
	require 'head.php';
?>
    <body>


     <nav class="navbar navbar-default" role="navigation">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Etusivu</a></li>
        <li><a href="register.php">Rekisteröidy</a></li>
        <li  class="active"><a href="listall.php">Listaa kaikki</a></li>
        <li><a href="search.php">Hae</a></li>
        <li><a href="delete.php">Poista</a></li>
        <li><a href="settings.php">Asetukset</a></li>
      </ul>
    </nav>
    
    <div class="content-container">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <section><p><h3>Kaikki henkilöt</h3></p></section>
<?php
try
{
   require_once "registrationPDO.php";

   $accessDB = new registrationPDO();
   $result = $accessDB->allPersons();
   //print_r($tulos);
   foreach($result as $registration) {
	
	print("<div class='panel panel-default'>");
	print("<div class='panel-heading'> ". $registration->getNimi() ."</div>");
	print("<div class='panel-body'>
	<table class='listall-table'>
	<tr>
		<td>Puhelinnumero:</td><td>". $registration->getPuhnro() ."</td>
	</tr>
	<tr>
		<td>Osoite:</td><td>". $registration->getLahiosoite() ."</td>
	</tr>
	<tr>
		<td>Ikä:</td><td>". $registration->getIka() ."</td>
	</tr>
	<tr>
		<td>Sähköposti:</td><td><a href='mailto:". $registration->getSposti() ."?Subject=Hei taas!' target='_top'>". $registration->getSposti() ."</a></td>
	</tr>
	</table>
	</div>");
	print("</div>");

	
	}


} catch (Exception $error) {
    print($error->getMessage());


}
?>
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
