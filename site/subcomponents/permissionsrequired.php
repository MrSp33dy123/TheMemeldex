<div class="contentBoxHeader">
	<h1><?php echo ucwords($permissionLevel) ?> Permissions Required<h1>
</div>
<div class="main">
	<p>
		This page requires you to be logged into an account that holds <?php echo $permissionLevel ?> permissions in order for you to gain access to it. If you have such an account, <a href="loginpage">log in</a> to continue.<br>
		
		If you belive this is an error, please contact the website administrator at <u>mrbondusa5@gmail.com</u>.<br><br>
		
		<a href="index.php" onclick="history.go(-1);return false;">Return</a> <span style="color:cyan;">|</span> <a href="loginpage">Log In</a>
	</p>
</div>