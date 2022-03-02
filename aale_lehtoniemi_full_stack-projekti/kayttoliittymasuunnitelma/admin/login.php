<?php
/*
	file:	admin/login.php
	desc:	Tarkistaa kirjautumisen tietokannasta, lisää kirjautumistiedot session-muuttujille
	date:	20.5.2020
	auth:	Aale L
*/
if(!empty($_POST)){
	//tultiin lomakkeelta
	$email=$_POST['email'];
	$salasana=$_POST['salasana'];
	include('../dbConnect.php');  //ylemmässä kansiossa oleva tietokantayhteys
	$sql="SELECT adminID,Email,Salasana,Etunimi,Sukunimi FROM admin WHERE Email='$email'";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0){
		//löytyi email
		$ksala=$conn->real_escape_string($salasana);
		$rivi=$tulos->fetch_assoc();
		if(password_verify($ksala,$rivi['Salasana'])){
			//kirjautuminen ok
			session_start();
			$_SESSION['adminID']=$rivi['adminID'];
			$_SESSION['nimi']=$rivi['Etunimi'].' '.$rivi['Sukunimi'];
			//$_SESSION['aika']=date('H:i:s'); tätä ei tarvita tässä kirjautumisessa
			header('location:index.php');
		}else header('location:kirjaudu.php?virhe=salasana');
	}else header('location:kirjaudu.php?virhe=email');
}else header('location:kirjaudu.php?virhe=kirjaudu');
?>