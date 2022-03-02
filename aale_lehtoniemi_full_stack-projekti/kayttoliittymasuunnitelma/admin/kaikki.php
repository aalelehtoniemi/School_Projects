<?php
/*
	file:	admin/kaikki.php
	desc:	Näyttää kaikki tilaukset + sivutus
	date:	20.5.2020
	auth:	Aale L
*/
//luetaan linkissä tuleva start-arvo, jonka perusteella aloitetaan oikeasta kohtaa listaa SQL-haku
if(isset($_GET['start'])) $start=$_GET['start'];else $start=0;
$montako=10;  //montako riviä per sivu
//lasketaan montako riviä tietokannassa on
include('../dbConnect.php');
//lasketaan kaikkien rivin lkm tietokannasta varaus-taulusta
$sql="SELECT count(varausID) as lkm FROM varaus";
$tulos=$conn->query($sql);
$rivi=$tulos->fetch_assoc();
//Määritetään edellinen ja seuraava linkkien numeroarvo eli mistä kohtaa jatketaan klikattaessa
if($start+$montako>$rivi['lkm']) $seuraava=$start;else $seuraava=$start+$montako;
if($start>0) $edellinen=$start-$montako;else $edellinen=0;
echo '<p class="alert alert-info">Tässä listassa kaikki tilaukset. Avoimet tilaukset näkyville <a href="index.php?sivu=varaukset">tästä</a></p>';
$sql="SELECT varausID, aloitusaika, lopetusaika
		FROM varaus
        GROUP BY varausID
		ORDER BY aloitusaika DESC
		LIMIT $start,$montako";
$tulos=$conn->query($sql);
//näytetään edellinen ja seuraava linkit
echo '<ul class="pager">
  <li><a href="index.php?sivu=kaikki&start='.$edellinen.'" >Edellinen</a></li>
  <li><a href="index.php?sivu=kaikki&start='.$seuraava.'" >Seuraava</a></li>
</ul>';

//tulostetaan tilaukset
echo '<table class="table table-hover">';
echo '<tr><th>VarausID</th><th>Aloitusaika</th><th>Lopetusaika</th></tr>';
while($rivi=$tulos->fetch_assoc()){
	echo '<tr>';
	echo '<td>'.$rivi['varausID'].'</td>';
	echo '<td>'.$rivi['aloitusaika'].'</td>';
	echo '<td>'.$rivi['lopetusaika'].'</td>';
	echo '<td><a href="index.php?sivu=naytavaraus&varausID='.$rivi['varausID'].'" >';
	echo '</a></td>';
	echo '</tr>';
}
echo '</table>';
$conn->close();
?>