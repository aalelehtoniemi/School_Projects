<?php
/*
	file:	admin/tilaukset.php
	desc:	Näyttää listan avoimista tilauksista
	date:	16.5.2020
	auth:	Aale L
*/
echo '<p class="alert alert-info">Tässä listassa avoimet varaukset. Kaikki varaukset näkyville <a href="index.php?sivu=kaikki">tästä</a></p>';
include('../dbConnect.php');
$sql="SELECT varausID, aloitusaika
		FROM varaus WHERE lopetusaika = '0000-00-00 00:00:00'
        GROUP BY varausID
		ORDER BY aloitusaika DESC";
$tulos=$conn->query($sql);
echo '<table class="table table-hover">';
echo '<tr><th>varausID</th><th>Pvm</th><th>Varauksia</th><th>Summa</th><th>Tila</th><th></th></tr>';
while($rivi=$tulos->fetch_assoc()){
	echo '<tr>';
	echo '<td>'.$rivi['VarausID'].'</td>';
	echo '<td>'.$rivi['Aloitusaika'].'</td>';
	echo '</tr>';
}
echo '</table>';
$conn->close();
?>