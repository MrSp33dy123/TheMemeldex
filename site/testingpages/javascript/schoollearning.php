<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Home"; include("../../subcomponents/head.php"); ?> <!-- Head -->
		<script src="javascript/schoolscripts.js" type="text/javascript" defer="false"></script>
	</head>
	<body>
		<div id="wrapper">
			<?php include("../../subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "index"; include("../../subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div id="pageBackground">
						<noscript>
							<?php include_once("../../subcomponents/javascripterror.php"); ?>
						</noscript>
						<?php include("../../subcomponents/notifications.php"); ?>
						<div id="testingBox" class="contentBox">
							<div class="main">
								<p>Press the button to get some input/output popups.</p>
								<button onclick="IOlearning()">I/O Testing</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("../../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
