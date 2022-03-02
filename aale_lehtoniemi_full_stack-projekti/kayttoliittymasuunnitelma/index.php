<?php
/*
    file:   kayttoliittymasuunnitelma/index.php
    desc:   Tämä on sovelluksen oletussivu. Määrittää ulkoasun ja kaikki sisältö näyttämään tämän kautta
*/
if(isset($_GET['sivu'])) $sivu=$_GET['sivu'];else $sivu='';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/starter-template.css">
       <link rel="stylesheet" href="css/style.css">

    <title>Resurssien varausjärjestelmä</title>
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="index.php"><img src="images/lapinamk.jpg" width="80"> Rese</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<!--Alla näkyy yläkulman valikot-->
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($sivu=='etusivu') echo 'active'?>">
        <a class="nav-link" href="index.php?sivu=etusivu">Etusivu</a>
      </li>
      <li class="nav-item <?php if($sivu=='resurssit') echo 'active'?>">
        <a class="nav-link" href="index.php?sivu=resurssit">Resurssit</a>
      </li>
      <li class="nav-item <?php if($sivu=='varaukset') echo 'active'?>">
        <a class="nav-link" href="index.php?sivu=varaukset">Varaukset</a>
      </li>
      <li class="nav-item <?php if($sivu=='varaajat') echo 'active'?>">
        <a class="nav-link" href="index.php?sivu=varaajat">Varaajat</a>
      </li>
    </ul>
    <span class="form-inline my-2 my-lg-0 text-white">
	  <span id="kayttaja"></span>
      <button id="logout" class="btn btn-secondary my-2 my-sm-0" type="button">Kirjaudu ulos</button>
	  <a id="login" class="btn btn-secondary my-2 my-sm-0" href="index.php?sivu=kirjaudu">Kirjaudu</a>
    </span>
  </div>
</nav>
      
      <?php
 if($sivu=='') echo '<div class="starter-template">
                    <h1>Resurssien varausjärjestelmä RESE - Lapin AMK, Tornio</h1>
                    <p class="lead">Tämän avulla voit varata laitteita ja tiloja Tornion Campuksella - eivät ole muuten kalenterin kautta varattavissa. Ole hyvä ja kirjaudu sisään tai <a href="rekisteroidy.php">rekisteröidy palveluun</a> jotta tekemäsi varaus näkyy palvelussamme oikein!</p></div>';
 elseif($sivu=='etusivu') include('etusivu.php');
 elseif($sivu=='resurssit') include('resurssit.php');
 elseif($sivu=='varaukset') include('varaukset.php');
 elseif($sivu=='varaajat') include('varaajat.php');
 elseif($sivu=='viesti') include('viesti.php');
 elseif($sivu=='kirjaudu') include('kirjaudu.php');
elseif($sivu=='rekisteroidy') include('rekisteroidy.php');
 else echo '<p class="alert alert-danger">Sivua ei löydy</p>';
?>

<footer class="fuuteri">
    <h6 class="<copyright"><small>&#169; 2020 Aale Lehtoniemi (joo, ihan niin kuin joku oikeasti kopioisi tällaisia sivuja...)</small></h6>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="js/oma.js"></script>
	
  </body>
</html>