<?php
/*
	file:	admin/lisaaAdmin.php
	desc:	Tallentaa uuden user-taulun rivin. Generoi salasanan. Lähettäisi sähköpostilla email-osoitteeseen salasanan
			jos palvelimella email-lähetys mahdollista (ilman konfigurointia ei XAMPPissa)
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
if(!empty($_POST['rooli'])) $rooli=$_POST['rooli']; else $virhe=true;
$length = 10;  //salasanan pituudeksi tulee 10 merkkiä
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
include('../dbConnect.php');
//tarkistetaan, että sama email ei jo ole tietokannassa
$sql="SElECT Email FROM admin WHERE Email='$email'";
$tulos=$conn->query($sql);
if($tulos->num_rows > 0) $virhe=true;
if(!$virhe){
	
	//talletus tietokantaan ja sähköpostia käyttäjälle
	$salasana=password_hash($randomString,PASSWORD_DEFAULT);
	$sql="INSERT INTO admin(Email,Etunimi,Sukunimi,Salasana,Rooli) VALUES('$email','$etunimi','$sukunimi','$salasana','$rooli')";
	if($conn->query($sql) === TRUE) {
		//jos INSERT-lause onnistui, tieto päivittyi tietokantaan
		$conn->close();
		//lähetetään sähköpostilla tunnus ja salasana käyttäjälle
		$to=$email; //vastaanottajan email
        $subject='Rese ylläpitotunnus ja salasana';
        $txt="Hei $etunimi $sukunimi! \r\n";
        $txt.="Sinulle on luotu tunnus Rese palvelun ylläpitoon. \r\n";
        $txt.="Käyttäjätunnus: $email ja salasana:$randomString \r\n";
        $headers="From: webmaster@oikeaPalvelunDomain.fi"."\r\n"."CC:aale.lehtoniemi1@lapinamk.fi";
        mail($to,$subject,$txt,$headers);
        //echo $randomString;
        header('location:index.php?sivu=users&viesti=Käyttäjän lisäys onnistui!');
	}else{
		$conn->close();
		header('location:index.php?sivu=uusiAdmin&virhe=true&viesti=Päivitys ei nyt onnistu! Yritä uudelleen.');
	}
}else header('location:index.php?sivu=uusiAdmin&virhe=true');
?>