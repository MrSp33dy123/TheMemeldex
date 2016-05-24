<div class="contentBoxHeader">
    <h1>LHS Timetable Survey</h1>
</div>
<div class="main">
	<form id="LHStimetablesurvey" submit="LHStimetablesurveyform-submit">
        <p style="font-style:italic;">What do you think of the new period arrangement that Lincoln High School has? Do you like it, love it, hate it?<br>
            Fill out the survey below and help us improve the system!</p><br>
        <div class="activateSurvey sectionActivate">
            <input type="checkbox" id="activateView">
            <label class="label buttonDisplay centeredX centeredY" for="activateView">Complete Survey Questions<p class="textBackground fa fa-pencil-square-o"></p></label>
            <div class="spinningInfinite buttonDisplay centeredY"></div>
            <div class="sectionToActivate">
                <div class="survey">
                    <div class="sectionHeader"><div class="leftLine"></div><p>Timetable Survey</p><div class="horizontalDivider"></div></div>
                    <p>Before the change in the timetable, did you find the rapid change in subjects to be more frustrating or refreshing?</p>
                    <input type="range" min="0" max="100" value="0">
                    <br>
                    <p>Do you loose concentration before the end of the 2-hour extended periods? If so, when?</p>
                    <div class="onoffswitch">
                        <input type="checkbox" name="SQ2" class="onoffswitch-checkbox" id="SQ2">
                        <label class="onoffswitch-label centeredY" for="SQ2">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label><!--
                        --><div class="showOnCondition">, I normally manage about <input type="number"> minutes.</div>
				    </div>
                    <br>
                    <p>During the 2 hour periods, does your teacher let you go out for a break mid-way through? If so, how long do you have for it?</p>
                    <div class="onoffswitch">
                        <input type="checkbox" name="SQ3" class="onoffswitch-checkbox" id="SQ3">
                        <label class="onoffswitch-label" for="SQ3">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label><!--
                        --><div class="showOnCondition">, usually for about <input type="number"> minutes.</div>
				    </div>
                    <br>
                    <p>How often do your teachers make use of the extended periods to do cumbersome tasks that wouldn't be possible otherwise?</p>
                    <input type="range" min="0" max="100" value="0">
                    <br>
                    <p>Personally, do you like the period changes?</p>
                    <input type="range" min="0" max="100" value="0">
                    <br>
                    <p>What's your <u>least</u> favorite thing about the period changes?</p>
                    <textarea rows="4" cols="70"></textarea>
                    <br>
                    <p>What's your <u>most</u> favorite thing about the period changes?</p>
                    <textarea rows="4" cols="70"></textarea>
                    <br>
                    <br>
                    <p>Do you have any further comments on the new period system that you would like to add?</p>
                    <textarea rows="4" cols="70"></textarea>
                    <br>
                    <input type="checkbox" id="allowUseOfInfo"><label for="allowUseOfInfo">I agree to let this anonymously gathered information be used to compile statistics on the LHS period system.</label>
                    <br>
                    <br>
                    <input type="submit">
                </div>
            </div>
        </div>
	</form>
</div>
