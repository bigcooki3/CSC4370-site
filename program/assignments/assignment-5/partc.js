const timer = document.getElementById("timer");
let guessing = false;
let guessed = 0;
let guessed_id = 0;
let correctCount = 0;
let numPics = null;
let time = Number.MAX_SAFE_INTEGER;
let interval = null;

function start() {
    table = document.getElementById("table");
    document.getElementById("options").style.display = "none";
    table.style.display = "block";

    numPics = document.getElementById("numPics");
    numPics = numPics.options[numPics.selectedIndex].value;

    let numSecs = document.getElementById("numSecs");
    numSecs = numSecs.options[numSecs.selectedIndex].value;

    switch (+numPics) {
        case 8:
            time = 120;
            break;
        case 10:
            time = 150;
            break;
        default:
            time = 180;
            break;
    }

    tableB = table.children[0].children[0].children[0];

    let cards = [];
    for (i = 1; i <= numPics; i++) {
        cards.push(i, i);
    }
    shuffle(cards);

    let rowCount = 1;
    let tr = tableB.appendChild(document.createElement("tr"));

    for (card in cards) {
        td = tr.appendChild(document.createElement("td"));

        td.setAttribute(
            "style",
            "background-image: url('./partc/" + cards[card] + ".png')"
        );
        td.setAttribute("onclick", "guessCheck(event, " + cards[card] + ")");

        if (rowCount % 4 == 0) {
            tr = tableB.appendChild(document.createElement("tr"));
        }
        rowCount++;
    }

    let cardList = document.getElementsByTagName("td");
    cardList = [...cardList];
    setTimeout(function() {
        for (card in cardList) {
            cardList[card].style.backgroundSize = "0 0";
        }
        interval = setInterval(function() {
            time--;
            timer.textContent = time;
            timer.parentElement.style.display = "block";
            if (time <= 0) {
                timer.textContent = "No";
                gameOver(false);
            }
        }, 1000);
    }, 1000 * numSecs);
}

function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function guessCheck(e, guess) {
    if (guessing) {
        prevGuess = document.getElementById("guessing");
        e.target.style.backgroundSize = "75px 75px";

        if (guess == guessed) {
            prevGuess.removeAttribute("id");
            prevGuess.removeAttribute("onclick");
            prevGuess.setAttribute("class", "correct");
            e.target.setAttribute("class", "correct");
            e.target.removeAttribute("onclick");
            correctCount++;
        } else {
            setTimeout(function() {
                e.target.style.backgroundSize = "0 0";
                prevGuess.removeAttribute("id");
            }, 1000);
        }
        guessing = false;
        if (correctCount == +numPics) {
            gameOver(true);
        }
    } else {
        guessing = true;
        guessed = guess;
        e.target.setAttribute("id", "guessing");
    }
}

function gameOver(win) {
    clearInterval(interval);
    const victory = document.getElementById("victory");
    victory.setAttribute("class", "victory");
    if (win) {
        victory.children[0].textContent = "You won!";
    } else {
        victory.children[0].textContent = "You ran out of time!";
    }
}
