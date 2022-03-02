<?php
/*
	file:	oma.php
	desc:	Näyttää käyttäjän tietojen päivityslomakkeen
	date:	21.5.2020
	auth:	Aale L
*/
if(!empty($_GET['virhe'])) $virhe=$_GET['virhe'];else $virhe=false;
if(!empty($_GET['viesti'])) $viesti=$_GET['viesti'];else $viesti='';
include('../dbConnect.php');
$sql="SELECT * FROM admin WHERE adminID=".$_SESSION['adminID'];
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
	$rivi=$tulos->fetch_assoc();
?>
<div class="row">

 <div class="col-sm-6">
  <form class="form-signin" action="paivitaUser.php" method="post">
	<h2 class="form-signin-heading">Ylläpito - Päivitä tietosi</h2>
  <div class="form-group">
    <label  for="email">Sähköpostiosoite:</label>
    <input type="email" class="form-control" name="email" id="email" value="<?php echo $rivi['email']?>" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label  for="etunimi">Etunimi:</label>
    <input type="text" class="form-control" name="etunimi" id="etunimi" value="<?php echo $rivi['etunimi']?>" placeholder="Etunimi" required>
  </div>
  <div class="form-group">
    <label  for="sukunimi">Sukunimi:</label>
    <input type="text" class="form-control" name="sukunimi" id="sukunimi" value="<?php echo $rivi['sukunimi']?>" placeholder="Sukunimi" required>
  </div>
  <button type="submit" class="btn btn-lg btn-primary">Päivitä tiedot</button>
  </form>
<?php
	if($virhe=='false') echo '<p class="alert alert-success">'.$viesti.'</p>';
	else if($viesti!='') echo '<p class="alert alert-danger">'.$viesti.'</p>';
}else echo '<p class="alert alert-danger">Ei löydy ko käyttäjää</p>';
$conn->close();
?>
 </div>
 <div class="col-sm-6">
	<form class="form-signin" action="paivitaSalasana.php" method="post">
	<h2 class="form-signin-heading">Ylläpito - Päivitä salasanasi</h2>
	<div class="form-group">
    <label for="salasana">Nykyinen salasana:</label>
    <input type="password" class="form-control" name="salasana" id="salasana" required>
  </div>
  <div class="form-group">
    <label for="salasana1">Uusi salasana:</label>
    <input type="password" class="form-control" name="salasana1" id="salasana1" required>
  </div>
  <div class="form-group">
    <label for="salasana2">Uusi salasana vahvistus:</label>
    <input type="password" class="form-control" name="salasana2" id="salasana2" required>
  </div>
  <button type="submit" class="btn btn-lg btn-primary">Vaihda salasana</button>
 </div>
</div>