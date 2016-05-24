<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "JavaScript Testing"; $directoryBacktrack = "../"; include("../subcomponents/head.php"); ?> <!-- Head -->
		<style>
			div {
				margin: 20px;
				width: 100px;
				height: 100px;
				background: #f00;
				-webkit-animation-name: spin;
				-webkit-animation-duration: 1000ms;
				-webkit-animation-iteration-count: infinite;
				-webkit-animation-timing-function: linear;
				-moz-animation-name: spin;
				-moz-animation-duration: 1000ms;
				-moz-animation-iteration-count: infinite;
				-moz-animation-timing-function: linear;
				-ms-animation-name: spin;
				-ms-animation-duration: 1000ms;
				-ms-animation-iteration-count: infinite;
				-ms-animation-timing-function: linear;
				
				animation-name: spin;
				animation-duration: 1000ms;
				animation-iteration-count: infinite;
				animation-timing-function: linear;
			}
			@-ms-keyframes spin {
				from { -ms-transform: rotate(0deg); }
				to { -ms-transform: rotate(360deg); }
			}
			@-moz-keyframes spin {
				from { -moz-transform: rotate(0deg); }
				to { -moz-transform: rotate(360deg); }
			}
			@-webkit-keyframes spin {
				from { -webkit-transform: rotate(0deg); }
				to { -webkit-transform: rotate(360deg); }
			}
			@keyframes spin {
				from {
					transform:rotate(0deg);
				}
				to {
					transform:rotate(360deg);
				}
			}
			html, body {
				background-image: url("http://thememeldexstatic.altervista.org/assets/ReallyFace.jpg")
			}
		</style>
	</head>
	<body>
		<audio autoplay="true" loop="true" height="2px" width="2px">
			<source src="http://a.tumblr.com/tumblr_ltor51nWIM1qa99f3o1.mp3" type="audio/mpeg">
			Your browser does not support this audio element
		</audio>
		<div id="wrapper">
			<?php include("../subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "testing"; include("../subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div id="testingBox">
						<div class="contentBoxHeader">
							<h1>JavaScript Testing Page<h1>
						</div>
						<div class="main">
							<p>
								Click the bulb to turn it on and off.<br>
								<img id="bulbToggle" onclick="changeBulbImage()" alt="Light Bulb" src="../assets/bulbOff.gif" width="100" height="180">
							</p>
						</div>
						<div class="main">
							<p id="formatSwitch" style="color:white;">
								Click the button to change the formatting of this text.<br>
								<button type="button" onclick="CSSrestyle()">Change Formatting!</button>
							</p>
						</div>
						<div class="main">
							<p>
								Input a number to check if it is between 1 and 10.<br>
								<input id="inputNum" type="number">
								<button type="button" onclick="validateNum()">Submit</button>
							</p>
							<p id="validateResult"></p>
						</div>
						<div class="main">
							<p> 
								Input a number, and then click the button for the browser to display it in a notification window.<br>
								<input id="inputNumAlert" type="number">
								<button type="button" onclick="windowAlertTest()">Submit</button>
							</p>
						</div>
						<div class="main">
							<p> 
								Clicking this button should throw an error, as this function uses Strict JavaScript.<br>
								<button type="button" onclick="strictJavaScriptTest()">Check Strict JavaScript!</button>
							</p>
							<p id="StrictJSoutput"></p>
						</div>
					</div>
				</div>
			</div>
			<?php include("../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
