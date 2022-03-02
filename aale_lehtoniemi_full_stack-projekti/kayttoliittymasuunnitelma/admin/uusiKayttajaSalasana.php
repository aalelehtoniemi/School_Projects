<?php
/*
	file:	admin/uusiAsiakasSalasana.php
	desc:	Generoi salasana, päivittää kayttajaID:n perusteella, sähköposti käyttäjälle
	date:	20.5.2020
	auth:	Aale L
*/
$asiakasID=$_GET['kayttajaID'];
$email=$_GET['email'];
$length = 10;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
include('../dbConnect.php');
$salasana=password_hash($randomString,PASSWORD_DEFAULT);
$sql="UPDATE kayttaja SET Salasana='$salasana'WHERE kayttajaID=$kayttajaID";
if($conn->query($sql) === TRUE) {
	//jos UPDATE-lause onnistui, tieto päivittyi tietokantaan
	$conn->close();
	$to = $email;
	$subject = "Rese kirjautuminen";
	$txt = "Hei!\r\n";
	$txt.="Sinulle on generoitu uusi salasana PizzaOnline käyttöön. \r\n";
	$txt.="Tunnus: $email ja salasana: $randomString";
	$headers = "From: webmaster@oikeadomain.com" . "\r\n" .
	"CC: aale.lehtoniemi1@lapinamk.fi";
	mail($to,$subject,$txt,$headers);
	echo "<h1>$randomString</h1>";
	echo '<a href="index.php?sivu=kayttaja">Takaisin</a>';
	
}else{
	$conn->close();
	header('location:index.php?sivu=kayttaja&virhe=true&viesti=Päivitys ei nyt onnistu! Yritä uudelleen.');
}
?>