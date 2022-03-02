<?php
/*
	file:	admin/uusiresurssi.php
	desc:	Resurssin lisäyslomake
	date:	21.5.2020
	auth:	Aale L
*/
?>
<form class="form-signin" action="talletaresurssi.php" method="post" enctype="multipart/form-data">
	<h2 class="form-signin-heading">Uusi resurssi listalle</h2>
  <div class="form-group">
    <label  for="resurssi">Kuvaus:</label>
    <input type="text" class="form-control" name="resurssi" id="resurssi" placeholder="resurssi" required>
  </div>
  <div class="form-group">
    <label  for="kuvaus">Käytössä:</label>
    <textarea class="form-control" name="kuvaus" cols="20" placeholder="Kuvaus" required></textarea>
  </div>
  <div class="form-group">
    <label  for="hinta">Maksimiaika:</label>
    <input type="number" class="form-control" name="hinta" step="1" value="0" placeholder="1" required>
  </div>
  <button type="submit" class="btn btn-lg btn-primary">Talleta tiedot</button>
</form>