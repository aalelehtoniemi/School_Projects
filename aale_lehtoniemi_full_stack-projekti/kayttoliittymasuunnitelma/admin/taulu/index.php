<?php
/*
	file:	admin/taulu/index.php
	desc:	Ylläpitonäkymä tilausten hallintaan
	date:	14.5.2020 
	auth:	Yrjö K
*/
session_start(); 
if(!isset($_SESSION['userID'])) header('location:../kirjaudu.php');
header('Cache-control:no-cache,no-store,must-revalidate');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizzaonline</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/oma.css">
  <link rel="stylesheet" href="../../css/signin.css">
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="taulu.js"></script>
</head>
<body>
<div class="container">
 <div id="tilapaivitys"><h1 class="bg-info">Päivitä tilauksen tila painikkeesta!</h1></div>
 <div class="row">
  <div class="col-lg-6">
	<div class="panel panel-primary">
		<div class="panel-heading"><h1>Tilaukset</h1></div>
		<div class="panel-body">
			<ul class="list-group" id="tilatut">
			</ul>
		</div>
	</div>
  </div>
  <div class="col-lg-6">
	<div class="panel panel-primary">
		<div class="panel-heading"><h1>Valmiit</h1></div>
		<div class="panel-body">
			<ul class="list-group" id="valmiit">
			</ul>
		</div>
	</div>
  </div>
 </div>
</div>
</body>
</html>