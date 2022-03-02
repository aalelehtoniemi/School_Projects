<?php
/*
	file:	admin/index.php
	desc:	Ylläpitopuolen oletussivu. Näkyy vain kirjautuneelle käyttäjälle. Ei talletu välimuisteihin.
	date:	20.5.2020 
	auth:	Aale L
*/
session_start();
if(!isset($_SESSION['adminID'])) header('location:kirjaudu.php'); //vaatii kirjautumisen!
if(!empty($_GET['sivu'])) $sivu=$_GET['sivu'];else $sivu='';
header('Cache-control:no-cache,no-store,must-revalidate'); //estää välimuistiin tallentumisen
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Rese</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/signin.css">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/oma.js"></script>
	</head>
	<body>
	<div class="container1">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Rese Ylläpito</a>
			</div>
			<ul class="nav navbar-nav">
				<li <?php if($sivu=='') echo 'class="active"'?>><a href="index.php">Alkuun</a></li>
				<li <?php if($sivu=='users') echo 'class="active"'?>><a href="index.php?sivu=users">Ylläpitäjät</a></li>
				<li <?php if($sivu=='varaukset' OR $sivu=='kaikki') echo 'class="active"'?>><a href="index.php?sivu=varaukset">Varaukset</a></li>
				<li <?php if($sivu=='resurssit' OR $sivu=='muokkaaresurssi') echo 'class="active"'?>><a href="index.php?sivu=resurssit">Resurssit</a></li>
				<li <?php if($sivu=='kayttaja') echo 'class="active"'?>><a href="index.php?sivu=kayttaja">Käyttäjä</a></h3></li>
			</ul>
			</div>
		</nav>
		<p>	
			Kirjautunut: <a href="index.php?sivu=oma"><?php echo $_SESSION['nimi']?></a>, 
			<a href="logout.php">Kirjaudu ulos</a>
		</p>
	</div>
	<div class="container">
		<?php
		//tutkitaan, mitä sivua näytetään tässä osassa
		if($sivu=='') {
			echo '<h3>Olet Rese-varausjärjestelmän hallintasivulla</h3>';

		}	
		else if($sivu=='oma') include('oma.php');
		else if($sivu=='users') include('users.php');
		else if($sivu=='uusiAdmin') include('uusiAdmin.php');
		else if($sivu=='varaukset') include('varaukset.php');
		else if($sivu=='kaikki') include('kaikki.php');
        else if($sivu=='varausluettelo') include('varausluettelo.php');
		else if($sivu=='naytavaraus') include('naytavaraus.php');
		else if($sivu=='resurssit') include('resurssit.php');
		else if($sivu=='uusiresurssi') include('uusiresurssi.php');
		else if($sivu=='muokkaaresurssi') include('muokkaaresurssi.php');
		else if($sivu=='kayttaja') include('kayttaja.php');
		?>
	</div>
	</body>
</html>