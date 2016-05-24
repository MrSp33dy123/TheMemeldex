<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Error 404"; include("subcomponents/head.php"); ?> <!-- Head -->
		<meta name="robots" content="noindex">
	</head>
	<body>
		<div id="wrapper">
			<?php include("subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "404error"; include("subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div class="notification404 contentBox">
						<div class="contentBoxHeader">
							<h1>Error 404<h1>
						</div>
						<div class="main">
							<img src="http://thememeldexstatic.altervista.org/assets/AreYouSeriousFace.png" alt="Are you serious?">
							<p>The URL you requested could not be found. This is most likely caused by a webpage being removed or relocated, or by a mistyped URL.</p>
							<p>If you believe this is an error, please contact the website designer at <u>mrbondusa5@gmail.com</u>.</p>
							<br>
							<br>
							<a href="index.php" onclick="history.go(-1);return false;">Return</a>
						</div>
					</div>
				</div>
			</div>
			<?php include("subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>






	
