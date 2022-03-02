<?php
/*
    file:   kayttoliittymasuunnitelma/resurssit.php
    desc:   Näyttää varattavat resurssit
*/
?>
<h3>Varattavat tilat ja laitteet</h3>
<p>Tässä listassa ovat kaikki varattavissa olevat resurssit eli tilat ja laitteet.</p>
<?php
include('dbConnect.php'); //otetaan käyttöön tietokantayhteysobjekti $conn
$sql="SELECT resurssiID, kuvaus, kaytossa, maksimiaika
        FROM resurssi";
$tulos=$conn->query($sql); //suoritetaan SQL-lause ja luodaan $tulos-niminen "joukko"
if($tulos->num_rows > 0){
    //tulostetaan löytyneet rivit
    echo '<div class="card-deck">';
    while($rivi=$tulos->fetch_assoc()){
        echo '<div class="card bg-light">';
        echo '<div class="card-body text-center"><p class="card-text">';
        echo '<p><a href="index.php?sivu=varaukset&resurssiID='.$rivi['resurssiID'].'">Näytä varaukset</a></p>';
        echo '<p class="alert alert-info">'.$rivi['kuvaus'].'</p>';
        echo '</p></div>';
        echo '<div class="card-footer text-center"><p>Maksimi varausaika:<br><b>'.$rivi['maksimiaika'].'</b></p></div>';
        echo '</div>';
    }
    echo '</div>';
}else echo '<p class="alert alert-danger">Ei löytynyt tietoja</p>';
$conn->close(); //suljetaan tietokantayhteys
?>
