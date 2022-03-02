<?php
/*
	file:	admin/talletaresurssi.php
	desc:	Tallentaa uuden resurssin tiedot tietokantaan
	date:	20.5.2020
	auth:	Aale L
*/
$kuvaus=$_POST['kuvaus'];
$kaytossa=$_POST['kaytossa'];
$maksimiaika=$_POST['maksimiaika'];
		//talletetaan tietokantaan resurssin tiedot
		include('../dbConnect.php');
		$sql="INSERT INTO resurssi(kuvaus,kaytossa,maksimiaika,) 
			  VALUES('$kuvaus','$kaytossa',$maksimiaika)";
		$conn->query($sql);
		if(!isset($_SESSION['resurssiID'])) header('location:resurssit.php'); //vaatii kirjautumisen!
if(!empty($_GET['sivu'])) $sivu=$_GET['sivu'];else $sivu='';
header('Cache-control:no-cache,no-store,must-revalidate');
?>