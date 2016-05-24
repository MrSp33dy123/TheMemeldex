<?php session_start();
error_reporting(E_ALL & ~E_NOTICE);

$username = $password = "";
$usernameErr = $passwordErr = $errorMessage = "";
$servername = "127.0.0.1";
$SQLusername = "root";
$SQLpassword = "";
$dbname = "userdetails";
$tablename = "accountinfo";

$SQLconn = new mysqli($servername, $SQLusername, $SQLpassword , $dbname); //Connect to database

function filterInput($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function loginSucsessful () {
	$_SESSION["loggedIn"] = true;
	$_SESSION["userInfo"] = $SQLrow;
	echo("USERNAME: ".$_SESSION["userInfo"]['password']);
	echo("TEST: ".$_SESSION["TESTuserinfo"]['username']);
	if ($_POST["rememberPassword"] == true) {
		
	} else {

	}
	//header("Location: ..");
	//die();
}

$username = filterInput($_POST["username"]);
$password = filterInput($_POST["password"]);

$SQLlookupUser = $SQLconn->query("SELECT * FROM ". $tablename . " WHERE username = '" . $username . "'");
if ($SQLlookupUser->num_rows > 0) {
	$SQLrow = $SQLlookupUser->fetch_assoc();
	if ($SQLrow['password'] == $password) {
		loginSucsessful();
	} else {
		$passwordErr = "style='display:initial;'";
		$errorMessage = "Password incorrect";
	}
} else {
	$usernameErr = "style='display:initial;'";
	$errorMessage = "Username not found";
}

?>

<form action="user/login" id="loginForm" method="post">
	<b>Username:</b>
	<input name="username" type="text" id="usernameBox" value="<?php echo $username ?>">
	<span id="usernameErr" class="errorIcon"<?php echo $usernameErr ?>></span><br>
	<br>
	<b>Password:</b>
	<input name="password" type="password" id="passwordBox" value="<?php echo $password ?>">
	<span id="passwordErr" class="errorIcon"<?php echo $passwordErr ?>></span><br>
    <a class="button fa-lock" onclick="loginFormSubmit()">Submit</a>
	<div class="onOffSwitch">
		<input type="checkbox" name="rememberPassword" class="onOffSwitch-checkbox" id="rememberPasswordSwitch" <?php if ($_POST["rememberPassword"] == true) { echo("checked"); } ?>>
		<label class="onOffSwitch-label" for="rememberPasswordSwitch">
			<div class="onOffSwitch-icon"></div>
			<div class="onOffSwitch-shutter"></div>
			<div class="onOffSwitch-text">Remember Password</div>
		</label>
	</div>
</form>
<div class='errorMessages'<?php if (!empty($errorMessage)) {echo(' style="display:inline-block;"'); } ?>><span></span><?php echo $errorMessage ?></div>