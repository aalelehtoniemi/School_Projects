<?php
/*
	file:	generoiSalasana.php
	desc:	Generoi salasana, päivittää käyttäjäID:n perusteella, sähköposti käyttäjälle
	date:	17.5.2020
	auth:	Aale L
*/
$userID=$_GET['kayttajaID'];
$email=$_GET['email'];
$length = 10;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
include('dbConnect.php'); //dbConnect.php sijaitsee yhden hakemistotason verran tämän hakemiston yläpuolella
$salasana=password_hash($randomString,PASSWORD_DEFAULT);
$sql="UPDATE kayttaja SET Salasana='$salasana' WHERE kayttajaID=$kayttajaID";
if($conn->query($sql)===TRUE){
$conn->close();
    
    $to=$email;
    $subject='Resen salasanasi on vaihdettu!';
    $txt.="Hei\r\n";
    $txt.="Sinulle on generoitu uusi salasana Reseen \r\n";
    $txt.="Käyttäjätunnus: $email ja salasana:$randomString \r\n";
    $headers="From: webmaster@oikeaPalvelunDoimain.fi"."\r\n"."CC:aale.lehtoniemi1@lapinamk.fi";
        //UPDATE onnistui
    mail($to,$subject,$txt,$headers);
    //echo $randomString; //testin vuoksi!
    
    header('location:index.php?sivu=varaajat&virhe=false&viesti=Salasanan generointi onnistui!');
}else{
    $conn->close();
    header('location:index.php?sivu=varaajat&virhe=true&viesti=Päivitys ei nyt onnistu!');
}
//tähän koodia!
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    </head>
<body>
     <form role="form">
					<label for="syotaemail">
						Syötä sähköpostiosoitteesi (=käyttäjätunnuksesi)
					</label><br>
					<input type="email" class="form-control" id="syotaemail">
					 <br>
					<label for="syotasalasana">
						Syötä uusi salasanasi
					</label><br>
					<input type="password" class="form-control" id="syotasalasana">
            <br><label for="syotasalasana">
            Syötä uusi salasanasi uudestaan
         </label>
         <input type="password" class="form-control" id="syotasalasana2">
        <div class="muistaminut"><br>
      <label><input type="checkbox" name="remember"> Muista minut</label>
    </div>
    <a href="index.php?sivu=etusivu"><button type="button" id="lokininappula">
        Kirjaudu sisään
        </button></a>
    </form>
    <main role="main" class="container">
<footer class="fuuteri"><!--Tämän taustaväriksi #b3ffb3 ja siihen 5px reunat värillä #00b300a-->
    <h6 class="<copyright"><small>&#169; 2020 Aale Lehtoniemi (joo, ihan niin kuin joku oikeasti kopioisi tällaisia sivuja...)</small></h6>
    </footer>
</main>
</body>
</html>
