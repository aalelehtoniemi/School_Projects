<?php
/*
    file:   kayttoliittymasuunnitelma/session.php
    desc:   Tarkistaa onko session-tiedoissa käyttäjän tietoja
*/
header('Access-Control-Allow-Origin: *');
session_start();
if(isset($_SESSION['kayttaja'])){
    //on kirjautunut
    echo '{"status":"ok","kayttaja":"'.$_SESSION['kayttaja'].'"}';
}else{
    //ei ole kirjautunut
    echo '{"status":"virhe"}';
}
?>