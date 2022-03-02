<?php
/*
	file:	kayttoliittymasuunnitelma/onkoEmailOk.php
	desc:	Tarkistaa, onko emailissa "lapinamk.fi"
*/
header('Access-Control-Allow-Origin: *');
$email=strtolower($_POST['email']);
//poimitaan emailista @-merkin erottamat osat taulukkoon
$emailArr=explode("@",$email);
//jos jälkimmäinen osa taulukossa on 'lapinamk.fi' tai 'edu.lapinamk.fi' niin ok
if($emailArr[1]=='lapinamk.fi' OR $emailArr[1]=='edu.lapinamk.fi'){
	echo '{"status":"ok"}';
}else echo '{"status":"virhe"}';
?>