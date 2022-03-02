//	file: 	taulu/taulu.js	
//	desc:	Kutsuu kolmen sekunnin välein tilatut.php ja valmiit.php -palvelinskripteja ja näyttää vastauksen
//			admin/taulu/index.php -sivun "tilatut" ja "valmiit" id-kentissä <li class="list-group-item"></li> arvona

$(document).ready(function(){
	var x=setInterval(haeTilattu,3000);
	$('ul').on('click','span',function(){
		var id=$(this).attr('data-id'); //klikatun elementin data-id arvo sijoitetaan muuttujalle id
		muutaTila(id); //kutsutaan functiota muutaTila ja lähetetään sille id
	});
});

function muutaTila(id){
	$.post('muutatila.php',{
		tilausID:id
	},function(data){
		if(data=='ok'){
		 $("#tilapaivitys").html('<h1 class="bg-success">Tila päivitetty!</h1>');
		 setTimeout(function(){
			//sekunnin kuluttua tehdään tämä osa
			$("#tilapaivitys").html('<h1 class="bg-info">Päivitä tilauksen tila painikkeesta!</h1>');
			haeTilattu();
		 },1000);
		}else{
			$("#tilapaivitys").html('<h1 class="bg-alert">Päivitys ei onnistunut!</h1>');
			setTimeout(function(){
			//sekunnin kuluttua tehdään tämä osa
				$("#tilapaivitys").html('<h1 class="bg-info">Päivitä tilauksen tila painikkeesta!</h1>');
			},1000);
		}
	});
}

function haeTilattu(){
	var teksti='';
	$.get('../../taulu/tilatut.php',function(data){
		$.each(JSON.parse(data),function(key,val){
			teksti=teksti+'<li class="list-group-item"><h3>#: '+val.TilausID+' | '+val.Etunimi.charAt(0)+val.Sukunimi.charAt(0)+' | '+val.Aika;
			teksti=teksti+' <span class="btn btn-primary" data-id="'+val.TilausID+'">Valmis</span></h3></li>';
		});
		$("#tilatut").html(teksti);
	});
	haeValmiit();
}

function haeValmiit(){
	var teksti='';
	$.get('../../taulu/valmiit.php',function(data){
		$.each(JSON.parse(data),function(key,val){
			teksti=teksti+'<li class="list-group-item"><h3>#: '+val.TilausID+' | '+val.Etunimi.charAt(0)+val.Sukunimi.charAt(0)+' | '+val.Aika;
			teksti=teksti+' <span class="btn btn-primary" data-id="'+val.TilausID+'">Toimitettu</span></h3></li>';
		});
		$("#valmiit").html(teksti);
	});
}