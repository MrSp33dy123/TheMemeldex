<?php session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $userSelection = $_GET['userSelection'];
    $serverSelection = rand(1,3);
    
    $choices = ['scissors','rock','paper'];
    $map = [];
        
    foreach ($choices as $indexValue => $choiceValue) {
        $map[$choiceValue] = [];
        for ($compareCount = 0, $halfLength = (count($choices)-1)/2; $compareCount < count($choices); $compareCount++) {
            $difference = ($indexValue + $compareCount) % count($choices);
            if ($compareCount == 0) {
                $map[$choiceValue][$choiceValue] = "It's a tie.";
            } else if ($compareCount <= $halfLength) { 
                $map[$choiceValue][$choices[$difference]] = $choices[$difference] . " wins."; //AI WINS
            } else {
                $map[$choiceValue][$choices[$difference]] = $choiceValue . " wins."; //PLAYER WINS
            }
        }
    }
    
    switch ($serverSelection) {
    case 1:
        $serverSelection = "paper";
        break;
    case 2:
        $serverSelection = "scissors";
        break;
    case 3:
        $serverSelection = "rock";
        break;
    default:
        $serverSelection = "ERROR";
    }
    
    function compare($choice1, $choice2, $map) {
        return $map[$choice1][$choice2];
    }

    echo compare("rock", $serverSelection, $map);
    
};











?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Home"; include("../../subcomponents/head.php"); ?> <!-- Head -->
		<script src="javascript/PSRscript.js" type="text/javascript" defer="true"></script>
	</head>
	<body>
		<div id="wrapper">
			<?php include("../../subcomponents/header.php"); ?> <!-- Header Bar -->
			<?php $activePage = "testing"; include("../../subcomponents/navigation.php"); ?> <!-- Navigation Bar -->
			<div id="bodyWrapper">
				<div id="content">
					<div id="pageBackground">
						<noscript>
							<?php include_once("../../subcomponents/javascripterror.php"); ?>
						</noscript>
						<?php include("../../subcomponents/notifications.php"); ?>
						<div id="testingPages" class="contentBox centerSingular">
							<div class="contentBoxHeader">
								<h1>Paper Scissors Rock</h1>
							</div>
							<div class="main">
								<p><b>Familliar with the game <i>Paper Scissors Rock</i>? If not, then <a href="http://lmgtfy.com/?q=Paper+Scissors+Rock">here's a link to educate yourself.</a><br></b></p>
								<p>Paper Scissors Rock (or commonly referred to as 'Rock-Paper-Scissors by the filthy Americans) is a game of luck. That doesn't nescacarily mean there's no strategy to it, though. 
								This JavaScript program not only works off of the art of luck, but also attempts to discern patters and make educated predictions. And that is to say; it <i>learns</i>.<br><br>
								But perhaps that gives too much away...</p><br><br>
								<div class="sectionHeader"><div class="leftLine"></div><p>Paper Scissors Rock</p><div class="horizontalDivider"></div></div>
								<div id="paperScissorsRockGame">
								    <div id="PSRgame" class="dualColumn dualColumnFlex">
                                        <div class="rightBox">
                                            <h1>Server</h1>
                                        </div>
                                        <div class="leftBox">
                                            <h1>Player</h1>
                                            <a id="paper" class="button PSRselect fa-hand-paper-o" onclick="submitChoice('paper')">Paper</a>
                                            <a id="scissors" class="button PSRselect fa-hand-scissors-o" onclick="submitChoice('scissors')">Scissors</a>
                                            <a id="rock" class="button PSRselect fa-hand-rock-o" onclick="submitChoice('rock')">Rock</a>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("../../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>
