<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "LHS Timetable Survey"; include("../subcomponents/head.php"); ?> <!-- Head -->
	</head>
	<body>
		<div id="wrapper">
			<?php include("../subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "admin"; include("../subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div id="pageBackground">
						<noscript>
							<?php include_once("../subcomponents/javascripterror.php"); ?>
						</noscript>
						<?php include("../subcomponents/notifications.php"); ?>
						<div id="surveyBox" class="centerSingular contentBox">
							<?php 
								if($_COOKIE[userID] == "ADMIN-BRIGHT-EYES") {
									include("../subcomponents/restrictedaccess/LHStimetablesurveyform.php");
								} else {
									$permissionLevel = "admin";
									include("../subcomponents/permissionsrequired.php");
								}
							?>
						</div>
					</div>	
				</div>
			</div>
			<?php include("../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
