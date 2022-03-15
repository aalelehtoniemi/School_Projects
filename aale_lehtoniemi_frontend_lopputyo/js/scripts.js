$(document).ready(function() {
    $("#facebutton").click(function() {
        faceOpen();
    $("#twitbutton").click(function() {
        twitOpen();
    $("#instabutton").click(function() {
        instaOpen();
    $("#tubebutton").click(function() {
        tubeOpen();
$("#loginlapinamklogo").click(function(){ 
       lapinAmkEffect();
    });
    });
});
});
});

function faceOpen() {
window.open("https://www.facebook.com/LapinAMK/");
}
function twitOpen() {
window.open("https://twitter.com/LapinAMK");
}
function instaOpen() {
window.open("https://www.instagram.com/lapinamk/");
}
function tubeOpen() {
window.open("https://www.youtube.com/user/LapinAMK");
}
function lapinAmkEffect() {
$(".target").effect("shake");
}
});