"use strict";

var 













function submitChoice(userChoice) { 
	var xhttp = new XMLHttpRequest();
    
    console.info("Function started: " + new Date().getMilliseconds());
    
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            $('#notificationsBox').hide();
            console.log("updated " + new Date().getMilliseconds());
        }
    };
    xhttp.open("GET", "../subcomponents/notifications.php?hideBoxLocal=" + hideBoxLocal, true);
    xhttp.send();
    
    console.log("Completed: " + new Date().getMilliseconds());
};














































//---------------------MAIN BASE CODE----------------------------
/*
"use strict";

var choices = ["scissors", "rock", "paper"], //Order in terms of OTHER CHOICE < CHOICE < OTHER CHOICE
    map = {},
    userMove = "", 
    AImove = 0;

choices.forEach(function(choiceValue, indexValue) {
    map[choiceValue] = {};
    for (var compareCount = 0, halfLength = (choices.length-1)/2; compareCount < choices.length; compareCount++) {
        var difference = (indexValue + compareCount) % choices.length
        if (!compareCount)
            map[choiceValue][choiceValue] = "It's a tie."
        else if (compareCount <= halfLength)
            map[choiceValue][choices[difference]] = choices[difference] + " wins." //AI WINS
        else
            map[choiceValue][choices[difference]] = choiceValue + " wins." //PLAYER WINS
    
        console.log("indexValue = " + indexValue + "  compareCount = " + compareCount + "  opposition = " + difference + "  compareCount = " + !compareCount);
        
    }
})

for (var loopCount = 1; loopCount <= choices.length; loopCount++) {
    console.log(map[loopCount])
}


function compare(choice1, choice2) {
    return (map[choice1] || {})[choice2] || "Invalid choice.";
}

userMove = prompt("Paper, scissors, or rock?")
AImove = Math.random();

AImove = AImove * 3;
AImove = Math.floor(AImove) + 1;

switch (AImove) {
    case 1:
        AImove = "paper";
        break;
    case 2:
        AImove = "scissors";
        break;
    case 3:
        AImove = "rock";
        break;
    default:
        alert("ERROR");
}

alert(
    "You input " + userMove + ". \n" +
    "The computer chose " + AImove + ". \n\n" +
    compare(userMove, AImove)
)

//---------------------MAIN BASE CODE----------------------------




/*var canvas = document.getElementById("PSRgameCanvas"),
	ctx = canvas.getContext("2d"),
	PLname = "MrSp33dy123",
	PLcolour = "blue",
    images = ['http://thememeldexstatic.altervista.org/assets/shutter-lens-2.svg'],
    loadedImages = {};

var promiseArray = images.map(function(imgurl){
   var prom = new Promise(function(resolve,reject){
       var img = new Image();
       img.onload = function(){
           loadedImages[imgurl] = img;
           resolve();
       };
       img.src = imgurl;
   });
   return prom;
});

function drawPlayer(radius, posX, posY, PLname, PLcolour, shutterImgRotate) {
	var grad;
    //Create background gradient
	grad = ctx.createRadialGradient(posX, posY,0, posX, posY,radius);
	grad.addColorStop(0.2, 'rgb(25,25,25)');
	grad.addColorStop(1, 'rgb(0,255,179)');
    //Create background circle
	ctx.beginPath();
	ctx.arc(posX, posY, radius, 0, 2*Math.PI);
	ctx.fillStyle = grad;
	ctx.fill();
    //Create border gradient
	grad = ctx.createRadialGradient(posX, posY,radius*0.95, posX, posY,radius*1.05);
	grad.addColorStop(0, 'rgb(25,25,25)');
	grad.addColorStop(0.5, 'rgb(0,204,204)');
	grad.addColorStop(1, 'rgb(25,25,25)');
	ctx.strokeStyle = grad;
	ctx.lineWidth = radius*0.1;
	ctx.stroke();
    //Draw dividing lines
    drawDividingLine(posX, posY, (360/12)*1, (360/12)*3, radius)
    drawDividingLine(posX, posY, (360/12)*5, (360/12)*7, radius)
    drawDividingLine(posX, posY, (360/12)*9, (360/12)*11, radius)
    drawDividingLineStraight(posX, posY, (360/12)*2, radius)
    drawDividingLineStraight(posX, posY, (360/12)*6, radius)
    drawDividingLineStraight(posX, posY, (360/12)*10, radius)
    //Create inner circle
    ctx.beginPath();
	ctx.arc(posX, posY, radius*0.25, 0, 2*Math.PI);
	ctx.fillStyle = PLcolour;
	ctx.fill();
    //Place shutter SVG in circle
    ctx.translate(posX, posY);
    ctx.rotate(shutterImgRotate*Math.PI/180);
    ctx.drawImage(loadedImages['http://thememeldexstatic.altervista.org/assets/shutter-lens-2.svg'], -loadedImages['http://thememeldexstatic.altervista.org/assets/shutter-lens-2.svg'].width/2, -loadedImages['http://thememeldexstatic.altervista.org/assets/shutter-lens-2.svg'].height/2);
    ctx.rotate(-shutterImgRotate*Math.PI/180);
    ctx.translate(-posX, -posY);
    //Insert player name into circle
    ctx.font = "30px Helvetica";
    ctx.fillStyle = "white";
    ctx.textAlign = "center";
    ctx.fillText(PLname, posX, posY+15);
}

function degToRad(deg) {
    var rad;
    rad = deg * (Math.PI / 180);
    return rad;
}

function drawDividingLineStraight(posX, posY, degreesTo, radius) {
    ctx.moveTo(posX, posY);
    ctx.lineTo(posX + (radius*0.65) * Math.cos(degToRad(degreesTo)), posY + (radius*0.65) * Math.sin(degToRad(degreesTo)));
    ctx.stroke();
}

function drawDividingLine(posX, posY, degreesFrom, degreesTo, radius) {
    var bezierCurve1X = posX + (radius* 0.55) * Math.cos(degToRad((degreesTo + degreesFrom) / 2)),
        bezierCurve1Y = posY + (radius* 0.55) * Math.sin(degToRad((degreesTo + degreesFrom) / 2)),
        bezierCurve2X = posX + (radius* 0.55) * Math.cos(degToRad((degreesTo + degreesFrom) / 2)),
        bezierCurve2Y = posY + (radius* 0.55) * Math.sin(degToRad((degreesTo + degreesFrom) / 2)),
        lineToX = posX + radius * Math.cos(degToRad(degreesTo)),
        lineToY = posY + radius * Math.sin(degToRad(degreesTo));
    
    ctx.beginPath();
    ctx.moveTo(posX + radius * Math.cos(degToRad(degreesFrom)), posY + radius * Math.sin(degToRad(degreesFrom)));
    ctx.bezierCurveTo(bezierCurve1X, bezierCurve1Y, bezierCurve2X, bezierCurve2Y, lineToX, lineToY);
    ctx.stroke();
}


function drawFramescounter(posX, posY, frameCount, frameInterval) {
    var FPS = Math.round(1000 / frameInterval)
    
    ctx.font = "22px Helvetica";
    ctx.fillStyle = "white";
    ctx.textAlign = "left";
    ctx.fillText("FPS: " + FPS, posX, posY-32);
    ctx.fillText("FRAME: " + frameCount, posX, posY-8);
}

function playGame() {
    var shutterImgRotate = 0, frameCount = 0, date = new Date(), lastFrame, newFrame, 
    renderFPS = 30; //FPS that the canvas loads at
 
    setInterval(function updateScreen(){
        shutterImgRotate += 3
        frameCount++
        lastFrame = newFrame
        date = new Date()
        newFrame = date.getTime()
        
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawPlayer(220, canvas.width/4, canvas.height/2, PLname, PLcolour, shutterImgRotate)
        drawPlayer(220, (canvas.width/4)*3, canvas.height/2, "Server", "red", shutterImgRotate)
        drawFramescounter(5, canvas.height, frameCount, newFrame - lastFrame)
    }, 1000 / renderFPS);
}


function gameLoaded(){
    playGame()
}

Promise.all(promiseArray).then(gameLoaded);









	
/*
//Radial gradient
var radGrd = ctx.createRadialGradient((canvas.width / 2),(canvas.height / 2),0,(canvas.width / 2),(canvas.height / 2),(canvas.height / 1.25));
radGrd.addColorStop(0,"cyan");
radGrd.addColorStop(1,"rgba(0,0,0,0)");
ctx.fillStyle = radGrd;
ctx.fillRect(0,0,canvas.width,canvas.height);
	
//Line top left to bottom right
ctx.moveTo(0,0);
ctx.lineTo(canvas.width,canvas.height);
ctx.stroke();

//Line bottom left to top right
ctx.moveTo(0,canvas.height);
ctx.lineTo(canvas.width,0);
ctx.stroke();

//Circle in centre
ctx.beginPath();
ctx.arc((canvas.width / 2),(canvas.height / 2), 180,0,2*Math.PI);
ctx.stroke();

//Print text
ctx.font = "30px Arial";
ctx.fillStyle = "black";
ctx.textAlign = "center";
ctx.fillText("'Hello World'",(canvas.width / 2),100);





ctx.translate(canvas.width/2, canvas.height/2);
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, 180);
  drawNumbers(ctx, 180);
  drawTime(ctx, 180);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+(minute*Math.PI/(6*60))+(second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}

<canvas id="PSRgameCanvas" width="1280" height="720" style="border:1px dashed red; width:100%;">
    Your browser does not support the &lt;canvas&gt; element.
</canvas>




*/


//Debug
//console.log("Width: " + canvas.width + ", Height: " + canvas.height)