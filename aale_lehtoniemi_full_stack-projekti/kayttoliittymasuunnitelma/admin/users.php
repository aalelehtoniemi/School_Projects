<?php
/*
	file:	users.php
	desc:	Näyttää ylläpitäjälistan. Admin-roolissa olevat voivat lisätä/muokata tietoja
	date:	14.5.2020
	auth:	Aale L
*/
include('../dbConnect.php');
//selvitetään ensin käyttäjän oma roolissa
$sql="SELECT Rooli FROM admin WHERE adminID=".$_SESSION['adminID'];
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
	$rivi=$tulos->fetch_assoc();
	$rooli=$rivi['Rooli'];
}else $rooli='';
//haetaan lista
$sql="SELECT * FROM admin ORDER BY Sukunimi, Etunimi";
$tulos=$conn->query($sql);
?>
<h3>Ylläpitäjät</h3>
<?php
if($rooli=='Admin') echo '<p><a href="index.php?sivu=uusiAdmin">Lisää uusi ylläpitäjä</a></p>';
?>
<table class="table tbl-striped">
	<tr><th>ID</th><th>Email</th><th>Nimi</th><th>Rooli</th><th>Toiminto</th></tr>
	<?php
	while($rivi=$tulos->fetch_assoc()){
		echo '<tr>';
		echo '<td>'.$rivi['adminID'].'</td>';
		echo '<td>'.$rivi['email'].'</td>';
		echo '<td>'.$rivi['etunimi'].' '.$rivi['sukunimi'].'</td>';
		echo '<td>'.$rivi['rooli'].'</td>';
		if($rooli=='Admin' AND $_SESSION['adminID']!=$rivi['adminID']){
			echo '<td><a href="poistaUser.php?userID='.$rivi['adminID'].'">Poista</a> 
				<a href="generoiSalasana.php?adminID='.$rivi['adminID'].'&email='.$rivi['email'].'">Generoi salasana</a></td>';
		}else if($_SESSION['adminID']==$rivi['adminID']) echo '<td><a href="index.php?sivu=oma">Omat tiedot</a></td>';
		echo '</tr>';
	}
	$conn->close();
	?>
</table>