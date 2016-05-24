"use strict";

var username = $('input[name="username"]'),
    email = $('input[name="email"]'),
    password = $('input[name="password"]'),
    repeatpassword = $('input[name="repeatpassword"]'),
    shortBio = $('input[name="shortbio"]'),
    allInputs = $('#signUpPageForm input, #signUpPageForm textarea'),
    
    form = $('#signUpPageForm'),
    timezoneSelect = $('#timezoneSelect'),
    updatePrevious = {};

$(document).ready(function() {
    var timezone = jstz.determine();
    
    timezoneSelect.val(timezone.name())
    
    console.log("Timezone detect completed! Value= " + timezone.name());
    
    $('#timezoneSelect option[value="'+timezone.name()+'"]').append(' (Autodetected)');
    $('.userAvatarBox').addClass('hover');
});

function usernameValidate(input) { //Username allowance parameters: Length => 2, username not taken
    if (username.val().length >= 2 && username.val().length <= 60 && input != false) {
        inputValidate(username, 1)
    } else {
        inputValidate(username, 0)
    }
};
username.keyup(function() {
    usernameValidate();
});
email.keyup(function() { //Email allowance parameters: Length => 5, must include '@' symbol
    if (email.val().length >= 5 && email.val().length <= 256 && email.val().indexOf('@') >= 0) {
        inputValidate(email, 1)
    } else {
        inputValidate(email, 0)
    }
});
password.keyup(function() { //Password allowance parameters: Length => 6, cannot have 'abcd' or '1234' in it
    if (password.val().length >= 8 && password.val().toLowerCase().indexOf('abcd') == -1 && password.val().indexOf('1234') == -1) {
        inputValidate(password, 1)
    } else {
        inputValidate(password, 0)
    }
});
repeatpassword.keyup(function() { //Repeat password allowance parameters: Same as 'password' field
    if (repeatpassword.val() == password.val() && repeatpassword.val().length >= 8) {
        inputValidate(repeatpassword, 1)
    } else {
        inputValidate(repeatpassword, 0)
    }
});
shortBio.keydown(function() { //Short Bio allowance parameters: Less than 250 chars
    if (250 - shortBio.val().length != 0) {
        inputValidate(shortBio, 1)
        $('*[name="'+$(this).prop('name') + '"] + .tooltipBubble span.remVal').text(250 - shortBio.val().length);
        $('*[name="'+$(this).prop('name') + '"] + .tooltipBubble span:first-of-type').css('color', 'white');
    } else {
        inputValidate(shortBio, 0)
        $('*[name="'+$(this).prop('name') + '"] + .tooltipBubble span:first-of-type').css('color', 'RGB(250,98,98)');
    }
});
username.focusout(function() {
    var xhttp;
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //Code to execute on response
            if (xhttp.responseText == "TRUE") {
                console.warn("Username Valid");
                usernameValidate(true)
            } else if (xhttp.responseText == "FALSE"){
                console.warn("Username Taken");
                usernameValidate(false)
            } else {
                console.error("Error!")
            }       
        }
    };
    xhttp.open("GET", "../subcomponents/checkusernamevalid.php?username=" + username.val(), true);
    xhttp.send();
});
function inputValidate(sender, update) {
    if (update == 1 && (updatePrevious[sender] == 0 || updatePrevious[sender] == null)) {
        $(sender).removeClass('javaInputBorderRed');
        $(sender).addClass('javaInputBorderGreen');
        
        $('*[name="' + $(sender).prop('name') + '"] ~ .validationSymbol').removeClass('animateToInvalid');
        $('*[name="' + $(sender).prop('name') + '"] ~ .validationSymbol').addClass('animateToTick');
    } else if (update == 0 && updatePrevious[sender] == 1) {
        $(sender).addClass('javaInputBorderRed');
        $(sender).removeClass('javaInputBorderGreen');
        
        $('*[name="' + $(sender).prop('name') + '"] ~ .validationSymbol').removeClass('animateToTick');
        $('*[name="' + $(sender).prop('name') + '"] ~ .validationSymbol').addClass('animateToInvalid');
    }
    updatePrevious[sender] = update
}
allInputs.focusin(function() {
    $('*[name="'+$(this).prop('name') + '"] + .tooltipBubble').fadeIn(220);
})
allInputs.focusout(function() {
    $('*[name="'+$(this).prop('name') + '"] + .tooltipBubble').fadeOut(380);
})

function updateAvatar() {
    $('.imageUpload').fadeIn(380);
}
$(".imageUpload").on("click", ".background", function() {
    $('.imageUpload').fadeOut(480);
});

