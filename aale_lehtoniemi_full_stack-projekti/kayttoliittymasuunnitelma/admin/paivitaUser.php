<?php
/*
	file:	paivitaUser.php
	desc:	Päivittää Email, Etunimi ja Sukunimi -kentät admin-taulussa adminID:n perusteella
	date:	20.5.2020
	auth:	Aale L
*/
if(empty($_POST)) header('location:index.php');
$virhe=false;
$viesti='';
include('../checkEmail.inc');
if(validEmail($_POST['email'])) $email=$_POST['email']; else{
	$virhe=true;
	$viesti.='Email väärin!';
}
if(!empty($_POST['etunimi'])) $etunimi=$_POST['etunimi']; else $virhe=true;
if(!empty($_POST['sukunimi'])) $sukunimi=$_POST['sukunimi']; else $virhe=true;
include('../dbConnect.php');

session_start();
if($virhe) header("location:index.php?sivu=oma&virhe=true&viesti=$viesti");
else{
	//tarkistetaan, että sama email ei jo ole tietokannassa
	$sql="SELECT email FROM admin WHERE Email='$email'";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0) $sql="UPDATE admin SET etunimi='$etunimi', sukunimi='$sukunimi' WHERE adminID=".$_SESSION['adminID'];
	else $sql="UPDATE admin SET email='$email', etunimi='$etunimi', sukunimi='$sukunimi' WHERE adminID=".$_SESSION['adminID'];
	//echo $sql;
	if($conn->query($sql) === TRUE) {
		//jos UPDATE-lause onnistui, tieto päivittyi tietokantaan
		$conn->close();
		header('location:index.php?sivu=oma&virhe=false&viesti=Päivitys onnistui');
	}else{
		$conn->close();
		header('location:index.php?sivu=oma&virhe=true&viesti=Päivitys ei nyt onnistu! Yritä uudelleen.');
	}
}
?>