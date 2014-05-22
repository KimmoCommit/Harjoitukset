<?php 
if (isset($_POST["poista"])){
	try
	{
		require_once "registrationPDO.php";

		$usedb = new registrationPDO();
		$id = $_POST["id"];
	 	$usedb->deletePerson($id);
	
	} catch (Exception $error) {
		print($error->getMessage());
	}
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
        <li><a href="register.php">Rekisteröidy</a></li>
        <li><a href="listall.php">Listaa kaikki</a></li>
        <li><a href="search.php">Hae</a></li>
        <li class="active"><a href="delete.php">Poista</a></li>
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
	
	print("<form method='post' action='delete.php'><div class='panel panel-default'>");
	print("<div class='panel-heading'>". $registration->getNimi() ."</div>");
	print("<div class='panel-body'>
	<table class='listall-table'>
	<tr>
		<td>Id:</td><td>". $registration->getId() ."</td>
	</tr>
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
	<button name='poista' type='submit' class='btn btn-sm'>Poista</button>
	</div>
	<input type='hidden' name='id' value='" . $registration->getId() . "'>
	</form>");
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
