

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
			<li class="active"><a href="search.php">Hae</a></li>
			<li><a href="delete.php">Poista</a></li>
			<li><a href="settings.php">Asetukset</a></li>
		</ul>
	</nav>

	<div class="content-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<form method="post">
								<input type="text" name="hakukentta"
									placeholder="Syötä nimi tähän..">
								<button name="hae" type="submit" class="btn btn-default">Hae</button>
							</form>
						</div>
						
					</div>
			
				
							<p><h3>Hakutulokset</h3></p>
					
					
							<?php
							if (isset($_POST["hae"])) {
							try {
							require_once "registrationPDO.php";
							$registrationPDO = new registrationPDO();
							$result = $registrationPDO->findPerson($_POST["hakukentta"]);
							if(count($result) == 0 ){
								print("
								<section><p> Yhtään hakutulosta ei löytynyt </p></section>
								");
							}
							
							else if( $_POST["hakukentta"] == ""){
							print("
								<section><p> Et antanut hakukriteerejä! </p></section>
								");
							}
							else {
								foreach($result as $registration) {
								print("
									<div class='panel panel-default'>
									<div class='panel-heading'>" . $registration->getNimi() . "</div>
									<table class='listall-table'>
									<tr><td>Puhelinnumero:</td><td>" . $registration->getPuhnro() . "</td></tr>
									<tr><td>Lähisoite:</td><td>" . $registration->getLahiosoite() . "</td></tr>
									<tr><td>Ikä:</td><td>" . $registration->getIka() . "</td></tr>
									<td>Sähköposti:</td><td><a href='mailto:". $registration->getSposti() ."?Subject=Hei taas!' target='_top'>". $registration->getSposti() ."</a></td>
									</table>
									</div>
									
								");
								}
							}
							
							}
							catch (Exception $error){
							print($error->getMessage());
							
							}
							}
							?>
				
				</div>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

</body>
</html>
