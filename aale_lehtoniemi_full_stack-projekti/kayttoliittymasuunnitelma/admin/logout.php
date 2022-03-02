<?php
/*
	file:	admin/logout.php
	desc:	Hävittää session-tiedot, ohjaa julkiselle sivulle
	date:	20.5.2020
	auth: 	Aale L
*/
session_start();
session_destroy();
header('location:../');
?>