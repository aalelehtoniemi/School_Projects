<?php
/*
	file:	poistaUser.php
	desc:	Poistaa valitun käyttäjän tietokannasta
	date:	20.5.2018
	auth:	Aale L
*/
$adminID=$_GET['adminID'];
include('../dbConnect.php');
$sql="DELETE FROM admin WHERE adminID=$adminID";
if($conn->query($sql) === TRUE) {
	//jos DELETE-lause onnistui, tieto päivittyi tietokantaan
	$conn->close();
	header('location:index.php?sivu=users&virhe=false&viesti=Käyttäjän poisto onnistui');
}else{
	$conn->close();
	header('location:index.php?sivu=users&virhe=true&viesti=Päivitys ei nyt onnistu! Yritä uudelleen.');
}
?>