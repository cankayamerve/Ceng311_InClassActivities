var names = ["Ben", "Joel", "Judy", "Anne"];
var scores = [88, 98, 77, 88];

var $ = function (id) { return document.getElementById(id); };

window.onload = function () {
    $("display_results").onclick = displayResults;
    $("display_scores").onclick = displayScores;
    $("add").onclick = addScore;
    $("name").focus(); 
};

function displayResults() {
    if (scores.length === 0) return;

    var total = 0;
    var highest = scores[0];
    var highestIndex = 0;

    for (var i = 0; i < scores.length; i++) {
        total += scores[i];
        if (scores[i] > highest) {
            highest = scores[i];
            highestIndex = i;
        }
    }

    var average = total / scores.length;
	document.getElementById("results").innerHTML="<h2> Results </h2> Average score is "+average + 
	"<br\> <p>High score = " + names[highestIndex] + " with a score of " + highest + "</p>" ;

}

function displayScores() {
    var table = $("scores_table");
	document.getElementById("scores_table").innerHTML = "<h2>Scores</h2>";
    table.innerHTML += "<tr><th>Name</th><th>Score</th></tr>";

    for (var i = 0; i < names.length; i++) {
        var row = "<tr><td>" + names[i] + "</td><td>" + scores[i] + "</td></tr>";
        table.innerHTML += row;
    }
}
function addScore() {
    var name = $("name").value.trim();
    var scoreStr = $("score").value.trim();

    var score = parseFloat(scoreStr);

    var nameValid = /^[a-zA-ZğüşöçıİĞÜŞÖÇ\s]+$/.test(name);
    var scoreIsNumber = /^(\d+(\.\d+)?|\.\d+)$/.test(scoreStr);

    if (name === "" && (score < 0 || score > 100)) {
        alert("You must enter a name and a valid score");
        return;
    } else if (!nameValid) {
        alert("Name must contain only letters. No numbers allowed.");
        return;
    } else if (isNaN(score)) {
        alert("You must enter a valid score.");
        return;
    } else if (name === "") {
        alert("You must enter a valid name.");
        return;
    } else if (score < 0) {
        alert("You cannot enter a negative score.");
        return;
    } else if (score > 100) {
        alert("You cannot enter a score that is bigger than 100.");
        return;
    }else if (!scoreIsNumber) {
        alert("Score must be a number (integer or decimal).");
        return;
    } 

    names.push(name);
    scores.push(score);

    $("name").value = "";
    $("score").value = "";
    $("name").focus();
}
