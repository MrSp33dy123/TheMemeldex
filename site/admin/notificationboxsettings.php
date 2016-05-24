<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Notification Box Settings"; include("../subcomponents/head.php"); ?>
	</head>
	<body>
		<div id="wrapper">
			<div id="bodyWrapper">
                <?php include("../subcomponents/header.php"); ?>
                <?php $activePage = "admin"; include("../subcomponents/navigation.php"); ?>
				<div id="contentWrapper">
					<div id="content">
						<?php include("../subcomponents/notifications.php"); ?>
						<div id="notifictationBoxAdminSettings" class="centerSingular contentBox">
							<?php 
								if($_COOKIE[userID] == "ADMIN-BRIGHT-EYES") {
									include("../subcomponents/restrictedaccess/notificationboxform.php");
								} else {
									$permissionLevel = "admin";
									include("../subcomponents/permissionsrequired.php");
								}
							?>
						</div>
					</div>	
				</div>
			</div>
			<?php include("../subcomponents/footer.php"); ?>
		</div>
	</body>
</html>
