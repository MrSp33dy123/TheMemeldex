<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Login"; include("../subcomponents/head.php"); ?> <!-- Head -->
	</head>
	<body>
		<div id="wrapper">
            <div id="bodyWrapper">
                <?php include("../subcomponents/header.php"); ?>
                <?php $activePage = "index"; include("../subcomponents/navigation.php"); ?>
                <div id="contentWrapper">
                    <div id="content">
                        <?php include("../subcomponents/notifications.php"); ?>
						<div id="loginPage" class="dualColumn dualColumnFlex">
                            <div class="rightBox contentBox">
                                <div class="contentBoxHeader">
                                    <h1>Create a new account</h1>
                                </div>
                                <div class="main">
                                    <p>Don't have an account? Create one! Creating an account on this site allows you to...</p>
                                    <ul>
                                      <li>Customise the appearance of the site</li>
                                      <li>Maintain your own personal profile page</li>
                                      <li>Submit new memes</li>
                                      <li>Post comments on the website</li>
                                    </ul>
                                    <br>
                                    <a class="button fa-user" href="users/register">Register now!</a>
								</div>
							</div>
							<div class="leftBox contentBox">
                                <div class="contentBoxHeader">
                                    <h1>Login</h1>
                                </div>
                                <div class="main">
                                    <p>Log in with an existing account</p>
                                    <br>
                                    <?php include("../subcomponents/loginform.php"); ?>
                                </div>
							</div>
						</div>
						<div id="databaseTestingInsert" class="centerSingular contentBox" style="margin-top:35px; padding:20px; text-align:center;">
							<?php include("../testingpages/databasetesting.php"); ?>
						</div>
					</div>
				</div>
			</div>
			<?php include("../subcomponents/footer.php"); ?>
		</div>
	</body>
</html>
