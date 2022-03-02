<?php
/*
    file:   resurssivaraus/php/etusivu.php
    desc:   Näyttää etusivun sisältöä
*/
?>
<h3>Etusivu</h3>

<div class="row"><!--koko sivun jako-->
 <div class="col-sm-6 border">
  <h3>Tee varaus</h3>
  <div class="row">
    <div class="col-sm">
	  <form action="talletaVaraus.php" method="post">
		<div class="form-group-sm">
			<label for="resurssi">Valitse varattava resurssi:</label>
			<select name="resurssi" class="form-control-sm" required>
				<option value="">-Valitse resurssi-</option>
				<?php
				include('dbConnect.php');
				$sql="SELECT resurssiID, kuvaus FROM resurssi ORDER BY kuvaus";
				$tulos=$conn->query($sql);
				if($tulos->num_rows > 0){
				 while($rivi=$tulos->fetch_assoc()){
					 echo '<option value="'.$rivi['resurssiID'].'">'.$rivi['kuvaus'].'</option>';
				 }
				}
				?>
			</select>
		</div>
		<div class="form-group-sm">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
		</div>
		<div class="form-group-sm">
			<label for="sukunimi">Sukunimi:</label>
			<input type="text" class="form-control" id="sukunimi" placeholder="Sukunimi" name="sukunimi" required>
		</div>
		<div class="form-group-sm">
			<label for="etunimi">Etunimi:</label>
			<input type="text" class="form-control" id="etunimi" placeholder="Etunimi" name="etunimi" required>
		</div>
    </div>
    <div class="col-sm">
		<div class="form-group-sm">
            <label for="alkupvm">Alkupvm:</label>
			<input type="date" class="form-control" id="alkupvm" placeholder="Päivä" name="alkupvm" required>
        </div>
		<div class="form-group-sm">
            <label for="alkuklo">Alkuklo:</label>
			<input type="time" class="form-control" id="alkuklo" placeholder="Kello" name="alkuklo" required>
        </div>
		<div class="form-group-sm">
            <label for="loppupvm">Loppupvm:</label>
			<input type="date" class="form-control" id="loppupvm" placeholder="Päivä" name="loppupvm" required>
        </div>
		<div class="form-group-sm">
            <label for="loppuklo">Loppuklo:</label>
			<input type="time" class="form-control" id="loppuklo" placeholder="Kello" name="loppuklo" required>
        </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Varaa</button>
  </form>
 </div>
  
 <div class="col-sm-3 border">
  <h3>Varaukset</h3>
  <ul class="list-group">
  <?php
	$sql="SELECT varausID, aloitusaika,lopetusaika,kuvaus FROM varaus 
			INNER JOIN resurssi ON varaus.resurssiID=resurssi.resurssiID
			WHERE now() < lopetusaika
			ORDER BY aloitusaika";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0){
		while($rivi=$tulos->fetch_assoc()){
			echo '<li class="list-group-item"><small>';
			echo $rivi['kuvaus'].',<br><b>Alkaa: '.$rivi['aloitusaika'].'<br>Päättyy: '.$rivi['lopetusaika'];
			echo '</b></small></li>';
		}
	}
  ?>
  </ul>
 </div>
  
 <div class="col-sm-3 border">
  <h3>Tänään vapaana</h3>
  <ul class="list-group">
  <?php
	$sql="SELECT kuvaus,resurssi.resurssiID FROM resurssi 
			WHERE resurssiID NOT IN
			( SELECT resurssiID FROM varaus WHERE (CURRENT_DATE() 
			BETWEEN aloitusaika AND lopetusaika) 
			OR (CURRENT_DATE = date(aloitusaika)) 
			OR (CURRENT_DATE = date(lopetusaika)))";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0){
		while($rivi=$tulos->fetch_assoc()){
			echo '<li class="list-group-item"><small>';
			echo $rivi['kuvaus'].'</small></li>';
		}
	}
  ?>
  </ul>
  <h3>Tänään vapautuu</h3>
  <ul class="list-group">
  <?php
	$sql="SELECT kuvaus,resurssi.resurssiID FROM resurssi 
			WHERE resurssiID IN
			( SELECT resurssiID FROM varaus WHERE (CURRENT_DATE = date(lopetusaika)))";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0){
		while($rivi=$tulos->fetch_assoc()){
			echo '<li class="list-group-item"><small>';
			echo $rivi['kuvaus'].'</small></li>';
		}
	}
  ?>
          
  </ul>
 </div>
</div><!--koko sivun jako-->