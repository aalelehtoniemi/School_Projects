<?php
/*
	file: 	admin/muokkaaresurssi.php
	desc:	Muokkauslomake
	date:	21.5.2020
	auth:	Aale L
*/
if(isset($_GET['paivitys'])) $paivitys=$_GET['paivitys'];else $paivitys='';
if($paivitys=='ok') echo '<p class="alert alert-success">Päivitys onnistui!</p>';
elseif($paivitys=='') echo '';
else echo '<p class="alert alert-danger">'.$paivitys.'</p>';
include('../dbConnect.php');
$resurssiID=$_GET['resurssiID'];
$sql="SELECT * FROM resurssi WHERE resurssiID=$resurssiID";
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
	//tulostetaan resurssin tiedot
	$rivi=$tulos->fetch_assoc();
?>
<form class="form-signin" action="paivitaresurssi.php" method="post">
	<h2 class="form-signin-heading">Päivitä resurssin tiedot</h2>
	<input type="hidden" name="resurssiID" value="<?php echo $resurssiID?>" >
  <!--<div class="form-group">
    <label  for="resurssi">Resurssin nimi:</label>
    <input type="text" class="form-control" name="resurssi" id="resurssi" value="<?php echo $rivi['Resurssinimi']?>" required>
  </div>-->
      <div class="form-group">
    <label  for="kuvaus">Kuvaus:</label>
    <textarea class="form-control" name="kuvaus" cols="20" placeholder="Kuvaus" required><?php echo $rivi['kuvaus']?></textarea>
  </div>
  <div class="form-group">
    <label  for="kaytossa">Kaytossa:</label>
    <input type="text" class="form-control" name="kaytossa" id="kaytossa" value="<?php echo $rivi['kaytossa']?>" required>
  </div>
  <div class="form-group">
    <label  for="maksimiaika">Maksimiaika (tuntia):</label>
    <input type="number" class="form-control" name="maksimiaika" step="1" value="<?php echo $rivi['Resurssimaksimiaika']?>"  required>
  </div>
  <button type="submit" class="btn btn-lg btn-primary">Päivitä</button>
</form>

<?php
}else echo '<p>Ei löydy ko resurssia</p>';
?>