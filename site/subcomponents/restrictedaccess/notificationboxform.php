<?php
$boxStats = file($_SERVER['DOCUMENT_ROOT']."/subcomponents/notifications.php") or die("Unable to open file!");

for ($loopCount = 4; ($loopCount >= 4) && ($loopCount <= 7); $loopCount++) {
    $beginString = stripos($boxStats[$loopCount], '=')+3;
    $endString = stripos($boxStats[$loopCount], '//END')-2;
    $stringLength = $endString - $beginString;
    
    $boxStats[$loopCount] = substr($boxStats[$loopCount], $beginString, $stringLength);
}
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $boxStats[5] = htmlspecialchars($_POST['message'], ENT_QUOTES);
    $boxStats[6] = htmlspecialchars($_POST['author'], ENT_QUOTES);
    $file = fopen($_SERVER['DOCUMENT_ROOT']."/subcomponents/notifications.php", "r+") or die("Unable to open file!");
    fwrite ($file,'<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$GLOBALS["notificationBoxUpdate"] = "'. time() .'";//END
$notificationMessage = "'. $boxStats[5] .'";//END //Currently, you cannot use semicolons on string because of the file reading function.
$notificationAuthor = "'. $boxStats[6] .'";//END

//----------------------------------------------------------------------------------------------------------------------------
if ($_REQUEST["hideBoxLocal"] != "") {
    $_SESSION["notificationBoxHidden"] = $_REQUEST["hideBoxLocal"];
}

if ($GLOBALS["notificationBoxUpdate"] > $_SESSION["notificationBoxHidden"]) {
    echo(\'
    <div id="notificationsBox" class="contentBox" onclick="hideNotificationsBox()">
        <div class="emblem fa-exclamation-circle"></div><div class="emblemCover fa-circle"></div>
        <p class="text">' . $boxStats[5] . '<b><i> -'. $boxStats[6] . '</i></b></p>
        <div class="coverOverlay"></div>
        <p class="hideText">Hide</p>
    </div>
    \');
};
?>
    ');
    fclose($file);
    //header("Refresh:0");
};

?>

<div class="contentBoxHeader">
	<h1>Notification Panel Settings<h1>
</div>
<div class="main centerAlign">
    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?>" id="updateNotifications">
        <p>
            Customise the notification panel that appears at the start of every page. When you hit 'update', the notification panel will automaically display on all users' screens.<br><br>
        </p>
        <textarea id="backgroundMESSAGE" rows="9" cols="50" name="message" style="width:760px;"><?php echo $boxStats[5] ?></textarea>
        <br>
        <textarea id="backgroundAUTHOR" rows="1" cols="15" name="author"><?php echo $boxStats[6] ?></textarea>
        <br><br>
        <a class="button fa-refresh" onclick="miscJSformSubmit('#updateNotifications')">Update</a> <span>Last updated <?php echo date("j/n/Y h:s A", $boxStats[4]); ?></span>
    </form>
</div>