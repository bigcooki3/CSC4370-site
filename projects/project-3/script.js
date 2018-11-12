let gridArray = null;
let gridSize = 0;
let generation = 0;
const vectors = [
    [-1, -1],
    [-1, 0],
    [-1, 1],
    [0, -1],
    [0, 1],
    [1, -1],
    [1, 0],
    [1, 1]
];

let player = null;

function start() {
    let board = $("#board");
    $("#boardDiv").show();
    $(".toggle").show();

    generation = 0;
    $("#gen").text(generation);
    gridSize = +$("#gridSize").val();

    board.empty();

    gridArray = fillArray(new Array(gridSize));
    for (let i = 0; i < gridSize; i++) {
        let tr = $("<tr/>").appendTo(board);
        for (let j = 0; j < gridSize; j++) {
            let td = $("<td/>").appendTo(tr);
            td = $("<input/>")
                .attr("type", "checkbox")
                .attr("onchange", "changeArray(this, " + i + ", " + j + ")")
                .appendTo(td);
        }
    }
}

function play() {
    player = setInterval(function() {
        update();
    }, 200);
}

function pause() {
    clearInterval(player);
}

function fillArray(arr, rand = 0) {
    for (let i = 0; i < arr.length; i++) {
        arr[i] = new Array(gridSize).fill(false);
        if (rand) {
            for (let j = 0; j < gridSize; j++) {
                arr[i][j] = Boolean(Math.random() >= 0.7);
                coordToBoard(i, j, arr);
            }
        }
    }
    return arr;
}

function update(steps = 1) {
    for (let i = 1; i <= steps; i++) {
        calcArray();
        generation++;
    }
    $("#gen").text(generation);
}

function changeArray(cb, i, j) {
    gridArray[i][j] = cb.checked;
}

function emptyArray() {
    // Clear array
    generation = 0;
    $("#gen").text(generation);
    for (let i = 0; i < gridSize; i++) {
        for (let j = 0; j < gridSize; j++) {
            gridArray[i][j] = false;
        }
    }
}

function printArray(shape) {
    switch (shape) {
        case "box":
            let topLefti = 1;
            let topLeftj = 1;
            for (let i = topLefti; i < topLefti + 2; i++) {
                for (let j = topLeftj; j < topLeftj + 2; j++) {
                    gridArray[i][j] = true;
                    coordToBoard(i, j);
                }
            }
            break;
        case "blinker":
            let topLeft = 5;
            for (let j = topLeft; j < topLeft + 3; j++) {
                gridArray[2][j] = true;
                coordToBoard(2, j);
            }
            break;
        case "beacon":
            break;
        default:
            generation = 0;
            $("#gen").text(generation);
            fillArray(gridArray, 1);
            break;
    }
}

function calcArray() {
    const tmp = gridArray.map(function(arr) {
        return arr.slice();
    });

    for (let i = 0; i < gridSize; i++) {
        for (let j = 0; j < gridSize; j++) {
            let c = checkNeighbors(tmp, i, j);
            switch (gridArray[i][j]) {
                case true:
                    if (c < 2 || c > 3) {
                        gridArray[i][j] = false;
                    } else {
                        gridArray[i][j] = true;
                    }
                    coordToBoard(i, j);
                    break;
                case false:
                    if (c == 3) {
                        gridArray[i][j] = true;
                    } else {
                        gridArray[i][j] = false;
                    }
                    coordToBoard(i, j);
                    break;
                default:
                    gridArray[i][j] = false;
                    coordToBoard(i, j);
                    break;
            }
        }
    }
}

function checkNeighbors(arr, x, y) {
    // Calculate neighbors of coordinates using directional vectors
    let count = 0;
    for (let i = 0; i < vectors.length; i++) {
        let dx = x + vectors[i][0];
        let dy = y + vectors[i][1];
        if (dx >= 0 && dx < gridSize && dy >= 0 && dy < gridSize) {
            // console.log(dx + ", " + dy + ", Value: " + +arr[dx][dy]);
            count += +arr[dx][dy];
        }
    }
    return count;
}

function arrayToBoard() {
    // Convert array to HTML table, please use coordToBoard() where possible
    for (let i = 0; i < gridSize; i++) {
        for (let j = 0; j < gridSize; j++) {
            $("#board")
                .children()
                .eq(i)
                .children()
                .eq(j)
                .children()
                .first()
                .prop("checked", gridArray[i][j]);
        }
    }
}

function coordToBoard(i, j, arr = gridArray) {
    // Check box on board for coordinates, put in your loop to avoid using arrayToBoard() and iterating twice
    $("#board")
        .children()
        .eq(i)
        .children()
        .eq(j)
        .children()
        .first()
        .prop("checked", arr[i][j]);
}
