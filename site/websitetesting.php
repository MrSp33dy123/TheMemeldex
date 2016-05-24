<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Testing"; include("subcomponents/head.php"); ?> <!-- Head -->
	</head>
	<body>
		<div id="wrapper">
			<?php include("subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "testing"; include("subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div class="selection">
						<div class="contentBoxHeader">
							<h1>Webpage Testing<h1>
						</div>
						<div class="main">
						This page is currently under construction.
						</div>
					</div>
				</div>
			</div>
			<?php include("subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
