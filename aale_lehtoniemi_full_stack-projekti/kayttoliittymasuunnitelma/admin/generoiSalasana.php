<?php
/*
	file:	generoiSalasana.php
	desc:	Generoi salasana, päivittää userID:n perusteella, sähköposti käyttäjälle
	date:	20.5.2020
	auth:	Aale L
*/
$kayttajaID=$_GET['adminID'];
$email=$_GET['email'];
$length = 10;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
include('../dbConnect.php'); //dbConnect.php sijaitsee yhden hakemistotason verran tämän hakemiston yläpuolella
$salasana=password_hash($randomString,PASSWORD_DEFAULT);
$sql="UPDATE admin SET Salasana='$salasana' WHERE adminID=$adminID";
if($conn->query($sql)===TRUE){
    //UPDATE onnistui -> lähetetään sähköposti jen
    $conn->close();
    //lähetetään sähköpostilla tunnus ja salasana käyttäjälle
    $to=$email; //vastaanottajan email
    $subject='Rese salasanasi on vaihdettu!';
    $txt="Hei!\r\n";
    $txt.="Sinulle on generoitu uusi salasana Rese ylläpitoon. \r\n";
    $txt.="Käyttäjätunnus: $email ja salasana:$randomString \r\n";
    $headers="From: webmaster@oikeaPalvelunDomain.fi"."\r\n"."CC:aale.lehtoniemi1@lapinamk.fi";
    mail($to,$subject,$txt,$headers);
    //echo $randomString; //testin vuoksi!
    header('location:index.php?sivu=users&virhe=false&viesti=Salasanan generointi onnistui!');
}else{
    //tietokannan päivitys ei onnistunut
    $conn->close();
    header('location:index.php?sivu=users&virhe=true&viesti=Päivitys ei nyt onnistu!');
}
?>