function jsThisTest(input) {
    console.info('THIS = ' + input);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------


var max_base64_size = 1000000;//Max base64 string size in Bytes supported by server
var crop_max_width = 256;
var crop_max_height = 256;
var imgCoords;

$("#imageToUpload").change(function(){
    console.log('Picture Change');
	picture(this);
    $('#avatarUpload .canvasWrapper').show();
    $('#jcrop').show();
    $('a.footer').removeClass('disabled');
    
});

$("#signUpPageForm").submit(function(e){
    console.info('Submit form start'); //DEBUG
	e.preventDefault();
	//Get cropped image base64 string
	var base64 = $("#image").val();
	if(document.all) {//IE10 and below
		//Get base64 string file size in bytes
		var base64_size = base64.length;
		if(base64_size <= max_base64_size) {
			$.ajax({
				type: "POST",
				url: "subcomponents/createaccount.php",
				data: $("#signUpPageForm").serialize(),
				success: function(data){
							alert("Succes");
						},
				error: function(data){
							alert("Error");
						}
			});
		} else {
			alert("Image is too big to submit, update your browser to submit bigger images.");
		}
	} else {//IE11+ and modern browsers
        console.log('Modern browsers detected')
		//Remove base64 string value from #png input to prevent it form being sent
		$("#image").val("");
		//Get formdata
		var formData = new FormData($(this)[0]);
		//Convert base64 string to file blob
		var blob = dataURLtoBlob(base64);
		//Add file blob to the form data
		formData.append("cropped_image[]", blob);
		$.ajax({
			url: "subcomponents/createaccount.php",
			type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function(response){
                        console.info("AJAX Success");
                        alert("AJAX Success! PHP response recieved:\n" + response);
					},
			error: function(response){
						alert("Error");
					},
			complete: function(response) {
						//Add base64 string value back to #png input
						$("#image").val(base64);
					}
		});
	}
});

function avatarSelected() {
    $('.imageUpload').fadeOut(480);
    $('.userAvatarBox').removeClass('hover');
    $('.userAvatarBox > img').hide();
    if ($('#updatedAvatarThumbnail').length == 0) {
        $('.userAvatarBox').prepend('<canvas id="updatedAvatarThumbnail" width="'+ imgCoords.w +'px" height="'+ imgCoords.h +'px" style="position:absolute;left:0px;top:0px;width:100%;height:100%;">');
    }
    var imageObj = $("#jcrop img")[0];
    var canvas = $("#updatedAvatarThumbnail")[0];
	var context = canvas.getContext("2d");
    context.clearRect(0, 0, canvas.width, canvas.height);
	context.drawImage(imageObj, imgCoords.x, imgCoords.y, imgCoords.w, imgCoords.h, 0, 0, canvas.width, canvas.height);
}

var picture_width;
var picture_height;
var boxPreSelection = [];

function picture(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$("#jcrop, #preview").html("").append("<img src=\""+e.target.result+"\" alt=\"\" />");
			picture_width = $("#jcrop").width();
			picture_height = $("#jcrop").height();
            
            if (picture_width > picture_height) {
                boxPreSelection[3] = picture_height;
                boxPreSelection[1] = 0;
                boxPreSelection[2] = (picture_width - picture_height) / 2 + picture_height;
                boxPreSelection[0] = (picture_width - picture_height) / 2;
            } else {
                boxPreSelection[3] = (picture_width - picture_height) / 2 + picture_height;
                boxPreSelection[1] = (picture_height - picture_width) / 2;
                boxPreSelection[2] = picture_width;
                boxPreSelection[0] = 0;
            }

			$("#jcrop img").Jcrop({
				onSelect: throttle(canvas,120),
				boxWidth: $(document).width() / 2,
                boxHeight: $(document).height() / 2.2,
                aspectRatio: 1,
                minSize: [60, 60],
                setSelect: boxPreSelection,
                bgOpacity: .3
			});
		}
		reader.readAsDataURL(input.files[0]);
	}
}
function canvas(coords){
	var imageObj = $("#jcrop img")[0];
	var canvas = $("#canvas")[0];
	canvas.width  = coords.w;
	canvas.height = coords.h;
	var context = canvas.getContext("2d");
	context.drawImage(imageObj, coords.x, coords.y, coords.w, coords.h, 0, 0, canvas.width, canvas.height);
	png();
    imgCoords = coords;
}
function png() {
	var png = $("#canvas")[0].toDataURL('image/png');
	$("#image").val(png);
}
function dataURLtoBlob(dataURL) {
	var BASE64_MARKER = ';base64,';
	if(dataURL.indexOf(BASE64_MARKER) == -1) {
		var parts = dataURL.split(',');
		var contentType = parts[0].split(':')[1];
		var raw = decodeURIComponent(parts[1]);

		return new Blob([raw], {type: contentType});
	}
	var parts = dataURL.split(BASE64_MARKER);
	var contentType = parts[0].split(':')[1];
	var raw = window.atob(parts[1]);
	var rawLength = raw.length;
	var uInt8Array = new Uint8Array(rawLength);
	for(var i = 0; i < rawLength; ++i) {
		uInt8Array[i] = raw.charCodeAt(i);
	}

	return new Blob([uInt8Array], {type: contentType});
}




















/*
_________........._________
|ooooooooo\....../ooooooooo|
|oooooooooo\..../oooooooooo|
|ooooo|\oooo\../oooo/|ooooo|
|ooooo|.\oooo\/oooo/.|ooooo|
|ooooo|..\oooooooo/..|ooooo|
|ooooo|...\oooooo/...|ooooo|
|ooooo|....\oooo/....|ooooo|
|ooooo|.....\oo/.....|ooooo|
|ooooo|......\/......|ooooo|
|ooooo|..............|ooooo|
|ooooo|..............|ooooo|
*/