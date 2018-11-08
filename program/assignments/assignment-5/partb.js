// Part B
const randVal = Math.floor(Math.random() * 100 + 1);
const timer = document.getElementById("timer");
const rightSound = new Audio("./partb/right.mp3");
const wrongSound = new Audio("./partb/wrong.wav");
let guessCount = 5;
let time = 20;

document.getElementById("player").volume = "0.4";

let interval = setInterval(function() {
    time--;
    timer.textContent = time;
    if (time <= 0) {
        timer.textContent = "No";
        gameOver(false);
    }
}, 1000);

function gameOver(win) {
    if (win) {
        alert("You win! " + randVal + " was the correct number.");
    } else {
        alert("Game Over. The correct number was " + randVal);
    }
    location.reload();
}

function guess() {
    const guessed = +document.getElementById("guess").value;
    const hint = document.getElementById("hint");
    switch (true) {
        case guessed > randVal: {
            hint.textContent = "Guess lower!";
            wrongSound.play();
            break;
        }
        case guessed < randVal: {
            hint.textContent = "Guess higher!";
            wrongSound.play();
            break;
        }
        default: {
            hint.textContent = "";
            rightSound.play();
            gameOver(true);
            break;
        }
    }
    guessCount--;

    if (guessCount <= 0) {
        gameOver(false);
    }
    document.getElementById("guessCount").textContent = guessCount;
}
