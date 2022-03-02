<?php
/*
	file:	admin/asiakas.php
	desc:	 Haetaan asiakas esim salasana generointia varten
	date:	20.5.2020
	auth:	Aale L
*/
?>
<h4>Hae asiakas</h4>
<form action="index.php?sivu=kayttaja" method="post">
<input type="text" name="haku" placeholder="Hakusana.." />
<input type="submit" class="btn btn-primary" value="Hae"/>
</form>

<table class="table table-striped">
	<tr>
		<th>Email</th><th>Nimi</th><th>Puhelin</th>
	</tr>
	<?php
	if(isset($_POST['haku'])){
		if(!empty($_POST['haku'])) $haku=$_POST['haku'];else $haku='abcdefghijklmn';
		include('../dbConnect.php');
		$sql="SELECT * FROM kayttaja WHERE email LIKE '%%$haku%%' OR etunimi LIKE '%%$haku%%'OR sukunimi LIKE '%%$haku%%'
			  OR puhelin LIKE '%%$haku%%'";
		$tulos=$conn->query($sql);
		while($rivi=$tulos->fetch_assoc()){
			echo '<tr>';
			echo '<td>'.$rivi['email'].'</td>';
			echo '<td>'.$rivi['etunimi'].' '.$rivi['sukunimi'].'</td>';
			echo '<td>'.$rivi['puhelin'].'</td>';
			echo '<td><a href="uusiKayttajaSalasana.php?kayttajaID='.$rivi['kayttajaID'].'&email='.$rivi['email'].'">Uusi salasana</a></td>';
			echo '</tr>';
		}
		$conn->close();
	}
	?>
</table>