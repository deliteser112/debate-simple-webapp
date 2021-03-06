<form action="controller/rating_controller.php" method="POST">
    <ul class="stepper parallel horizontal">
        <!-- step 1 -->
        <li class="step active">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500; "> When you and the other user are ready, press READY.</p>
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center">
                    <button class="waves-effect waves-dark btn next-step" style="background-color: #A5C931;border-radius: 30px">READY</button>
                </div>
            </div>
        </li>
        <!-- step 2 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">The other user will start talking first. When he/she is done, press START.</p>
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="background-color: #FF7F27;border-radius: 30px" onClick="startTimer(1)">START</button>
                </div>
            </div>
        </li>
        <!-- step 3 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Speak for 2 minutes about: <?php echo $text['text1']; ?>.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">When finished, press NEXT.</p>
                        <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer1" />
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="border-radius: 30px" onClick="stopTimers()">NEXT</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;border-radius: 30px">BACK</button>
                </div>
            </div>
        </li>
        <!-- step 4 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Now listen to the other user.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">When he/she finishes speaking, press NEXT.</p>
                        <div style="text-align: center; margin-top: 30px; margin-bottom: 60px;">
                            <img src="assets/images/7-512.png" style="width: 80px; height: auto;" />
                        </div>
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="border-radius: 30px" onClick="startTimer(2)">NEXT</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;border-radius: 30px">BACK</button>
                </div>
            </div>
        </li>
        <!-- step 5 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Say whether you agree or disagree with what the other user said.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">When finished, press NEXT.</p>
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="border-radius: 30px">NEXT</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;border-radius: 30px">BACK</button>
                </div>
            </div>
        </li>
        <!-- step 6 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Talk for 3 minutes about: <?php echo $text['text2']; ?>.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">When finished, press NEXT.</p>
                        <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer2" />
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="border-radius: 30px" onClick="stopTimers()">NEXT</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;border-radius: 30px">BACK</button>
                </div>
            </div>
        </li>

        <!-- step 7 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Now listen to the other user. He is going to say whether he agrees or not with what you hava said. When he/she finishes talking, press NEXT</p>
                        <div style="text-align: center; margin-top: 30px; margin-bottom: 60px;">
                            <img src="assets/images/7-512.png" style="width: 80px; height: auto;" />
                        </div>
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="border-radius: 30px">NEXT</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;border-radius: 30px">BACK</button>
                </div>
            </div>
        </li>

        <!-- step 8 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Now you are going to talk about the same topic for 5 minutes.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">When you and the other user are ready, press READY.</p>
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center">
                    <button class="waves-effect waves-dark btn next-step" style="background-color: #A5C931;border-radius: 30px" onClick="startTimer(3)">READY</button>
                </div>
            </div>
        </li>
        <!-- step 9 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Talk for 5 minutes about: <?php echo $text['text3']; ?>.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">When you are done, press NEXT.</p>
                        <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer3" />
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="border-radius: 30px" onClick="stopTimers()">NEXT</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;border-radius: 30px">BACK</button>
                </div>
            </div>
        </li>
        <!-- step 10 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field' style="text-align: center">
                        <span class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">??CONGRATULATIONS! You have finished the debate.</span>
                        <br>
                        <span class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Now it is time for you to rate the other user.</span>
                        <br>
                        <span class="flow-text" style="text-align: center; margin-top: 30px;font-weight: 500;">Hope to see you soon.</span>
                        <p class="counterW" style="text-align: center; margin-top: 30px">score: <span class="scoreNow">3</span> out of <span>5</span></p>
                        <ul class="ratingW">
                            <li class="on"><a href="javascript:void(0);">
                                    <div class="star"></div>
                                </a></li>
                            <li class="on"><a href="javascript:void(0);">
                                    <div class="star"></div>
                                </a></li>
                            <li class="on"><a href="javascript:void(0);">
                                    <div class="star"></div>
                                </a></li>
                            <li><a href="javascript:void(0);">
                                    <div class="star"></div>
                                </a></li>
                            <li><a href="javascript:void(0);">
                                    <div class="star"></div>
                                </a></li>
                        </ul>

                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn" style="border-radius: 30px">FINISH</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;border-radius: 30px">BACK</button>
                </div>
            </div>
        </li>
        <input type="hidden" name="score" id="score" value="3" />
    </ul>
</form>