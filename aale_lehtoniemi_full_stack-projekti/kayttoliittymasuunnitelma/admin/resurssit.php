<?php
/*
	file:	admin/pizzat.php
	desc:	Tulostaa pizza-taulun tiedot
	date:	20.5.2020
	auth:	Aale L
*/
?>
		<h4>Resurssilista</h4>
		<p><a href="index.php?sivu=uusiresurssi">Lisää resurssi</a></p>
		<table class="table table-bordered">
			<tr>
				<th>ID</th><th>Kuvaus</th><th>Kaytossa</th><th>Maksimiaika</th>
			</tr>
			<?php
			include('../dbConnect.php'); //tietokantayhteys käyttöön
			$sql="SELECT resurssiID,kuvaus,kaytossa,maksimiaika FROM resurssi ORDER BY resurssiID";
			$tulos=$conn->query($sql);
			while($rivi=$tulos->fetch_assoc()){
				echo '<tr>';
                echo '<td><a href="index.php?sivu=muokkaaresurssi&resurssiID='.$rivi['resurssiID'].'">Muokkaa</a></td>';
				//echo '<td>'.$rivi['resurssiID'].'</td>';
				echo '<td>'.$rivi['kuvaus'].'</td>';
				echo '<td>'.$rivi['kaytossa'].'</td>';
				echo '<td>'.$rivi['maksimiaika'].'</td>';
				echo '</tr>';
			}
			$conn->close(); //suljetaan tietokantayhteys
			?>
		</table>
