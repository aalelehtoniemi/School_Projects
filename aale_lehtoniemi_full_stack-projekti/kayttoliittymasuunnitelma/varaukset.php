<?php
/*
    file:   varaukset.php
    desc:   Näyttää listan varauksista
*/
?>
<h3>Varaustilanne</h3>
<p>Tässä tämänhetkinen varaustilanne.</p>
<?php
include('dbConnect.php');
$sql="SELECT varausID, aloitusaika,lopetusaika,sukunimi,etunimi,email, puhelin 
        FROM varaus 
        INNER JOIN kayttaja 
        ON varaus.kayttajaID=kayttaja.kayttajaID 
        INNER JOIN resurssi 
        ON varaus.resurssiID=resurssi.resurssiID 
        WHERE now() < lopetusaika ";
if(isset($_GET['resurssiID'])) $sql.=" AND resurssi.resurssiID=".$_GET['resurssiID'];
if(isset($_GET['kayttajaID'])) $sql.=" AND kayttaja.kayttajaID=".$_GET['kayttajaID'];
$sql.=" ORDER BY aloitusaika";
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
    //löytyi tietoa
    echo '<div class="row">';
    $laskuri=0;
    while($rivi=$tulos->fetch_assoc()){
        $aloitusaika=date_create($rivi['aloitusaika']);  //muokataan päivämäärän esitysmuotoa ja sen vuoksi
        $lopetusaika=date_create($rivi['lopetusaika']);//alku- ja loppuaika poimitaan muuttujille tietokantariviltä
        echo '<div class="col-sm-6">';
        echo '<div class="card"><div class="card-header text-center"><p>Varaus ajalle:<br><b>';
		//tulostetaan aloitusaika- ja lopetusaika erikseen eli pvm muotoiltuna ja klo muotoiltuna
        echo date_format($aloitusaika,'d.m.Y').', klo '.date_format($aloitusaika,'H:i').' - ';
        echo date_format($lopetusaika,'d.m.Y').', klo '.date_format($lopetusaika,'H:i').'</b></p></div>';
        echo '<div class="card-footer text-center"><p>Varaaja:<br><b>'.$rivi['etunimi'].' '.$rivi['sukunimi'];
        echo '</b></p></div></div>';
        echo '<br><br></div>';
        $laskuri++;
        if($laskuri==2) echo '</div><p></p><div class="row">';
    }
    echo '</div>';
}else echo '<p class="alert alert-success">Ei löytynyt varauksia!</p>';
$conn->close(); //suljetaan tietokantayhteys
?>