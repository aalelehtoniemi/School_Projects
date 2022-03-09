<?php
/*
	file:	viesti.php
	desc:	Näyttää esim rekisteröinnin jälkeen viestin
	date:	20.5.2020
	auth:	Aale L
*/
$viesti=$_GET['viesti'];
$virhe=$_GET['virhe'];
if($virhe=='true'){
	echo '<p class="alert alert-danger">'.$viesti.'</p>';
}else{
	echo '<p class="alert alert-success">'.$viesti.'</p>';
}
?>
<html>
<head>
    <meta charset="utf-8">
</head>

<body>
<div>
    <button onclick="location.href='rekisteroidy.php'" class="btn btn-primary btn-block">Takaisin rekisteröintiin</button>
    <button onclick="location.href='index.php'" class="btn btn-primary btn-block">Takaisin etusivulle</button>
</div>
</body>
</html>