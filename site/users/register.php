<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Sign Up"; include("../subcomponents/head.php"); ?>
        <script src="javascript/signupscript.js" type="text/javascript" defer="false"></script>
        <script src="libraries/jsTimezoneDetect/dist/jstz.min.js" type="text/javascript" defer="false"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="libraries/Jcrop/js/jquery.Jcrop.min.js" defer="false"></script>
        <link rel="stylesheet" href="libraries/Jcrop/css/jquery.Jcrop.min.css" type="text/css">
        <?php
        function generateTimezoneList() {                                                                                                                                                                                                                                                     

            static $regions = array(
                DateTimeZone::AFRICA,
                DateTimeZone::AMERICA,
                DateTimeZone::ANTARCTICA,
                DateTimeZone::ASIA,
                DateTimeZone::ATLANTIC,
                DateTimeZone::AUSTRALIA,
                DateTimeZone::EUROPE,
                DateTimeZone::INDIAN,
                DateTimeZone::PACIFIC,
            );

            $timezones = array();
            foreach( $regions as $region ) {
                $timezones = array_merge( $timezones, DateTimeZone::listIdentifiers( $region ) );
            }

            $timezone_offsets = array();
            foreach( $timezones as $timezone ) {
                $tz = new DateTimeZone($timezone);
                $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
            }

            // Sort timezone by timezone name
            asort($timezone_offsets);

            $timezone_list = array();
            foreach( $timezone_offsets as $timezone => $offset ) {
                $offset_prefix = $offset < 0 ? '-' : '+';
                $offset_formatted = gmdate( 'H:i', abs($offset) );

                $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

                $t = new DateTimeZone($timezone);
                $c = new DateTime(null, $t);
                $current_time = $c->format('g:i A');

                $timezone_list[$timezone] = "(${pretty_offset}) $timezone | $current_time";
                
            }

            return $timezone_list;
        }
        
        $timezoneList = generateTimezoneList();
        ?>
	</head>
	<body>
		<div id="wrapper">
            <div id="bodyWrapper">
                <?php include("../subcomponents/header.php"); ?>
                <?php $activePage = "index"; include("../subcomponents/navigation.php"); ?>
                <div id="contentWrapper">
                    <div id="content">
                        <?php include("../subcomponents/notifications.php"); ?>
						<div id="signUpPage" class="centerSingular contentBox">
							<div class="contentBoxHeader">
								<h1>Create an account</h1>
							</div>
							<div class="main">
                                <form id="signUpPageForm" class="tableContainer">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="sectionHeader"><div class="leftLine"></div><p>Basic Information</p><div class="horizontalDivider"></div></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Username</p></td><td>
                                                <div style="position:relative;">
                                                    <input class="javaInputBorderRed" name="username" type="text" required="required">
                                                    <div class="tooltipBubble hidden">
                                                        <span>Must be at least 2 characters long</span>, and <span>not already be taken</span>.
                                                        <div class="arrow"><div></div></div>
                                                    </div>
                                                    <svg class="validationSymbol" viewBox="0 0 150 150">
                                                        <path class="slash" d="M25,75 l100,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="circleBottom" d="M15,75a60,60 0 1,0 120,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="circleTop" d="M135,75a60,60 0 1,0 -120,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="tick" d="M 35,35 l 0,50 l 120,0" style="stroke:RGB(68,180,68);"/>
                                                    </svg>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Email</p></td><td>
                                                <div style="position:relative;">
                                                    <input class="javaInputBorderRed" name="email" type="text" required="required">
                                                    <div class="tooltipBubble hidden">
                                                        <span>Must be a valid email</span>.
                                                        <div class="arrow"><div></div></div>
                                                    </div>
                                                    <svg class="validationSymbol" viewBox="0 0 150 150">
                                                        <path class="slash" d="M25,75 l100,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="circleBottom" d="M15,75a60,60 0 1,0 120,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="circleTop" d="M135,75a60,60 0 1,0 -120,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="tick" d="M 35,35 l 0,50 l 120,0" style="stroke:RGB(68,180,68);"/>
                                                    </svg>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="sectionHeader"><div class="leftLine"></div><p>Security Information</p><div class="horizontalDivider"></div></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Password</p></td><td>
                                                <div style="position:relative;">
                                                     <input class="javaInputBorderRed" name="password" type="password" data-tooltip="Password must be at least 8 characters long" required="required">
                                                    <div class="tooltipBubble hidden">
                                                        <span>Must be at least 8 characters long</span>, and <span>not contain 'abcd' or '1234'</span>.
                                                        <div class="arrow"><div></div></div>
                                                    </div>
                                                    <svg class="validationSymbol" viewBox="0 0 150 150">
                                                        <path class="slash" d="M25,75 l100,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="circleBottom" d="M15,75a60,60 0 1,0 120,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="circleTop" d="M135,75a60,60 0 1,0 -120,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="tick" d="M 35,35 l 0,50 l 120,0" style="stroke:RGB(68,180,68);"/>
                                                    </svg>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Repeat Password</p></td><td>
                                                <div style="position:relative;">
                                                    <input class="javaInputBorderRed" name="repeatpassword" type="password" required="required">
                                                    <div class="tooltipBubble hidden">
                                                        <span>Must be exactly the same as the password above</span>.
                                                        <div class="arrow"><div></div></div>
                                                    </div>
                                                    <svg class="validationSymbol" viewBox="0 0 150 150">
                                                        <path class="slash" d="M25,75 l100,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="circleBottom" d="M15,75a60,60 0 1,0 120,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="circleTop" d="M135,75a60,60 0 1,0 -120,0" style="stroke:RGB(200,48,48);"/>
                                                        <path class="tick" d="M 35,35 l 0,50 l 120,0" style="stroke:RGB(68,180,68);"/>
                                                    </svg>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="sectionHeader"><div class="leftLine"></div><p>Personal Details</p><div class="horizontalDivider"></div></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Short Bio</p></td><td>
                                                <div style="position:relative;">
                                                    <input class="" style="background-size:0px 0px;" name="shortbio" type="text" placeholder="Optional" maxlength="250">
                                                    <div class="tooltipBubble hidden">
                                                        <span><span class="remVal" style="transition:color linear 280ms;">250</span> characters remaining</span>
                                                        <div class="arrow"><div></div></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Extended Bio</p></td><td><textarea class="" name="longbio" rows="3" placeholder="Optional"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Account Avatar</p></td>
                                            <td style="text-align:left;">
                                                <?php $user = 'default'; include('../subcomponents/useravatarbox.php'); ?>
                                                <div id="avatarUpload" class="imageUpload">
                                                    <div class="contentBox content fa-picture-o">
                                                        <div class="header"><input type="file" id="imageToUpload"></div>
                                                        <div id="jcrop" style="display:none;"></div><br>
                                                        <div class="canvasWrapper" style="display:none;">
                                                            <div></div>
                                                            <canvas id="canvas" style="width:172px; height:172px; display:block;"></canvas>
                                                        </div>
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                                                        <input id="image" type="hidden" name="avatar">
	                                                    <a class="footer disabled" onclick="avatarSelected()"><p class="OKselect"><span>&#10095;&#10095; </span>Select picture<span> &#10094;&#10094;</span></p></a>
                                                    </div>
                                                    <div class="background"></div>
                                                    <div class="info">[Click away to exit]</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Timezone</p></td>
                                            <td><select id="timezoneSelect" name="timezone">
                                                <?php
                                                foreach ($timezoneList as $index => $value) {
                                                    $value = str_replace("_", " ", $value);
                                                    $value = str_replace("/", " - ", $value);
                                                    echo '<option value="'.$index.'">'.$value.'</option>';
                                                }
                                                ?>
                                            </select></td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">External Accounts</p></td>
                                            <td style="text-align:left;"><a id="" class="button fa-globe disabled" onclick="jsThisTest(this)">Add Account</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="sectionHeader"><div class="leftLine"></div><p>Finish</p><div class="horizontalDivider"></div></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p class="label">Finish</p></td>
                                            <td>
                                                <table>
                                                <tbody>
                                                    <tr>
                                                        <td style="white-space:nowrap; max-width:100vw;"><!--<div class="g-recaptcha" data-sitekey="6LfnMxwTAAAAAN5coPuHnfYD6kR66dsWakLPVn4w" data-theme="dark" style="display:inline-block;"></div>--></td><td><i>By clicking 'sign me up' you agree that you are ready to handle some dank memes, and that you are over the age of 12 (sorry kiddos).</i></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                                <a id="signUpButton" class="button fa-user-plus" onclick="$('#signUpPageForm').submit();">Sign Me Up!</a> Already have an account? <a id="signUpButton" href="users/login">Log in.</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("../subcomponents/footer.php"); ?>
		</div>
	</body>
</html>