<?php
/*
	file: kayttoliittymasuunnitelma/talletaVaraus.php
	Desc: Esimerkki, jossa talletetaan varaus tietokantaan 
		  HUOM! Tässä ei kirjautumista, eikä ylimääräisiä tarkistuksia!!!! 
		  Tarkistaa, että resurssi on vapaana ja että email on sallittu
*/
$resurssi=$_POST['resurssi'];
$etunimi=$_POST['etunimi'];
$sukunimi=$_POST['sukunimi'];
$email=$_POST['email'];
//poimitaan lomakkeelta tulevat pvm:t ja kellonajat erikseen-> alempana yhdistetään MySQL:ää varten yhdeksi arvoksi
$alkupvm=$_POST['alkupvm'];
$alkuklo=$_POST['alkuklo'];
$loppupvm=$_POST['loppupvm'];
$loppuklo=$_POST['loppuklo'];
//muutetaan varausajat sopiviksi MySQL:ää varten
$alkuaika=$alkupvm.' '.$alkuklo;
$loppuaika=$loppupvm.' '.$loppuklo;
//poimitaan emailista alkuosa ja loppuosa taulukkoon
$emailArr=explode('@',$email);
if($emailArr[1]=='lapinamk.fi' OR $emailArr[1]=='edu.lapinamk.fi'){
	include('dbConnect.php');
	//tarkistetaan, että varauksia ei tehdä päällekkäin!
	$sql="SELECT varausID FROM varaus WHERE (('$alkuaika' BETWEEN aloitusaika AND lopetusaika) ";
	$sql.=" OR ('$loppuaika' BETWEEN aloitusaika AND lopetusaika) ";
	$sql.=" OR (aloitusaika AND lopetusaika BETWEEN '$alkuaika' AND  '$loppuaika'))";
	$sql.=" AND resurssiID=$resurssi";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0) echo '<p>Varausta ei voi tehdä päällekkäin!</p><p><a href="../">Alkuun</a></p>';
	else{
		//talletetaan varaus - jos varaajaa ei ole, lisätään myös email, etunimi, sukunimi
		$sql="SELECT email, kayttajaID FROM kayttaja WHERE email='$email'";
		$tulos=$conn->query($sql);
		if($tulos->num_rows <= 0){
			//varaajan email ei löydy -> lisätään varaajan tiedot
			$salasana=password_hash('salasana',PASSWORD_DEFAULT); //tässä vain annettu salasana
			$sql="INSERT INTO kayttaja(email,salasana,sukunimi,etunimi,katuosoite,postinumero,puhelin,paikkakunta) ";
			$sql.=" VALUES('$email','$salasana','$sukunimi','$etunimi','Kauppakatu 58','95400','000000','TORNIO')";
			if($conn->query($sql)===TRUE){
				//varaaja lisätty, poimitaan kayttajaID juuri lisätyltä henkilöltä $conn->mysqli_insert_id -metodilla
				$kayttajaID=mysqli_insert_id($conn);
			}else{
				//ei voitu lisätä varaajaa -> lopetus tähän
				$conn->close();
				exit;
			}
		}else{
			//talletetaan varaus olemassaolevan käyttäjän id:n perusteella
			$rivi=$tulos->fetch_assoc(); //varaajan tiedoista pitää poimia varaajaID
			$kayttajaID=$rivi['kayttajaID'];
		}
		$sql="INSERT INTO varaus(kayttajaID,resurssiID,aloitusaika,lopetusaika) ";
		$sql.=" VALUES($kayttajaID,$resurssi,'$alkuaika','$loppuaika')";
		if($conn->query($sql)===TRUE){
			$conn->close();
			header('location:index.php?sivu=etusivu'); //onnistunut varaus, takaisin lomakkeelle
		}else{
			echo'<p>Varausta ei voitu tallentaa. Kokeile uudestaan!</p><p><a href="../">Alkuun</a></p>';
			$conn->close();
		}
	}
}else echo '<p>Varausta ei voitu tallentaa, koska email ei ole koulun email!</p><p><a href="../">Alkuun</a></p>';
?>