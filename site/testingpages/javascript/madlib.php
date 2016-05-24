<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $pageTitle = "Home"; include("../../subcomponents/head.php"); ?> <!-- Head -->
		<script src="javascript/schoolscripts.js" type="text/javascript" defer="false"></script>
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
								<h1>Mad Lib Program</h1>
							</div>
							<script>
								
							</script>
							<div class="main">
								<p>
									A Mad Lib program is one where it asks for particular words, then prints out the sentence containing these words.<br>
									Sometimes this is called a Silly Sentence program.<br>
									Depending on how you do this, the results can make the program appear to "speak" to you.<br><br>
								</p>
								<b>Input an adjective, a noun, and a verb and then click 'create sentence' to print a sentence.</b><br><br>
								<div class="sectionHeader"><div class="leftLine"></div><p>Mad Lib Program</p><div class="horizontalDivider"></div></div>
								<table style="text-align:right; width:30%; min-width:280px; margin-top:22px;">
									<tbody>
									<tr>
										<td><p class="label">Adjective:</p></td><td><input name="adjective" type="text"></td>
									</tr>
									<tr>
										<td><p class="label">Noun:</p></td><td><input name="noun" type="text"></td>
									</tr>
									<tr>
										<td><p class="label">Verb:</p></td><td><input name="verb" type="text"></td>
									</tr>
									</tbody>
								</table>
								<a onclick="createMadLibSentence()"  class="hyperlink-square-backgroundIconFlash">
									<p class="textBackground fa fa-pencil"></p><p class="text">Create Sentence</p>
								</a>
								<div class='errorMessages' style="margin-left:8px;"><span></span>Please fill in all fields.</div>
								<p id="madLibResponse" style="text-align:center; font-style:italic;"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("../../subcomponents/footer.php"); ?> <!-- Footer -->
		</div>
	</body>
</html>


<!-- Use what you have learned to create a Mad Lib word game program. To do this you will ask for: 
an adjective 
a noun 
a past tense verb 
Then you will print a sentence like: 
The [adjective] [noun] [verb] over the lazy brown dog. -->