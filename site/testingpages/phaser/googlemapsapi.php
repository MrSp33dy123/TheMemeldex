<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Google Maps API"; include("../subcomponents/head.php"); ?>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbHuW73UnSZzZH7kdXjN475RRnyu5TywA&callback=initMap" type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
            <div id="bodyWrapper">
                <?php include("../subcomponents/header.php"); ?>
                <?php $activePage = "testingpages"; include("../subcomponents/navigation.php"); ?>
                <div id="contentWrapper">
                    <div id="content">
                        <?php include("../subcomponents/notifications.php"); ?>
                        <div id="" class="">
                            
                        </div>
                    </div>
                </div>
            </div>
			<?php include("../subcomponents/footer.php"); ?>
		</div>
	</body>
</html>