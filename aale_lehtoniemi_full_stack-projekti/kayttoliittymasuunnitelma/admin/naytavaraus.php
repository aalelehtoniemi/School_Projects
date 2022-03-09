<?php
/*
	file:	admin/naytatilaus.php
	desc:	Näyttää valitun varauksen 
	date:	20.5.2020
	auth:	Aale L
*/
$tilausID=$_GET['varausID'];
if(isset($_GET['back'])){
	echo '<p><button id="goback2" class="btn bnt-sm btn-primary">Takaisin</button></p>';
}else echo '<p><button id="goback" class="btn bnt-sm btn-primary">Takaisin</button></p>';
include('../db.php');
//tilaajan tiedot
$sql="SELECT * FROM kayttaja INNER JOIN varaus
	  ON kayttaja.kayttajaID=varaus.kayttajaID
	  WHERE varaus.varausID=$varausID";
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
	$rivi=$tulos->fetch_assoc();
	echo '<h4>Kayttaja: '.$rivi['Etunimi'].' '.$rivi['Sukunimi'].', '.$rivi['Puhelin'].'</h4>';
}	
//varauksen rivit
$sql="SELECT * FROM varaus WHERE varausID=$varausID";
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
	$rivi=$tulos->fetch_assoc();
	echo '<h4>VarausID: '.$varausID.' /</h4>'; 
	
	$sql="SELECT kuvaus,kaytossa,maksimiaika FROM resurssi
			INNER JOIN varaus
			ON resurssi.resurssiID=varaus.resurssiID
			WHERE varaus.varausID=$tilausID";
	$tulos=$conn->query($sql);
	echo '<table class="table table-hover">';
	echo '<tr><th>Pizza</th><th>á-hinta</th><th>Kpl</th><th>Summa</th></tr>';
	$total=0;
	while($rivi=$tulos->fetch_assoc()){
		echo '<tr>';
		echo '<td>'.$rivi['Kuvaus'].'</td>';
		echo '<td>'.number_format($rivi['Hinta'],2).'&euro;</td>';
		echo '<td>'.$rivi['Kpl'].'</td>';
		$summa=$rivi['Hinta']*$rivi['Kpl'];
		echo '<td><b>'.number_format($summa,2).'&euro;</b></td>';
		echo '</tr>';
		$total=$total+$summa;
	}
	echo '<tr><td></td><td></td><td>Yhteensä:</td><td><b>'.number_format($total,2).'&euro;</b></td></tr>';
	echo '</table>';
}else echo '<p class="alert alert-danger">Ei löydy varausta tällä varausID:llä!';
$conn->close();
?>