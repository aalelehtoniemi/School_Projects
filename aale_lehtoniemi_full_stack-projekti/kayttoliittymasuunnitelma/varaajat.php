<?php
/*
    file:   resurssivaraus/php/varaajat.php
    desc:   Näyttää listan henkilöistä, joilla on aktiivisia varauksia
*/
?>
<h3>Henkilöt, joilla aktiivisia varauksia</h3>
<p>Lista henkilöistä, joilla varauksia juuri nyt tai tulossa.</p>
<?php
include('dbConnect.php');
$sql="SELECT DISTINCT kayttaja.kayttajaID, email, sukunimi, etunimi, katuosoite, postinumero, paikkakunta, puhelin FROM kayttaja 
        INNER JOIN varaus
        ON kayttaja.kayttajaID=varaus.kayttajaID
        WHERE now() < lopetusaika
        ORDER BY sukunimi,etunimi";
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
    while($rivi=$tulos->fetch_assoc()){
        echo '<p class="alert alert-secondary">'.$rivi['etunimi'].' '.$rivi['sukunimi'].', puhelin: '.$rivi['puhelin'];
        echo ', email: '.$rivi['email'].'. <a href="index.php?sivu=varaukset&kayttajaID='.$rivi['kayttajaID'].'">Näytä varaukset</a></p>';
    }
}else echo '<p class="alert alert-danger">Ei löytynyt yhtään varausta</p>';
?>