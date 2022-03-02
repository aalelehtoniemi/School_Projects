<?php
/*
	file:	talletaRekisterointi.php
	desc:	Tallentaa käyttäjän rekisteröintiedot asiakas-tauluun.
	date:	19.5.2020
	auth:	Aale L
*/
if(empty($_POST)) header('location:index.php?sivu=etusivu');
$virhe=false;
$viesti='';
include('checkEmail.inc');
if(validEmail($_POST['email'])) $email=$_POST['email']; else{
	$virhe=true;
	$viesti.='Email väärin!';
}
if(!empty($_POST['etunimi'])) $etunimi=$_POST['etunimi']; else $virhe=true;
if(!empty($_POST['sukunimi'])) $sukunimi=$_POST['sukunimi']; else $virhe=true;
if(!empty($_POST['puhelin'])) $puhelin=$_POST['puhelin']; else $virhe=true;
if(!empty($_POST['osoite'])) $katuosoite=$_POST['osoite']; else $virhe=true;
if(!empty($_POST['salasana'])) $salasana=$_POST['salasana']; else $virhe=true;
if(!empty($_POST['salasana1'])) $salasana1=$_POST['salasana1']; else $virhe=true;
if($salasana!=$salasana1){
	$virhe=true;
	$viesti.=' Salasanat eivät täsmää!';
}
if($virhe) header("location:index.php?sivu=viesti&virhe=true&viesti=Tarkista lomake! $viesti");
else{
	include('dbConnect.php');
	//tarkistetaan, että ei email ole jo olemassa
    $email=$conn->real_escape_string($email);
	$sql="SELECT Email FROM kayttaja WHERE Email='$email'";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0){
		$conn->close();
		header('location:index.php?sivu=viesti&virhe=true&viesti=Email oli jo rekisterissä.');
	}else{
		$salasana=password_hash($salasana,PASSWORD_DEFAULT); //salasana kryptataan
		$sql="INSERT INTO kayttaja(Email,Etunimi,Sukunimi,Puhelin,Katuosoite,Salasana) ";
		$sql.="values('$email','$etunimi','$sukunimi','$puhelin','$katuosoite','$salasana')";
		//echo $sql;
		if($conn->query($sql) === TRUE) {
			//jos INSERT-lause onnistui, tieto tallentui tietokantaan
			$conn->close();
            //tässä esim voisi olla koodi, jossa lähetetään tiedot käyttäjän sähköpostiin
			header('location:index.php?sivu=viesti&virhe=false&viesti=Rekisteröinti onnistui');
		}else{
			$conn->close();
			header('location:index.php?sivu=viesti&virhe=true&viesti=Rekisteröinti ei nyt onnistu! Yritä uudelleen.');
		}
	}
}
?>