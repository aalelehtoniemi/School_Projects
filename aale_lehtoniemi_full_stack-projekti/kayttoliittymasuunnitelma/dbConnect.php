<?php
/*
    file:   kayttoliitymasuunnitelma/dbConnect.php
    desc:   Luo tietokantayhteyden MySQL-palvelimelle määriteltyyn tietokantaan. Käyttää MySQL-palvelimella tietokannalle
            määriteltyä käyttäjätunnusta ja salasanaa
*/
$palvelin='localhost'; //paikallinen palvelin samalla koneella kuin PHP-skripti
$tietokanta='rese';
$dbTunnus='rese';
$dbSalasana='reservation';

//mysqli-objekti, jolla määritellään tietokantayhteys
$conn=new mysqli($palvelin,$dbTunnus,$dbSalasana,$tietokanta);
if($conn->connect_error) die('Tietokantayhteys ei nyt onnistu. Virhe: '.$conn->connect-error);

//mahdollistetaan ääkkösten toiminta tietokannan teksteissä
mysqli_set_charset($conn,"utf8");
?>