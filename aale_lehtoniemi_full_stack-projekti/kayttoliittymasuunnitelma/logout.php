<?php
/*
	file:	kayttoliittymasuunnitelma/logout.php
	desc:	Hävittää session-tiedot, ohjaa julkiselle sivulle
	date:	30.4.2020
	auth: 	Aale L
*/
session_start();
session_destroy();
echo '{"status":"ok"}';
?>