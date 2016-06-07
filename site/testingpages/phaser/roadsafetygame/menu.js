"use strict";
var BGlake = document.getElementById("bgLake");
var BGcity = document.getElementById("bgCity");
var glitchSFX = document.getElementById("glitch_sfx");
var themeLivery = ['#00FFFF','#FFFFFF','#808080','rgb(0, 194, 190)'];
var username = '';

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
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(5) rotate(50deg) translate(0%,-50%)'});
        glitchSFX.play();
    },350);
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(10) rotate(20deg) translate(0%,-50%)'});
    },380);
    setTimeout(function(){
        $("#title .sub").html('<span>></span>START YOUR JOURNEY<span><</span>');
        $("#title .sub").css({'font-size': '40px'});
    },410);
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(8) rotate(35deg) translate(%,-50%)'});
    },440);
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(3) rotate(40deg) translate(0%,-50%)'});
    },470);
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(1) translate(-50%,-50%)'});
    },500);
}, function() {
    $("#title .main").css('opacity','1');
    $("#title .sub").css('top','108%');
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(5) rotate(50deg) translate(0%,-50%)'});
        glitchSFX.play();
    },350);
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(10) rotate(20deg) translate(0%,-50%)'});
    },380);
    setTimeout(function(){
        $("#title .sub").html('A ROAD SAFETY GAME');
        $("#title .sub").css({'font-size': '30px'});
    },410);
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(8) rotate(35deg) translate(%,-50%)'});
    },440);
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(3) rotate(40deg) translate(0%,-50%)'});
    },470);
    setTimeout(function(){
        $("#title .sub").css({transform: 'scaleX(1) translate(-50%,-50%)'});
        $("#title .sub").toggleClass('error');
    },500);

});

$('nav > a').hover(function(){
    $(this).css('color',themeLivery[3]);
},function(){
    $(this).css('color','initial');
});

$('#title').click(function(){
    if (getCookie('username') == '') {
        $('#accountOverlay').fadeIn(300);
        $('#title').fadeOut(300);
        $('nav').fadeOut(300);
        $(document).keyup(function(e) {
            if (e.keyCode == 27) { //Escape key
                $('#accountOverlay').fadeOut(300);
                $('#title').fadeIn(300);
                $('nav').fadeIn(300);
            }
        });
        $(".formWrapper").on("click", ".background", function() {
            $("#accountOverlay").fadeOut(480);
            $('#title').fadeIn(300);
            $('nav').fadeIn(300);
        });
        $('#createAccountForm').submit(function(event) {
            event.preventDefault();
            var flashCount = 4;
            if ($('#usernameInput').val().length < 2) {
                var flashRed = setInterval(function(){
                    if (flashCount <= 0) {
                        clearInterval(flashRed);
                    } else {
                        $('#usernameInput').toggleClass('flashRed');
                    }
                    flashCount--
                },100);
            } else {
                username = $('#usernameInput').val();
                var flashGreen = setInterval(function(){
                    if (flashCount <= 0) {
                        clearInterval(flashGreen);
                    } else {
                        $('#usernameInput').toggleClass('flashGreen');
                    }
                    flashCount--
                },100);
                document.cookie = "username=" + username + "; expires=" + (Date.now + 15000) + " UTC";
                setTimeout(function(){
                    selectMap();
                },900);
            }
        });
    } else {
        username = getCookie('username');
        document.cookie = "username=" + username + "; expires=" + (Date.now + 15000) + " UTC";
        setTimeout(function(){
            selectMap();
        },900);
    }
});






$('#accountOverlay > .formWrapper input').keyup(function(){
    if ($(this).val().length < 2) {
        $(this).css({'box-shadow':'none'});
    } else {
        $(this).css({'box-shadow':'0 0 6px RGB(48,130,48)'});
    }
});

function selectMap() {
    $('#loadingText').hide();
    $('#accountOverlay').hide();
    $('#title').hide();
    $.ajax({
        url: "testingpages/phaser/roadsafetygame/ajax/servegamedata.php",
        data: {},
        type: 'POST',
        success: function(data){
            $('#selectMap').fadeIn(500);
            
            /*JSON.parse(data).forEach(function(){
                $('#selectMap').append('<div></div>');
            });*/
        },
        error: function(xhr,status){
            console.error("AJAX " + status + " error! Contact website adminstrator.");
        }
    });
}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
