// Part A

let i = 1;
let hours = [];
while (1) {
    let hour = window.prompt(
        "Enter Employee " +
            i +
            "'s hours. (Enter a negative number or press cancel to finish). ",
        "0"
    );
    if (hour < 0 || hour == null) {
        break;
    } else {
        hours.push(+hour);
        i++;
    }
}
calc(hours);

function calc(hours) {
    const payRate = 15;
    const tableDiv = document.getElementById("tableEmployees");
    tableDiv.style.display = "block";

    let table = tableDiv.children[0].children[0];
    while (table.childNodes.length > 2) {
        table.removeChild(table.lastChild);
    }

    for (i in hours) {
        let tr = table.appendChild(document.createElement("tr"));
        let td1 = tr.appendChild(document.createElement("td"));
        let td2 = tr.appendChild(document.createElement("td"));
        let td3 = tr.appendChild(document.createElement("td"));
        let hour = hours[i];
        let rate = 0;

        if (hour > 40) {
            rate = (hour - 40) * 1.5 * payRate;
            rate += 40 * payRate;
        } else {
            rate = hour * payRate;
        }

        td1.textContent = `Employee ${+i + 1}`;
        td2.textContent = hour;
        td3.textContent = "$" + rate;
    }
}
