

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
		<td>Sähköposti:</td><td>". $registration->getSposti() ."</td>
	</tr>
	</table>
	</div>");
	print("</div>");

	
	}


} catch (Exception $error) {
    print($error->getMessage());

	//header("location: virhe.php?sivu=Listaus&virhe=" . $error->getMessage());
	//exit;
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
