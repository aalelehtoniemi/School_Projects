//  file:   js/oma.js
//  Desc:   JavaScript, joka hakee tietoja backendsovelluksesta ja näyttää käyttöliittymässä
let polku="http://localhost/php/full_stack/kayttoliittymasuunnitelma/"; //polku PHP-kansioon, jossa backend sijaitsee
$(document).ready(function(){
    //alkunäkymän määritys->tarkistetaan, onko käyttäjä kirjautunut -> määritetään alkunäkymä
    onkoKirjautunut();
    //määritetään, mikä valikon linkeistä on aktiivinen. Kun klikataan navbar-nav luokan li-elementtiä
    $(".navbar-nav li").click(function(){
        $(this).siblings('li').removeClass('active'); //sisarus li-elementeiltä "active" pois
        $(this).addClass('active'); //klikatulle li-elementille lisätään "active" luokka
    })
    //kun kirjautumislomakkeen Submit-painiketta klikataan
    $(".loginFrm").submit(function(){
        kirjaudu(); //kutsutaan funktiota kirjaudu()
        return false; //estää sivun latautumisen uudestaanS
    });
    //kun "Kirjaudu ulos" -linkkiä (id="logout") klikataan
    $("#logout").click(function(){
        kirjauduUlos();
                       });
});
//document.ready -funkti loppuu
function kirjaudu(){
    let email=$("#email").val();
    let salasana=$("#salasana").val();
    $.post(polku+'login.php',{
        email:email, //vasemalla kentän nimi, joka lähetetään ja oikealla muuttuja, jonka arvo lähtee
        salasana:salasana
    },function(data){
        let tulos=JSON.parse(data,function(key,value){
            return value;
        });
        if (tulos.status=='ok'){
            //kirjautuminen onnistui
            $("#kayttaja").html('Kirjautunut käyttäjä: '+tulos.kayttaja); //JSON datassa tulee login.php:lta kayttajan nimi
            $("#kayttaja").show(); //näytetään kirjautuneen käyttäjän tieto-osa
            $("#login").hide(); //piilotetaan id="login" html-sivulta
            $("#logout").show();//näytetään id="logout"
            //$("#loginModal").modal('hide'); //piilottaa modaalilomakkeen loginModal
        }else{
            //kirjautimisessa virhe
            alert('Kirjautuminen ei onnistu. Virhe: '+tulos.viesti);
        }
        $("#email").val('');
        $("#salasana").val('');
    });
}

function kirjauduUlos(){
    //kun on klikattu valikosta "Kirjaudu ulos"
    $.get(polku+'logout.php',function(data){
let tulos=JSON.parse(data,function(key,value){
            return value;
        });
        if(tulos.status=='ok'){
        $("#kayttaja").html('Olet kirjautunut ulos!'); //tyhjennetään käyttäjätieto
        $("#logout").hide();
        $("#login").show();
            setTimeout(function(){
                $("#kayttaja").html('');
                $("#kayttaja").hide(); //piilotetaan käyttäjätieto
                location.reload();
            },2000);
            
        }
    });
          }

function onkoKirjautunut(){
    //tarkistetaan backendin session.php-skriptiltä, onko käyttäjä kirjautunut
    $.get(polku+'session.php',function(data){
        let tulos=JSON.parse(data,function(key,value){
            return value;
        });
        if(tulos.status=='ok'){
            //kirjatuneen aloitusnäkymä
            $("#kayttaja").html('Kirjautunut käyttäjä: '+tulos.kayttaja); 
            $("#kayttaja").show();    
            $("#logout").show();
            $("#login").hide();
            
        }else{
            //kirjautumattoman aloitusnäkymä
            $("#logout").hide();
            $("#login").show();
            $("#kayttaja").html('');
            $("#kayttaja").hide();
            onAdmin=false;
        }
    });
}