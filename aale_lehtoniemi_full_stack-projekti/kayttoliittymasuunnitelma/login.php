<?php
/*
	file:	kayttoliitymasuunnitelma/login.php
	desc:	Tarkistaa kirjautumisen tietokannasta, lisää kirjautumistiedot session-muuttujille
	date:	18.5.2020
	auth:	Aale L
*/
if(!empty($_POST)){
	//tultiin lomakkeelta
	$email=$_POST['email'];
	$salasana=$_POST['salasana'];
	include('dbConnect.php');  //ylemmässä kansiossa oleva tietokantayhteys
	$sql="SELECT kayttajaID,email,salasana,etunimi,sukunimi FROM kayttaja WHERE email='$email'";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0){
		//löytyi email
		$ksala=$conn->real_escape_string($salasana);
		$rivi=$tulos->fetch_assoc();
		if(password_verify($ksala,$rivi['salasana'])){
			//kirjautuminen ok
			session_start();
			$_SESSION['kayttajaID']=$rivi['kayttajaID'];
			$_SESSION['kayttaja']=$rivi['etunimi'].' '.$rivi['sukunimi'];
			echo '{"status":"ok","kayttaja":"'.$_SESSION['kayttaja'].'"}';
		}else echo '{"status":"virhe","viesti":"Salasana väärin!"}';
	}else echo '{"status":"virhe","viesti":"Email väärin!"}';
}else echo '{"status":"virhe","viesti":"Virheellinen sivunpyyntö!"}';
?>
