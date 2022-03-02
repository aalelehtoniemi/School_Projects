<?php
/*
	file:	paivitaSalasana.php
	desc:	Päivittää käyttäjän salasanan
	date:	21.5.2020
	auth:	Aale L
*/
if(empty($_POST)) header('location:index.php');
include('../dbConnect.php');
session_start();
$sql="SELECT Salasana FROM admin WHERE adminID=".$_SESSION['adminID'];
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
	$salasana=$_POST['salasana'];
	$salasana1=$_POST['salasana1'];
	$salasana2=$_POST['salasana2'];
	$rivi=$tulos->fetch_assoc(); //vanha salasana riville sql-tuloksesta
	if(password_verify($salasana,$rivi['Salasana'])){
		if($salasana1==$salasana2){
			$salasana1=password_hash($salasana1,PASSWORD_DEFAULT);
            $sql="UPDATE admin SET Salasana='$salasana1' WHERE adminID=".$_SESSION['adminID'];
            if($conn->query($sql)===TRUE){
                //päivitys onnistui
                $conn->close();
                header('location:index.php?sivu=oma&virhe=false&viesti=Salasana päivitetty!');
            }else{
                //päivitys ei onnistu nyt
                $conn->close();
                header('location:index.php?sivu=oma&virhe=true&viesti=Päivitys ei onnistunut!');
            }
		}else header('location:index.php?sivu=oma&virhe=true&viesti=Kirjoita uusi 2x oikein!');
	}else header('location:index.php?sivu=oma&virhe=true&viesti=Vanha salasana väärin');
}else header('location:index.php?sivu=oma&virhe=true&viesti=Ei löydy ko käyttäjää');
$conn->close();	
?>