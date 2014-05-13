<?php

class Registration {

	private static $errorcodes = array(

	-1 => "",
	0 => "",
	1 => "Kenttä ei saa olla tyhjä",
	11 => "Nimessä ei saa olla erikoismerkkejä",
	12 => "Nimessä tulee olla vähintään neljä (4) merkkiä",
	13 => "Nimessä tulee olla enintään kolmekymmentä (30) merkkiä",
	21 => "Puhelinnumerossa saa olla vain numeroita",
	22 => "Puhelinnumerossa on liian vähän numeroita - kentässä tulee olla täsmälleen 10 numeroa",
	23 => "Puhelinnumerossa on liian paljon numeroita - kentässä tulee olla täsmälleen 10 numeroa",
	31 => "Lähiosoitteessa ei saa olla erikoismerkkejä",
	32 => "Lähiosoitteessa on liian vähän merkkejä - kentässä tulee olla vähintään viisi (5) merkkiä",
	33 => "Lähiosoitteessa on liian paljon merkkejä - kentässä tulee olla enintään neljäkymmentä (40) merkkiä",
	41 => "Iässä tulee olla vain numeroita",
	42 => "Iässä on liian vähän merkkejä - kentässä tulee olla vähintään yksi (1) merkki",
	43 => "Iässä on liian paljon merkkejä - kentässä tulee olla enintään yksi (3) merkkiä",
	44 => "Palveluun voi rekisteröityä vain yli 18-vuotiaat",
	51 => "Sähköposti on muotoiltu väärin - kentän tiedon tulee olla muotoa Matti@Meikalainen.fi",
	52 => "Sähköpostissa on liian vähän merkkejä - kentässä tulee olla vähintään kuusi (6) merkkiä",
	53 => "Sähköpostissa on liian paljon merkkejä - kentässä tulee olla enintään kolmekymmentä (30) merkkiä",
	61 => "Salasanassa tulee olla kaksi (2) pientä ja  yksi (1) iso kirjain sekä kaksi numeroa",
	62 => "liian vähän",
	63 => "liian paljon",
	64 => "nimi löytyi",
	71 => "Salasanat eivät täsmää"

	);

public static function getError($errorcodes) {
	if (isset(self::$errorcodes[$errorcodes]))
		return self::$errorcodes[$errorcodes];

	return self::$errorcodes[-1];
}


//Asetetaan luokalle attribuutit
private $nimi;
private $puhnro;
private $lahiosoite;
private $ika;
private $sposti;
private $salasana;
private $salasanaVahvistus;


//Konstruktori
function __construct($nimi = "", $puhnro = "", $lahiosoite = "" , $ika = "", $sposti = "", $salasana = "", $salasanaVahvistus = "") {
	//ucwords asettaa jokaisen sanan ensimm'isen kirjaimen isoksi - tässä String-muuttujalle $nimi
	$this->nimi = trim(ucwords($nimi));
	$this->puhnro = trim($puhnro);
	$this->lahiosoite = trim(ucwords($lahiosoite));
	$this->ika = trim($ika);
	$this->sposti = trim($sposti);
	$this->salasana = trim($salasana);
	$this->salasanaVahvistus = trim($salasanaVahvistus);
}


//Set-metodi
public function setNimi($nimi) {
	//trim ottaa pois String-muuttujan edestä ja takaa tyhjän (whitespace) pois
	$this->nimi = trim($nimi);
}

//Get-metodi
public function getNimi() {
	return $this->nimi;
}



//Set-metodi
public function setPuhnro($puhnro) {
	//trim ottaa pois String-muuttujan edestä ja takaa tyhjän (whitespace) pois
	$this->puhnro = trim($puhnro);
}

//Get-metodi
public function getPuhnro() {
	return $this->puhnro;
}


//Set-metodi
public function setLahiosoite($lahiosoite) {
	//trim ottaa pois String-muuttujan edestä ja takaa tyhjän (whitespace) pois
	$this->lahiosoite = trim($lahiosoite);
}

//Get-metodi
public function getLahiosoite() {
	return $this->lahiosoite;
}

//Set-metodi
public function setIka($ika) {
	//trim ottaa pois String-muuttujan edestä ja takaa tyhjän (whitespace) pois
	$this->ika = trim($ika);
}

//Get-metodi
public function getIka() {
	return $this->ika;
}


//Set-metodi
public function setSposti($sposti) {
	//trim ottaa pois String-muuttujan edestä ja takaa tyhjän (whitespace) pois
	$this->sposti = trim($sposti);
}

//Get-metodi
public function getSposti() {
	return $this->sposti;
}



//Set-metodi
public function setSalasana($salasana) {
	//trim ottaa pois String-muuttujan edestä ja takaa tyhjän (whitespace) pois
	$this->salasana = trim($salasana);
}

//Get-metodi
public function getSalasana() {
	return $this->salasana;
}


//Set-metodi
public function setSalasanaVahvistus($salasanaVahvistus) {
	//trim ottaa pois String-muuttujan edestä ja takaa tyhjän (whitespace) pois
	$this->salasanaVahvistus = trim($salasanaVahvistus);
}

//Get-metodi
public function getSalasanaVahvistus() {
	return $this->salasanaVahvistus;
}



//Nimen tarkistusmetodi
public function checkNimi($required = true, $min = 4, $max = 30) {
	
	if ($required == false && strlen($this->nimi) == 0)
		return 0;

	//strlen tarkastaa, montako merkkiä muuttujassa on
	if ($required == true && strlen($this->nimi) == 0)
		return 1;

	if (strlen($this->nimi) < $min)
		return 12;

	if (strlen($this->nimi) > $max)
		return 13;

	if (preg_match("/[^a-zåäöA-ZÅÄÖ\- ]/", $this->nimi))
		return 11;

return 0;
}

//Puhelinnumeron tarkistusmetodi
public function checkPuhnro($required = true, $min = 10, $max = 10) {
	
	if ($required == false && strlen($this->puhnro) == 0)
		return 0;

	//strlen tarkastaa, montako merkkiä muuttujassa on
	if ($required == true && strlen($this->puhnro) == 0)
		return 1;

	if (preg_match("/[^0-9 ]/", $this->puhnro))
		return 21;

	if (strlen($this->puhnro) < $min)
		return 22;

	if (strlen($this->puhnro) > $max)
		return 23;



return 0;
}


//Lähiosoitteen tarkistusmetodi
public function checkLahiosoite($required = true, $min = 5, $max = 40) {
	
	if ($required == false && strlen($this->lahiosoite) == 0)
		return 0;

	//strlen tarkastaa, montako merkkiä muuttujassa on
	if ($required == true && strlen($this->lahiosoite) == 0)
		return 1;

	if (preg_match("/[^a-zåäöA-ZÅÄÖ\- ]+ [^0-9 ]/", $this->lahiosoite))
		return 31;

	if (strlen($this->lahiosoite) < $min)
		return 32;

	if (strlen($this->lahiosoite) > $max)
		return 33;



return 0;
}

//Iän tarkistusmetodi
public function checkIka($required = true, $min = 1, $max = 3) {
	
	if ($required == false && strlen($this->ika) == 0)
		return 0;

	//strlen tarkastaa, montako merkkiä muuttujassa on
	if ($required == true && strlen($this->ika) == 0)
		return 1;

	if (preg_match("/[^0-9 ]/", $this->ika))
		return 41;

	if (strlen($this->ika) < $min)
		return 42;

	if (strlen($this->ika) > $max)
		return 43;

	if ($this->ika < 18)
		return 44;

return 0;
}




//Sähköpostin tarkistusmetodi
public function checkSposti($required = true, $min = 6, $max = 30) {
	
	if ($required == false && strlen($this->sposti) == 0)
		return 0;

	//strlen tarkastaa, montako merkkiä muuttujassa on
	if ($required == true && strlen($this->sposti) == 0)
		return 1;

	if (preg_match("/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/i", $this->sposti))
		return 0;
	else {
		return 51;
	}

	if (strlen($this->sposti) < $min)
		return 52;

	if (strlen($this->sposti) > $max)
		return 53;


return 0;
}




//Salasanan tarkistusmetodi
public function checkSalasana($required = true) {
$muuttuja = $this->nimi;

	if ($required == false && strlen($this->salasana) == 0)
		return 0;

	//strlen tarkastaa, montako merkkiä muuttujassa on
	if ($required == true && strlen($this->salasana) == 0)
		return 1;


	if(preg_match("/^.*(?=.*[a-zåäö]{2,})(?=.*[A-ZÅÄÖ]{1,})(?=.*[0-9]{2,}).*$/", $this->salasana))
		return 0;
	else {
		return 61;
	}

/* Tällä voi kokeilla, jos nimi löytyy salasanasta - ei tuntunut toimivan keskellä salasanaa, 
vaan pelkästään yksin nimi kirjoitettuna salasanakenttään*/
	/*if (stristr($this->nimi,$this->salasana) === true)
		return 64;
*/
return 0;

}

//Salasana2:n tarkistusmetodi
public function checkSalasanaVahvistus($required = true, $min = 8, $max = 30) {

	if ($required == false && strlen($this->salasanaVahvistus) == 0)
		return 0;

	//strlen tarkastaa, montako merkkiä muuttujassa on
	if ($required == true && strlen($this->salasanaVahvistus) == 0)
		return 1;

	if (strcmp($this->salasana,$this->salasanaVahvistus) != 0)
		return 71;
	


return 0;

}

}
?>