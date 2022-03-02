<?php
/*
	file:	admin/paivitaresurssi.php
	desc:	Päivittää resurssin perustiedot
	date:	20.5.2020
	auth:	Aale L
*/
$resurssiID=$_POST['resurssiID'];
$kuvaus=$_POST['kuvaus'];
$kaytossa=$_POST['kaytossa'];
$maksimiaika=$_POST['maksimiaika'];
include('../dbConnect.php');
$sql="UPDATE resurssi SET kuvaus='$kuvaus',kaytossa='$kaytossa',maksimiaika='$maksimiaika' WHERE resurssiID=$resurssiID";
$conn->query($sql);
header("location:index.php?sivu=muokkaaresurssi&resurssiID=$resurssiID&paivitys=ok");
?>