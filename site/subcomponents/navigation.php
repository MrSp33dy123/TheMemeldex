<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start(); ?>
<nav id="navigation">
	<ul class="mainMenu">
        <li id="newsButton" <?php if( $activePage == "news") echo 'class="active"' ?>><a href="<?php echo $_SERVER['PHP_SELF']?>#news">News</a></li>
		<li <?php if( $activePage == "account") echo 'class="active"' ?>><a href="<?php echo $_SERVER['PHP_SELF']?>#accountPage">Account</a></li>
		<?php// if ($_SESSION["loggedIn"] == true) { echo ($_SESSION['userInfo']['username']); } else { echo("#Account Name"); } ?>
		<li <?php if( $activePage == "settings") echo 'class="active"' ?>><a href="settings">Settings</a></li>
		<li style="color:RGB(255,250,205);" <?php if( $activePage == "admin") echo 'class="active"'; if($_COOKIE[userID] != "ADMIN-BRIGHT-EYES") echo 'style="display:none;"';?>>
			<a href="<?php echo $_SERVER['PHP_SELF']?>#admin">Admin <span class="arrow-down">&#9660;</span></a>
			<ul class="dropDown navMenu">
				<li><a href="admin/notificationboxsettings">Notification Panel</a></li>
				<li><a href="admin/LHStimetablesurvey">Timetable Survey</a></li>
			</ul>
		</li>
		<li <?php if( $activePage == "testing") echo 'class= "active"' ?>>
			<a href="websitetesting">Testing <span class="arrow-down">&#9660;</span></a>
			<ul class="dropDown navMenu">
				<li>
					<a href="#">JavaScript <span class="arrow-right">&#9654;</span></a>
					<ul class="subMenu right navMenu">
						<li><a href="testingpages/javascript/misc">Misc</a></li>
						<li><a href="testingpages/javascript/schoollearning">School</a></li>
						<li><a href="testingpages/javascript/madlib">Mad Lib</a></li>
						<li><a href="testingpages/javascript/paperscissorsrock">Paper Scissors Rock</a></li>
					</ul>
				</li>
                <li>
					<a href="#">Phaser <span class="arrow-right">&#9654;</span></a>
					<ul class="subMenu right navMenu">
						<li><a href="testingpages/phaser/1">Platform Example</a></li>
                        <li><a href="testingpages/phaser/googlemapsapi">Google Maps API</a></li>
                        <li><a href="testingpages/phaser/roadsafetygame">Road Safety Game</a></li>
					</ul>
				</li>
				<li><a href="testingpages/mediatesting">Media</a></li>
				<li><a href="testingpages/buttontesting">Buttons</a></li>
				<li><a href="testingpages/browserponies" class="disabled">Browser Ponies</a></li>
				<li><a href="testingpages/blurbackgroundtesting">Blurring</a></li>
				<li><a href="testingpages/spinmeround">'The Glitch'</a></li>
                <li><a href="testingpages/hellhole" style="color:red; font-weight:bold;">HELL(V2)</a></li>
			</ul>
		</li>
		<div class="background"></div>
	</ul>
</nav>
