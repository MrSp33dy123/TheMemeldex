<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Button Prototypes"; include("../subcomponents/head.php"); ?> <!-- Head -->
	</head>
	<body>
		<div id="wrapper">
			<?php include("../subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "testing"; include("../subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<noscript>
						<?php include_once("../subcomponents/javascripterror.php"); ?>
					</noscript>
					<div class="passwordEntry contentBox centerSingular">
						<div class="contentBoxHeader">
							<h1>Button/Hyperlink Prototypes</h1>
						</div>
						<div class="main">
                        
                            <br<br><br>
							<p>'button': <i>Default Button</i><span style="color:yellow; padding-left:15px;">Well this is boring, isn't it?</span></p>
							<br>
							<button type="button">Submit</button>
							<br>
							<br>
							<p>'circleButtonLeft': <i>Animated Spin Button- Left</i><span style="color:yellow; padding-left:15px;">Note: I am aware that this button does not work correctly in IE 9 (or any browser other than Chrome, to be frank).</span></p>
							<br>
							<a onclick="" class="circleButtonLeft">
								<div class="buttonImage">
									<div class="shutter"></div>
									<div class= "icon"></div>
								</div>
								<span>Submit</span>
							</a>
							<br>
							<br>
							<p>'hyperlink-square-backgroundIconFlash': <i>Square Button with Background Icon</i><span style="color:yellow; padding-left:15px;">Sacrificing 'coolness' for practicality!</span></p>
							<br>
							<a class="button fa-trash">Delete</a>
                            <br>
                            <input type="submit" class="button fa-trash">
							<br>
							<br>
							<p>'hyperlink-square-iconSwitch': <i>Square Button Version 2</i><span style="color:yellow; padding-left:15px;">Hopefully striking a nice balance.</span></p>
							<br>
							<a class="hyperlink-square-iconSwitch">
								<p class="textBackground fa fa-binoculars"></p><p class="text">Follow</p>
							</a>
							<br>
							<br>
							<p>'switch-circular-labelled': <i>Circular Labelled Switch Version 1</i><span style="color:yellow; padding-left:15px;">First version of a functional, labeled switch.</span></p>
							<br>
							<div class="onOffSwitch">
								<input type="checkbox" name="onOffSwitch" class="onOffSwitch-checkbox" id="rememberPasswordSwitch">
								<label class="onOffSwitch-label" for="rememberPasswordSwitch">
									<div class="onOffSwitch-icon"></div>
									<div class="onOffSwitch-shutter"></div>
									<div class="onOffSwitch-text">Remember Password</div>
								</label>
							</div>
							<br>
							<br>
							<p>'-----------------': <i>Circular Labelled Switch Version 2</i><span style="color:yellow; padding-left:15px;">Second checkbox/switch, based of a design stolen from the internet.</span></p>
							<br>
							<div class="onoffswitch">
								<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
								<label class="onoffswitch-label" for="myonoffswitch">
									<span class="onoffswitch-inner"></span>
									<span class="onoffswitch-switch"></span>
								</label>
							</div>
                            <br>
                            <br>
                            <br>
                            

                            
						</div>
					</div>
				</div>
			</div>
			<?php include("../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
