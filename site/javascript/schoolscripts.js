function IOlearning () {
	"use strict";

	var firstName = "";
	firstName = prompt("Hi, what is of your first name please thankyous.");
	alert("That is very nice name.");
	alert("Pleased to meat you " + firstName + " senpai.");
	
	document.write("Herro " + firstName);
}
function createMadLibSentence () {
	"use strict";
	
	var inADJ = $("#testingPages input[name='adjective']").val().toLowerCase(),
		inNOUN = $("#testingPages input[name='noun']").val().toLowerCase(),
		inVRB = $("#testingPages input[name='verb']").val().toLowerCase(),
		outP = $("#madLibResponse"),
		arraySENTENCES = [
			"The " + inADJ + " " + inNOUN + " " + inVRB + " over the lazy dog.",
			capitalizeFirstLetter(inNOUN) + " " + inVRB + " the " +  inADJ + " chair.",
			capitalizeFirstLetter(inNOUN) + " wondered when the " + inADJ + " house would " + inVRB + ".",
			"Nobody likes your " + inADJ + " " + inVRB + " that " + inNOUN + " gave you.",
			"The " + inVRB + " " + inADJ + " " + inVRB + " over the " + inVRB + " dog."
		],
		sentenceNumberRND = Math.random();
	
	if (inADJ == "" || inNOUN == "" || inVRB == "") {
		$("#testingPages div.errorMessages").css("display","inline-block");
		return;
	} else {
		$("#testingPages div.errorMessages").hide();
	};

	sentenceNumberRND = sentenceNumberRND * 5;
	sentenceNumberRND = Math.floor(sentenceNumberRND);

	outP.html(arraySENTENCES[sentenceNumberRND]);
}
