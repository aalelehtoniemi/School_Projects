<?php
/*
	file:	admin/kryptaasalasana.php
	desc:	Päivittää adminID 3:n salasana kryptatuksi - Testausta varten vain ensimmäiselle (kaksi ensimmäistä ID:tä poistettu) ylläpitäjälle tietokannassa
*/
include('../dbConnect.php');
$salasana=password_hash('salasana',PASSWORD_DEFAULT);
$sql="UPDATE admin SET salasana='$salasana' WHERE adminID=3";
$conn->query($sql);
?>