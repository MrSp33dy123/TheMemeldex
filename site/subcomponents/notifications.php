<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$GLOBALS["notificationBoxUpdate"] = "1460989712";//END
$notificationMessage = "Sometimes when developing this website, I spend a whole lot of time and effort making something that ultimately is inefficient and ends up being replaced. This is another one of those times. The site now has a dialogue box for uploading and cropping a profile image-- but let&#039;s be real here, it&#039;s just impractical. On Chrome, it (weirdly) blurs the entire upload avatar form. On Firefox it lowers the tab frame rate to about 0.5. On Edge? Well, the styling is off. When the time comes I&#039;ll come back to it and replace it with something far more simplistic and effective, but for now, it will have to do. Next up is getting the Google Capatcha to work, which, all things considered, won&#039;t be too difficult. As for the version name of this update? Endurance. Why? Because this update is an in-between. We&#039;re getting there, as slow as we may be. We&#039;re &#039;enduring&#039;, as it were. There is more to the name than that, but, some things are best left to the mind, not released into the tangle of communication we call speech. Some things will prosper through contemplation and consideration, flower through secrecy and intimacy. And, you cannot be any more intimate with anyone but yourself. This update, this name? They are the mark today-- of philosophy.";//END //Currently, you cannot use semicolons on string because of the file reading function.
$notificationAuthor = "Sp33dy";//END

//----------------------------------------------------------------------------------------------------------------------------
if ($_REQUEST["hideBoxLocal"] != "") {
    $_SESSION["notificationBoxHidden"] = $_REQUEST["hideBoxLocal"];
}

if ($GLOBALS["notificationBoxUpdate"] > $_SESSION["notificationBoxHidden"]) {
    echo('
    <div id="notificationsBox" class="contentBox" onclick="hideNotificationsBox()">
        <div class="emblem fa-exclamation-circle"></div><div class="emblemCover fa-circle"></div>
        <p class="text">Sometimes when developing this website, I spend a whole lot of time and effort making something that ultimately is inefficient and ends up being replaced. This is another one of those times. The site now has a dialogue box for uploading and cropping a profile image-- but let&#039;s be real here, it&#039;s just impractical. On Chrome, it (weirdly) blurs the entire upload avatar form. On Firefox it lowers the tab frame rate to about 0.5. On Edge? Well, the styling is off. When the time comes I&#039;ll come back to it and replace it with something far more simplistic and effective, but for now, it will have to do. Next up is getting the Google Capatcha to work, which, all things considered, won&#039;t be too difficult. As for the version name of this update? Endurance. Why? Because this update is an in-between. We&#039;re getting there, as slow as we may be. We&#039;re &#039;enduring&#039;, as it were. There is more to the name than that, but, some things are best left to the mind, not released into the tangle of communication we call speech. Some things will prosper through contemplation and consideration, flower through secrecy and intimacy. And, you cannot be any more intimate with anyone but yourself. This update, this name? They are the mark today-- of philosophy.<b><i> -Sp33dy</i></b></p>
        <div class="coverOverlay"></div>
        <p class="hideText">Hide</p>
    </div>
    ');
};
?>
