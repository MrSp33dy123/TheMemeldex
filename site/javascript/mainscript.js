console.log("%c_________........._________\n|ooooooooo\\....../ooooooooo|\n|oooooooooo\\..../oooooooooo|\n|ooooo|\\oooo\\../oooo/|ooooo|\n|ooooo|.\\oooo\\/oooo/.|ooooo|\n|ooooo|..\\oooooooo/..|ooooo|\n|ooooo|...\\oooooo/...|ooooo|\n|ooooo|....\\oooo/....|ooooo|\n|ooooo|.....\\oo/.....|ooooo|\n|ooooo|......\\/......|ooooo|\n|ooooo|..............|ooooo|\n|ooooo|..............|ooooo|\n", "color:darkcyan;")
console.log("%cYou've opened the browser console! Great job! Heres a reward: \nBut you know, this isn't quite enough. You need to go deeper. Your clue: ", "color:darkcyan; font-style:italic;")

$(document).ready(fixHeaderTopOnLoad());

function changeBulbImage() {
    var image = document.getElementById('bulbToggle');
    if (image.src.match("bulbOn")) {
        image.src = "http://thememeldexstatic.altervista.org/assets/bulbOff.gif";
    } else {
        image.src = "http://thememeldexstatic.altervista.org/assets/bulbOn.gif";
    }
};
function CSSrestyle() {
    var formatee = document.getElementById("formatSwitch");
	if (formatee.style.color.match("white")) {
		formatee.style.fontWeight = "bold";
		formatee.style.color = "yellow";
	} else {
		formatee.style.fontWeight = "normal";     
		formatee.style.color = "white";
	}
};
function validateNum() {
    var inputNum, result, resultText = document.getElementById("validateResult");

    // Get the value of the input field with id="validateNum"
    inputNum = document.getElementById("inputNum").value;
	
    // If x is Not a Number or less than one or greater than 10
    if (isNaN(inputNum) || inputNum < 1 || inputNum > 10) {
        result = "Input invalid.";
		resultText.style.color = "red"
    } else {
        result = "Input valid.";
		resultText.style.color = "white"
    }
    resultText.innerHTML = result;
};
function windowAlertTest() {
	var inputNum = document.getElementById("inputNumAlert").value;
	
	window.alert("You input: " + inputNum);
	console.log(inputNum + " was input and submitted.")
};
function strictJavaScriptTest() {
	"use strict"
	
	var output = document.getElementById("StrictJSoutput");
	
	try {
		x = " not"
		output.innerHTML = "Strict JavaScript is" + x + " working."
		output.style.color = "red"
	}
	catch (errorMessage) {
		output.innerHTML = errorMessage
	}
};
function fixHeaderTopOnLoad() {
	if (sessionStorage.stickyHeaderActivate == 1) {
		stickyHeaderToggle();
	};
}
function fixHeaderTopButton() {
	if (sessionStorage.stickyHeaderActivate == 1) {
		stickyHeaderToggle();
		sessionStorage.stickyHeaderActivate = 0;
	} else {
		sessionStorage.stickyHeaderActivate = 1;
		stickyHeaderToggle();
	};
}
function stickyHeaderToggle() {
	$("#header").toggleClass("fixHeaderTop");
	$("#navigation").toggleClass("fixHeaderTopElse");
	$("#contentWrapper").toggleClass("fixHeaderTopElse");
	$("#footer").toggleClass("fixHeaderTopElse");
	$("#header a.pinHeader").toggleClass("javaButtonActive");
}
function hideNotificationsBox() { 
	var xhttp, date = new Date(), hideBoxLocal = Math.round(date.getTime()/1000);
    
    console.info(hideBoxLocal);
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            $('#notificationsBox').hide();
            console.log("updated " + new Date().getMilliseconds());
        }
    };
    xhttp.open("GET", "../subcomponents/notifications.php?hideBoxLocal=" + hideBoxLocal, true);
    xhttp.send();
    
    console.log("Completed " + new Date().getMilliseconds());
};
function loginFormSubmit () {
	var frmUsername = $("#loginForm input[name='username']").val(),
		frmPassword = $("#loginForm input[name='password']").val(),
		errorMessage = $("div.errorMessages");
		
	errorMessage.hide();
	
	if (frmUsername == "") {
		$("#loginForm #usernameErr").show();
		errorMessage.html("<span></span>Please fill in all required fields");
		errorMessage.css("display","inline-block")
	} else {
		$("#loginForm #usernameErr").hide();
	};
	if (frmPassword == "") {
		$("#loginForm #passwordErr").show();
		errorMessage.html("<span></span>Please fill in all required fields");
		errorMessage.css("display","inline-block")
	} else {
		$("#loginForm #passwordErr").hide();
	};
	
	if (frmUsername != "" && frmPassword != "") {
		$("#loginForm").submit()
	}
};
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
};
function miscJSformSubmit(submittingForm) {
    $(submittingForm).submit()
}

//JS Throttle from [Underscore.js]
function throttle(func, wait, options) {
    var context, args, result;
    var timeout = null;
    var previous = 0;
    if (!options) options = {};
    var later = function() {
      previous = options.leading === false ? 0 : new Date().getTime();
      timeout = null;
      result = func.apply(context, args);
      if (!timeout) context = args = null;
    };
    return function() {
      var now = new Date().getTime();
      if (!previous && options.leading === false) previous = now;
      var remaining = wait - (now - previous);
      context = this;
      args = arguments;
      if (remaining <= 0 || remaining > wait) {
        if (timeout) {
          clearTimeout(timeout);
          timeout = null;
        }
        previous = now;
        result = func.apply(context, args);
        if (!timeout) context = args = null;
      } else if (!timeout && options.trailing !== false) {
        timeout = setTimeout(later, remaining);
      }
      return result;
    };
  };