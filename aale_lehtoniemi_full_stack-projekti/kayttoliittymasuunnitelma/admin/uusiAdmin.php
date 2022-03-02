<?php
/*
	file:	uusiAdmin.php
	desc:	Uuden ylläpitäjän lisäyslomake
	date:	20.5.2020
	auth:	Aale L
*/
?>
<form class="form-signin" action="lisaaAdmin.php" method="post">
	<h2 class="form-signin-heading">Lisää ylläpitäjä</h2>
  <div class="form-group">
    <label  for="email">Sähköpostiosoite:</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label  for="etunimi">Etunimi:</label>
    <input type="text" class="form-control" name="etunimi" id="etunimi" placeholder="Etunimi" required>
  </div>
  <div class="form-group">
    <label  for="sukunimi">Sukunimi:</label>
    <input type="text" class="form-control" name="sukunimi" id="sukunimi" placeholder="Sukunimi" required>
  </div>
  <div class="form-group">
    <label  for="rooli">Rooli:</label>
    <select name="rooli">
		<option value=''>-Valitse rooli-</option>
		<option value='Admin'>Admin</option>
		<option value='User'>User</option>
	</select>
  </div>
  <button type="submit" class="btn btn-lg btn-primary">Talleta</button>
</form>