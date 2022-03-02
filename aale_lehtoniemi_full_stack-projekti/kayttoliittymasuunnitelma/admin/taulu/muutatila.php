<?php
/*
	file:	admin/taulu/muutatila.php
	desc:	Muuttaa TilausID:n perusteella tilan tilattu->valmis->toimitettu
	date:	23.5.2020
	auth:	Yrjö K
*/
$tilausID=$_POST['tilausID'];
include('../../db.php');
$sql="SELECT Tila FROM tilaus WHERE TilausID=$tilausID";
$tulos=$conn->query($sql);
$rivi=$tulos->fetch_assoc();
if($rivi['Tila']=='tilattu') $uusiTila='valmis';else $uusiTila='toimitettu';
$sql="UPDATE tilaus SET Tila='$uusiTila' WHERE TilausID=$tilausID";
if($conn->query($sql) === TRUE) {
	echo 'ok';
	$conn->close();
}else{
	echo 'Virhe';
	$conn->close();
}
?>