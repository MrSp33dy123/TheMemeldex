<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Media Testing"; include("../subcomponents/head.php"); ?> <!-- Head -->
	</head>
	<body>
		<div id="wrapper">
			<?php include("../subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "testing"; include("../subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div id="testingBox" class="contentBox">
						<div class="contentBoxHeader">
							<h1>Media Testing</h1>
						</div>
						<div class="main">
							<p>The Space Kat Song</p>
							<audio controls>
								<source src="http://thememeldexstatic.altervista.org/assets/spacekatsong.mp3" type="audio/mpeg">
								Your browser does not support this audio element
							</audio>
							<br>
							<br>
							<p>Interstellar Soundtrack - Tick Tock</p>
							<audio controls>
								<source src="http://thememeldexstatic.altervista.org/assets/InterstellarTickTock.mp3" type="audio/mpeg">
								Your browser does not support this audio element
							</audio>
							<br>
							<br>
							<p>Origin M50 Soundtrack</p>
							<audio controls>
								<source src="http://thememeldexstatic.altervista.org/assets/OriginM50Sountrack.mp3" type="audio/mpeg">
								Your browser does not support this audio element
							</audio>
							<br>
							<br>
							<p>El Mudo - Chacarron Macarron</p>
							<audio controls>
								<source src="http://a.tumblr.com/tumblr_ltor51nWIM1qa99f3o1.mp3" type="audio/mpeg">
								Your browser does not support this audio element
							</audio>
						</div>
					</div>
				</div>
			</div>
			<?php include("../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>