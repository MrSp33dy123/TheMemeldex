<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Settings"; include("subcomponents/head.php"); ?> <!-- Head -->
	</head>
	<body>
		<div id="wrapper">
			<?php include("subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "settings"; include("subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div class="settingsPanel contentBox">
						<div class="contentBoxHeader">
							<h1>Local Settings<h1>
						</div>
						<div class="main">
							<p>
								Why hello there. Please take this very shoddily-constructed 'Settings' page, as I have not had enough time/am too lazy to create a database system to manage individual account and local settings.
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php include("subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
