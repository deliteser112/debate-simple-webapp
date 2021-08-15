<form action="controller/rating_controller.php" method="POST">
    <ul class="stepper parallel horizontal">
        <!-- step 1 -->
        <li class="step active">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px; ">Cuando estéis listos, pulsa READY.</p>
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
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Primero vas a hablar tú. Cuando estés listo, pulsa START.</p>
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
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Habla durante 2 minutos sobre: <?php echo $text['text1']; ?>.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Cuando termines, pulsa NEXT.</p>
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
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Ahora es el turno del otro usuario.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Cuando el termine de hablar, pulsa NEXT.</p>
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
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Habla durante 3 minutos sobre: <?php echo $text['text2']; ?>.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Cuando termines, pulsa NEXT</p>
                        <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer2" />
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="border-radius: 30px" onClick="stopTimers()">NEXT</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;border-radius: 30px">BACK</button>
                </div>
            </div>
        </li>
        <!-- step 6 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Ahora el otro usuario va a hablar sobre lo que has dicho.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Después comenzará a hablar sobre su tema. Cuando termine de hablar, pulsa NEXT.</p>
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

        <!-- step 7 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field'>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">¿Cual es tu opinión sobre el tema del otro usuario?</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Cuando termines, pulsa NEXT.</p>
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
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Ahora los 2 vais a hablar sobre el mismo tema. tenéis 5 minutos para hablar.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Cuando los 2 estéis listos para empezar, pulsa READY.</p>
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
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Hablad 5 minutos sobre: <?php echo $text['text3']; ?>.</p>
                        <p class="flow-text" style="text-align: center; margin-top: 30px;">Cuando terminéis, pulsa NEXT.</p>
                        <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer3" />
                    </div>
                </div>
                <div class="step-actions" style="justify-content: center;">
                    <button class="waves-effect waves-dark btn next-step" style="border-radius: 30px;" onClick="stopTimers()">NEXT</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;border-radius: 30px;">BACK</button>
                </div>
            </div>
        </li>
        <!-- step 10 -->
        <li class="step">
            <div class="step-content">
                <div class="row">
                    <div class='form-field' style="text-align: center">
                        <span class="flow-text" style="text-align: center; margin-top: 30px;">ENHORABUENA. Ya has terminado el DEBATE.</span>
                        <br>
                        <span class="flow-text" style="text-align: center; margin-top: 30px;">Ahora solo te queda valorar a tu compañero. Cuando hayas terminado pulsa FINISH.</span>
                        <br>
                        <span class="flow-text" style="text-align: center; margin-top: 30px;">¡Vuelve pronto!</span>
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
                    <button class="waves-effect waves-dark btn" style="border-radius: 30px;">FINISH</button>
                    <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;border-radius: 30px;">BACK</button>
                </div>
            </div>
        </li>
        <input type="hidden" name="score" id="score" value="3" />
    </ul>
</form>