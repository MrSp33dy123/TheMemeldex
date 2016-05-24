<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "JavaScript Testing"; $directoryBacktrack = "../../"; include("../../subcomponents/head.php"); ?> <!-- Head -->
	</head>
	<body>
		<div id="wrapper">
			<?php include("../../subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "testing"; include("../../subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div id="testingBox" class="contentBox">
						<div class="contentBoxHeader">
							<h1>JavaScript Testing Page<h1>
						</div>
						<div class="main">
							<p>
								Click the bulb to turn it on and off.<br>
								<img id="bulbToggle" onclick="changeBulbImage()" alt="Light Bulb" src="http://thememeldexstatic.altervista.org/assets/bulbOff.gif" width="100" height="180">
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
			<?php include("../../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
