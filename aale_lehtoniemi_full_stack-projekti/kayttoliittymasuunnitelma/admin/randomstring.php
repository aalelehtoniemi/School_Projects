<?php
/*
	file: 	randomstring.php
	desc:	Tekee 10 merkkiä pitkän satunnaisen tekstin valituista merkeistä
	date:	14.5.2020
	auth:	Aale L
*/
$length = 10;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
echo $randomString;
?>