var timer = 0;
var timerCount = 0

var timerset = '#timer1';

function startTimer(time) {
    console.log('Hello');
    if (time == 1) timerset = '#timer1'
    if (time == 2) timerset = '#timer2'
    if (time == 3) timerset = '#timer3'
    timer = setInterval(myTimer, 1000);
}

function stopTimers() {
    timerCount = 0;
    clearInterval(timer);
}

function myTimer(){
    minutes = parseInt(timerCount / 60, 10);
    seconds = parseInt(timerCount % 60, 10);

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    document.querySelector(timerset).textContent = minutes + ":" + seconds;

    timerCount++;

    console.log(timerCount);
};

