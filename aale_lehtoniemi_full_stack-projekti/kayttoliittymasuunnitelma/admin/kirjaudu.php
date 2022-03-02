<?php
/*
	file:	admin/kirjaudu.php
	desc:	Kirjautumislomake
	date:	20.5.2020
	auth:	Aale L
*/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Rese</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/oma.css">
		<link rel="stylesheet" href="../css/signin.css">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="container">
		<h3>Rese - Ylläpitosivu - Kirjaudu</h3>
		<form action="login.php" method="post" class="form-signin">
		<div class="form-group">
			<label  for="email">Email:</label><br />
			<input type="email" name="email" id="email" placeholder="Email" />
		</div>
		<div class="form-group">
			<label for="salasana">Salasana</label><br />
			<input type="password" name="salasana" id="salasana" placeholder="Salasana" />
		</div>
		<div class="form-group">
			<input type="submit" value="Kirjaudu" />
		</div>
		</form>
	</div>
	</body>
</html>