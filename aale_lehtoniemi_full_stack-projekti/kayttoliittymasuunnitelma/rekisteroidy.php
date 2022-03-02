    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/starter-template.css">
       <link rel="stylesheet" href="css/style.css">
<div class="container2">
    <h2 class="form-signin-heading">Rekisteröidy varausjärjestelmäämme!</h2></div>
      <br>
      <img src="images/lapinamk.jpg" width="150" height="100" class="center">
<form role="form" class="loginFrm" action="talletaRekisterointi.php" method="post">
    <br>
    <label  for="email">Sähköpostiosoite (=käyttäjätunnus):</label><br>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
<br>
    <label  for="etunimi">Etunimi:</label><br>
    <input type="text" class="form-control" name="etunimi" id="etunimi" placeholder="Etunimi" required>
<br>
    <label  for="sukunimi">Sukunimi:</label><br>
    <input type="text" class="form-control" name="sukunimi" id="sukunimi" placeholder="Sukunimi" required>
<br>
    <label  for="puhelin">Puhelin:</label><br>
    <input type="tel" class="form-control" name="puhelin" id="puhelin" placeholder="Puhelin" required>
<br>
    <label  for="osoite">Osoite:</label><br>
    <input type="text" class="form-control" name="osoite" id="osoite" placeholder="Katu, 99999 Kaupunki" required>
<br>
    <label for="salasana">Salasana:</label><br>
    <input type="password" class="form-control" name="salasana" id="syotasalasana" required>
<br>
    <label for="salasana1">Vahvista salasana:</label><br>
    <input type="password" class="form-control" name="salasana1" id="syotasalasana2" required><br>
<a href="index.php?sivu=etusivu"><button type="submit" class="btn btn-primary btn-block">Talleta tiedot</button></a><br>
    <button onclick="location.href='index.php'" class="btn btn-primary btn-block">Takaisin etusivulle</button><br>
    <footer class="fuuteri"><!--Tämän taustaväriksi #b3ffb3 ja siihen 5px reunat värillä #00b300a-->
    <h6 class="<copyright"><small>&#169; 2020 Aale Lehtoniemi (joo, ihan niin kuin joku oikeasti kopioisi tällaisia sivuja...)</small></h6>
    </footer>
    <!--<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <script src="./js/responsiveslides.min.js"></script> Näitä ei tarvita tällä sivulla-->
        <script src="./js/oma.js"></script>
</form>