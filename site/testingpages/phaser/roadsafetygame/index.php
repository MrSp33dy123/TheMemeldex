<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php $serverBaseURL = "http://" . $_SERVER['SERVER_NAME']; ?>
        <base href="<?php echo $serverBaseURL ?>">
        <meta name="description" content="">
        <meta name="author" content="Ollie Roozen">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JAYWALKER</title>
        <meta property="og:site_name" content="JAYWALKER">
        <meta property="og:description" content="">
        <meta property="og:title" content="The MEMELDEX - <?php echo $pageTitle ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo $serverBaseURL ?>">
        <meta property="og:image" content="">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300">
        <link rel="stylesheet" type="text/css" href="testingpages/phaser/roadsafetygame/mainstyle.css">
        <link rel="stylesheet" type="text/css" href="libraries/font-awesome-4.5.0/css/font-awesome.min.css">
        <script src="libraries/jquery-2.2.3.min.js" type="text/javascript" defer="false"></script>
        <script src="testingpages/phaser/roadsafetygame/libraries/typed.min.js" type="text/javascript" defer="true"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvvmPGE775sxXoxt-VtAEQasBEYHkQ-LU" type="text/javascript"></script>
        <script src="javascript/mainscript.js" type="text/javascript" defer="false"></script>
        <script src="testingpages/phaser/roadsafetygame/menu.js" type="text/javascript" defer="true"></script>
        <script src="testingpages/phaser/roadsafetygame/game.js" type="text/javascript" defer="true"></script>       
	</head>
	<body>
		<div id="wrapper">
            <div id="bodyWrapper">
                <video loop muted autoplay id="bgVideo" style="display:none;">
                    <source src="testingpages/phaser/roadsafetygame/media/bgVid1-3.mp4" type="video/mp4">
                    <!--<source src="" type="video/webm">-->
                    <!--<source src="" type="video/ogg">-->
                </video>
                <audio id="bgLake" loop>
                    <source src="testingpages/phaser/roadsafetygame/media/lakeambience1-loop.mp3" type="audio/mpeg">
                </audio>
                <audio id="bgCity" loop>
                    <source src="testingpages/phaser/roadsafetygame/media/cityhum1-loop.mp3" type="audio/mpeg">
                </audio>
                <audio id="glitch_sfx">
                    <source src="testingpages/phaser/roadsafetygame/media/glitcheffect.mp3" type="audio/mpeg">
                </audio>
                <div id="contentWrapper">
                    <nav id="navigation">
                        <a href="">thememeldex</a>
                        <a>help</a>
                        <a>login</a>
                        <a>register</a>
                    </nav>
                    <div id="content">
                        <div id="loadingText" class="centered"><p></p><br><p></p></div>
                        <div id="accountOverlay">
                            <div class="formWrapper centered">
                                <form>
                                    <p>How will your friends know you?</p><br>
                                    <input name="username" spellcheck="false" autocomplete="off" type="text"><br>
                                    <p>&#60;ENTER&#62;</p>
                                </form>
                            </div>
                        </div>
                        <a id="title" class="centered" style="display:none;">
                            <div class="main" style="display:none;"><span>J</span><span>A</span><span>Y</span><span>W</span><span>A</span><span>L</span><span>K</span><span>E</span><span>R</span></div><br>
                            <div class="sub error" style="display:none;">A Road Safety Game</div>
                        </a>
                        <div id="muteButton" class="fa fa-volume-up" aria-hidden="true"></div>
                        <div id="map" style="height:100vh; width:100vw;"></div>
                        <div id="gameOverlay">
                            <a id="nextLoc">Next Location</a>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</body>
</html>
