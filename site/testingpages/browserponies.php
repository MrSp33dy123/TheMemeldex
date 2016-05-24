<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Browser Ponies"; include("../subcomponents/head.php"); ?> <!-- Head -->
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
					<div id="passwordBox" class="centerSingular contentBox">
						<div class="contentBoxHeader">
							<h1>Entry Restricted<h1>
						</div>
						<div class="main">
							<p>
								A password is required to access this page.
								<br>
								<br>
								<form method="post" action id="passwordForm">
									<b>Password:</b>
									<input id="passwordBox" type="password">
									<span class="errorMessage"></span>
									<br>
									<br>
									<a onclick="restrictedPageSubmit()"  class="circleButtonLeft">
										<div class="buttonImage">
											<div class="shutter"></div>
											<div class= "icon"></div>
										</div>
										<span>Submit</span>
									</a>
								</form>
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php include("../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
