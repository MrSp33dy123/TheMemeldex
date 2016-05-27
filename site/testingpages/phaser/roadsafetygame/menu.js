"use strict";
var BGlake = document.getElementById("bgLake");
var BGcity = document.getElementById("bgCity");
var themeLivery = ['#00FFFF','#FFFFFF','#808080','rgb(0, 194, 190)'];

$(document).ready(function() {
    console.log("Typing");
    $("#loadingText p:nth-of-type(1)").typed({
        strings: ["S T A N D B Y ,^300 L O A D I N G^600 .^100 .^100 ."],
        typeSpeed: 8,
        startDelay: 250,
        backSpeed: 1,
        backDelay: 3200,
        callback: function() {
            $("#loadingText p:nth-of-type(2)").typed({
                strings: ["[PRESS &#60;F11&#62; TO GO FULLSCREEN]"],
                typeSpeed: 8,
                startDelay: 250,
                backSpeed: 1,
                backDelay: 3000,
                showCursor:false,
                callback: function() {
                    BGlake.volume = 0;
                    BGlake.play();
                    $('#bgLake').animate({volume: 0.1}, 6000, "swing", function(){
                        BGcity.volume = 0;
                        BGcity.play();
                        $('#bgCity').animate({volume: 0.5}, 2000, "swing", function(){
                            setTimeout(function(){
                                $("#loadingText").fadeOut(1200);
                                setTimeout(function(){
                                    $("#bgVideo").fadeIn(4000);
                                },1200)
                                $("#title").show();
                                setTimeout(function(){
                                    $("#title .main").show();
                                    $("#title .sub").show();
                                    titleEntrance();
                                },3000);
                                $('nav').toggleClass('navEntry');
                            },500);
                        });
                    });
                }
            });
        },
    });
});

function titleEntrance() {
    var letters = $('#title .main span');
    var subContainer = $('#title .container');
    var letterQuantity = letters.length;
    var count = 0;
    var entryTime = 1500;
    
    var letterIterate = setInterval(function() {
        if (count <= letterQuantity) {
            letters.eq(count).addClass('letterSpin');
            count++;
        } else {
            clearTimeout(letterIterate);
            subContainer.css('opacity','1');
        }
    }, entryTime/letterQuantity); 
}
function backgroundMouseGradient(event) {
    var diffrential = Math.sqrt((event.pageX-=$(window).width()/2)*event.pageX + (event.pageY-=$(window).height()/2)*event.pageY);
    var threshold = $(window).height() * 1.35
    
    $("#bgVideo").css("-webkit-filter","blur(5px) brightness(65%) grayscale("+ ((diffrential / threshold) * 200) +"%)");
}



$(document).mousemove(function(event){
    throttle(backgroundMouseGradient(event), 80);
});



$("#title").hover(function() {
    $("#title .main").css('opacity','0');
    $("#title .sub").css('top','60%');
    $("#title .sub").toggleClass('error');
}, function() {
    $("#title .main").css('opacity','1');
    $("#title .sub").css('top','108%');
    $("#title .sub").toggleClass('error');

});

$('nav > a').hover(function(){
    $(this).css('color',themeLivery[3]);
},function(){
    $(this).css('color','initial');
});
