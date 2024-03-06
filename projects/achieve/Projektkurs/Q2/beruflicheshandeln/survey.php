<?php
include_once '../../include/functions.php';
sec_session_start();

if(login_check() == false) { 
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../../css/global.css">
        <link rel="stylesheet" href="../../css/survey.css">

        <title>Projektkurs | Umfrage</title>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/b5259bc025.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    </head>
    <body>
        <a class="back" href="index.php">
            <i class="fa-solid fa-arrow-left-long"></i>
        </a>

        <div class="heading">
            <h2>Umfrageergebnisse</h2>
        </div>

        <div class="dropdown-container">
            <div class="dropdown">
                <button class="dropbtn" onclick="dropdown()" id="dropdown-text">Jahrgang<i class="fa-solid fa-caret-down" id="dropdown-icon"></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a onclick="loadResults('all');">Gesamt</a>
                    <a onclick="loadResults('Q1');">Q1</a>
                    <a onclick="loadResults('Q2');">Q2</a>
                </div>
            </div>
        </div>

        <div class="results">
            <div class="row">
                <div class="question">
                    <h4>Frage 1: In welche Stufe gehst du?</h4>
                    <canvas id="question1"></canvas>
                </div>
                <div class="question">
                    <h4>Frage 2: Welche Leistungskurse belegst du?</h4>
                    <canvas id="question2"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="question">
                    <h4>Frage 3: Kannst du dir vorstellen, dass deine Leistungskurse etwas mit deinem späteren Beruf zu tun haben?</h4>
                    <canvas id="question3"></canvas>
                </div>
                <div class="question">
                    <h4>Frage 4: Ist es dir wichtig, dass dein Beruf zu deiner Identität und deinen Werten passt?</h4>
                    <canvas id="question4"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="question">
                    <h4>Frage 5: Nenne drei zentrale Werte für dein späteres Berufsleben</h4>
                    <img src="../../svg/question5-all.svg" alt="Question 5" id="question5">
                </div>
                <div class="question">
                    <h4>Frage 6: Hast du dir bereits Gedanken um deinen Beruf/Studium/Ausbildung gemacht?</h4>
                    <canvas id="question6"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="question">
                    <h4>Frage 7: Passen deine Ideen/Vorstellungen/Pläne zu deiner Identität</h4>
                    <canvas id="question7"></canvas>
                </div>
                <div class="question">
                    <h4>Frage 8: Wie stark setzt dich die Frage nach deiner Zukunft unter Druck?</h4>
                    <canvas id="question8"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="question">
                    <h4>Frage 9: Fühlst du dich bei deinen Entscheidungen hinsichtlich deiner Berufsorientierung von der Schule unterstützt?</h4>
                    <canvas id="question9"></canvas>
                </div>
                <div class="question">
                    <h4>Frage 10: Inwiefern fühlst du dich unterstützt bzw. nicht unterstützt?</h4>
                    <table id="scroll">
                        <tr id="table-heading">
                            <th>Unterstützung</th>
                            <th>Fehlende Unterstützung</th>
                        </tr>
                        <tr>
                            <td>Angebote Studien- und Berufsberatung</td>
                            <td>Vorstellung mehrerer Universitäten, die eine größere Bandbreite an Studiengängen abdecken und generell verschieden Angebote</td>
                        </tr>
                        <tr>
                            <td>Praktika</td>
                            <td>methodische Vorbereitung auf so etwas wie Anmeldeverfahren (Tests, Bewerbung etc.) </td>
                        </tr>
                        <tr>
                            <td>Uniwoche (DigiDOP)</td>
                            <td>Workshops zu bestimmten Berufsrichtungen </td>
                        </tr>
                        <tr>
                            <td>AGs (z.B. Wirtschafts-AG)</td>
                            <td>Lehrer noch stärker als Ansprechpartner </td>
                        </tr>
                        <tr>
                            <td>Viele Lehrer offen für Gespräche</td>
                            <td>Mehr Praktika </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Berufliche Bezüge im Unterricht herstellen und Ereignisse wie die Uniwoche gemeinsam reflektieren</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="question">
                    <h4>Frage 11: Welche politischen Programme oder Veranstaltungen kennst du, die dir bei deiner Berufswahl helfen können?</h4>
                    <canvas id="question11"></canvas>
                </div>
                <div class="question">
                    <h4>Frage 12: Welche konkreten Wünsche oder Ideen hast du, wie dir bei dieser Frage von der Politik geholfen werden kann?</h4>
                    <table id="scroll">
                        <tr id="table-heading">
                            <th>Wünsche und Ideen</th>
                        </tr>
                        <tr>
                            <td>Mehr Möglichkeiten für Prakitka</td>
                       </tr>
                        <tr>
                            <td>Infoveranstalltungen</td>
                        </tr>
                        <tr>
                            <td>Kontak zu mehr Universitäten herstellen</td>
                        </tr>
                        <tr>
                            <td>Einen Besseren Überblick über alle Möglichkeiten nach dem Abitur vermitteln</td>
                        </tr>
                        <tr>
                            <td>Vorstellung von verschiedenen Berufen in der Schule</td>
                        </tr>
                        <tr>
                            <td>konkretere und individuellere Berufsberatung</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="question">
                    <h4>Frage 13: Hast du bereits an der Berufsberatung am TFG bei Frau Dr. Annette Linzbach teilgenommen?</h4>
                    <canvas id="question13"></canvas>
                </div>
                <div class="question">
                    <h4>Frage 14: Wenn ja, hat dir das Gespräch geholfen?</h4>
                    <table>
                        <tr id="table-heading">
                            <th>Positives Feedback</th>
                            <th>Negatives Feedback</th>
                        </tr>
                        <tr>
                            <td>Bestätigung in Vorstellungen</td>
                            <td>Freunde raten strikt ab, da sie einem keine neuen Informationen nennt und nur einen verkomplizierten Überblick über die Berufswelt schafft </td>
                        </tr>
                        <tr>
                            <td>Mögliche Alternativen gezeigt</td>
                            <td>Einige, die das Gespräch geführt haben, bereuen es im Nachhinein, da es sie nur mehr verwirrt hat und sie einem unklar einen „Haufen“ an Informationen zugeworfen hat </td>
                        </tr>
                        <tr>
                            <td>Hilfe für Bewerbung</td>
                            <td>Nur viel erklärt, nicht konkret geworden</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </body>


    <script>
        var currentCharts = [];

        function loadResults(stufe) {
            destroy();
            switch (stufe) {
                case 'all':
                    document.getElementById("dropdown-text").innerHTML = "Gesamt <i class='fa-solid fa-caret-down' id='dropdown-icon'></i>";
                    //Question 1
                    var xValues = ["Q2", "Q1"];
                    var yValues = [37, 26];
                    var colors = [blue1, blue14];
                    loadPieChart("question1", xValues, yValues, colors);


                    //Question 2
                    xValues = ["Mathe", "Biologie", "Englisch", "Sozialwissenschaften", "Erdkunde", "Deutsch", "Chemie", "Pädagogik", "Religionslehre", "Physik", "Kunst", "Geschichte", "Französisch", "Spanisch"];
                    yValues = [25, 19, 18, 13, 10, 8, 7, 6, 6, 5, 4, 3, 2];
                    colors = [blue1, blue2, blue3, blue4, blue5, blue6, blue7, blue8, blue9, blue10, blue11, blue12, blue13];
                    loadBarChart("question2", xValues, yValues, colors);


                    //Question 3
                    xValues = ["Ja", "Eventuell", "Nein"];
                    yValues = [19, 6, 11];
                    colors = [blue1, blue7, blue13];
                    loadBarChart("question3", xValues, yValues, colors);
                    

                    //Question 4
                    xValues = ["Ja", "Nein"];
                    yValues = [57, 6];
                    colors = [blue1, blue14];
                    loadPieChart("question4", xValues, yValues, colors);


                    //Question 5
                    document.getElementById("question5").src = '../../svg/question5-all.svg';


                    //Question 6
                    xValues = ["Konkrete Pläne", "Einige Vorstellungen", "Erste Ideen", "Bisher noch nicht"];
                    yValues = [14, 27, 19, 3];
                    colors = [blue1, blue5, blue9, blue13];
                    loadBarChart("question6", xValues, yValues, colors);


                    //Question 7
                    xValues = ["Ja", "Teilweise", "Nein"];
                    yValues = [38, 24, 1];
                    colors = [blue1, blue7, blue14];
                    loadPieChart("question7", xValues, yValues, colors);


                    //Question 8
                    xValues = ["1/10", "2/10", "3/10", "4/10", "5/10", "6/10", "7/10", "8/10", "9/10", "10/10"];
                    yValues = [2, 1, 6, 6, 5, 8, 12, 12, 10, 1];
                    colors = [blue1, blue3, blue4, blue5, blue6, blue8, blue9, blue10, blue11, blue13];
                    loadBarChart("question8", xValues, yValues, colors);


                    //Question 9
                    var xValues = ["Teilweise", "Nein", "Ja"];
                    var yValues = [32, 27, 4];
                    var colors = [blue1, blue7, blue14];
                    loadPieChart("question9", xValues, yValues, colors);


                    //Question 11
                    xValues = ["Keine", "Studien- und Berufsmessen", "Berufsberatung", "Univeranstalltungen", "Praktika", "Girls‘Day", "Institut für Jugendmanagement"];
                    yValues = [36, 8, 8, 10, 7, 1, 1];
                    colors = [blue1, blue3, blue5, blue7, blue9, blue11, blue13];
                    loadBarChart("question11", xValues, yValues, colors);

                    
                    //Question 13
                    xValues = ["Ja", "Nein"];
                    yValues = [24, 39];
                    colors = [blue1, blue14];
                    loadPieChart("question13", xValues, yValues, colors);

                    break;
                case 'Q1':
                    document.getElementById("dropdown-text").innerHTML = "Q1 <i class='fa-solid fa-caret-down' id='dropdown-icon'></i>";

                    //Question 1
                    var xValues = ["Q1"];
                    var yValues = [26];
                    var colors = [blue1];
                    loadPieChart("question1", xValues, yValues, colors);


                    //Question 2
                    xValues = ["Biologie", "Englisch", "Mathe", "Sozialwissenschaften", "Deutsch", "Pädagogik", "Religionslehre", "Erdkunde", "Französisch", "Chemie", "Kunst", "Geschichte", "Spanisch", "Physik"];
                    yValues = [9, 7, 7, 6, 6, 5, 3, 3, 2, 2, 1, 1];
                    colors = [blue1, blue2, blue3, blue4, blue5, blue6, blue7, blue8, blue9, blue10, blue11, blue12, blue13];
                    loadBarChart("question2", xValues, yValues, colors);
                    

                    //Question 3
                    xValues = ["Ja", "Eventuell", "Nein"];
                    yValues = [8, 5, 4];
                    colors = [blue1, blue7, blue13];
                    loadBarChart("question3", xValues, yValues, colors);


                    //Question 4
                    xValues = ["Ja", "Nein"];
                    yValues = [25, 1];
                    colors = [blue1, blue14];
                    loadPieChart("question4", xValues, yValues, colors);


                    //Question 5
                    document.getElementById("question5").src = '../../svg/question5-q1.svg';


                    //Question 6
                    xValues = ["Konkrete Pläne", "Einige Vorstellungen", "Erste Ideen", "Bisher noch nicht"];
                    yValues = [1, 15, 8, 2];
                    colors = [blue1, blue5, blue9, blue13];
                    loadBarChart("question6", xValues, yValues, colors);


                    //Question 7
                    xValues = ["Ja", "Teilweise", "Nein"];
                    yValues = [13, 12, 1];
                    colors = [blue1, blue7, blue14];
                    loadPieChart("question7", xValues, yValues, colors);


                    //Question 8
                    xValues = ["1/10", "2/10", "3/10", "4/10", "5/10", "6/10", "7/10", "8/10", "9/10", "10/10"];
                    yValues = [0, 0, 2, 4, 2, 3, 7, 4, 3, 1];
                    colors = [blue1, blue3, blue4, blue5, blue6, blue8, blue9, blue10, blue11, blue13];
                    loadBarChart("question8", xValues, yValues, colors);


                    //Question 9
                    var xValues = ["Teilweise", "Nein", "Ja"];
                    var yValues = [14, 10, 2];
                    var colors = [blue1, blue7, blue14];
                    loadPieChart("question9", xValues, yValues, colors);


                    //Question 11
                    xValues = ["Keine", "Studien- und Berufsmessen", "Berufsberatung", "Univeranstalltungen", "Praktika", "Girls‘Day", "Institut für Jugendmanagement"];
                    yValues = [15, 3, 3, 4, 4, 0, 1];
                    colors = [blue1, blue3, blue5, blue7, blue9, blue11, blue13];
                    loadBarChart("question11", xValues, yValues, colors);


                    //Question 13
                    xValues = ["Ja", "Nein"];
                    yValues = [5, 21];
                    colors = [blue1, blue14];
                    loadPieChart("question13", xValues, yValues, colors);

                    break;
                case 'Q2':
                    document.getElementById("dropdown-text").innerHTML = "Q2 <i class='fa-solid fa-caret-down' id='dropdown-icon'></i>";

                    //Question 1
                    var xValues = ["Q2"];
                    var yValues = [37];
                    var colors = [blue1];
                    loadPieChart("question1", xValues, yValues, colors);


                    //Question 2
                    xValues = ["Mathe", "Biologie", "Englisch", "Sozialwissenschaften", "Erdkunde", "Physik", "Chemie", "Kunst", "Religionslehre", "Geschichte", "Deutsch", "Pädagogik", "Spanisch", "Französisch"];
                    yValues = [18, 11, 10, 7, 7, 5, 5, 3, 3, 2, 2, 1];
                    colors = [blue1, blue2, blue3, blue4, blue5, blue6, blue7, blue8, blue9, blue10, blue11, blue12, blue13];
                    loadBarChart("question2", xValues, yValues, colors);
                    

                    //Question 3
                    xValues = ["Ja", "Eventuell", "Nein"];
                    yValues = [11, 1, 7];
                    colors = [blue1, blue7, blue13];
                    loadBarChart("question3", xValues, yValues, colors);


                    //Question 4
                    xValues = ["Ja", "Nein"];
                    yValues = [32, 5];
                    colors = [blue1, blue14];
                    loadPieChart("question4", xValues, yValues, colors);


                    //Question 5
                    document.getElementById("question5").src = '../../svg/question5-q2.svg';


                    //Question 6
                    xValues = ["Konkrete Pläne", "Einige Vorstellungen", "Erste Ideen", "Bisher noch nicht"];
                    yValues = [13, 12, 11, 1];
                    colors = [blue1, blue5, blue9, blue13];
                    loadBarChart("question6", xValues, yValues, colors);


                    //Question 7
                    xValues = ["Ja", "Teilweise", "Nein"];
                    yValues = [25, 12, 0];
                    colors = [blue1, blue7, blue14];
                    loadPieChart("question7", xValues, yValues, colors);


                    //Question 8
                    xValues = ["1/10", "2/10", "3/10", "4/10", "5/10", "6/10", "7/10", "8/10", "9/10", "10/10"];
                    yValues = [2, 1, 4, 2, 3, 5, 5, 8, 9, 0];
                    colors = [blue1, blue3, blue4, blue5, blue6, blue8, blue9, blue10, blue11, blue13];
                    loadBarChart("question8", xValues, yValues, colors);


                    //Question 9
                    var xValues = ["Teilweise", "Nein", "Ja"];
                    var yValues = [18, 17, 2];
                    var colors = [blue1, blue7, blue14];
                    loadPieChart("question9", xValues, yValues, colors);


                    //Question 11
                    xValues = ["Keine", "Studien- und Berufsmessen", "Berufsberatung", "Univeranstalltungen", "Praktika", "Girls‘Day", "Institut für Jugendmanagement"];
                    yValues = [19, 5, 5, 6, 3, 1, 0];
                    colors = [blue1, blue3, blue5, blue7, blue9, blue11, blue13];
                    loadBarChart("question11", xValues, yValues, colors);


                    //Question 13
                    xValues = ["Ja", "Nein"];
                    yValues = [19, 18];
                    colors = [blue1, blue14];
                    loadPieChart("question13", xValues, yValues, colors);

                    break;
            }
        }


        function destroy() {
            if(currentCharts.length > 0) {
                for(i = 0; i < currentCharts.length; i++) {
                    currentCharts[i].destroy();
                }
            }
        }

        function loadPieChart(id, xValues, yValues, colors) {
            var chart = new Chart(id, {
              type: "pie",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: colors,
                  data: yValues
                }]
              }
            });
            currentCharts.push(chart);
        }

        function loadBarChart(id, xValues, yValues, barColors) {
            var chart = new Chart(id, {
              type: "bar",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
                options: {
                    legend: {display: false},
                    scales: {yAxes: [{ticks: {beginAtZero: true}}]}
                }
            });
            currentCharts.push(chart);
        }

    </script>

    <script>
        var blue1 = "rgb(56,54,160)";
        var blue2 = "rgb(63,62,166)";
        var blue3 = "rgb(69,69,173)";
        var blue4 = "rgb(76,77,179)";
        var blue5 = "rgb(83,85,185)";
        var blue6 = "rgb(89,93,192)";
        var blue7 = "rgb(96,100,198)";
        var blue8 = "rgb(102,108,205)";
        var blue9 = "rgb(109,116,211)";
        var blue10 = "rgb(116,124,217)";
        var blue11 = "rgb(122,131,224)";
        var blue12 = "rgb(124,134,226)";
        var blue13 = "rgb(127,136,228)";
        var blue14 = "rgb(129,139,230)";

        //on page load
        window.onload = load();

        function dropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
        }

        function load() {
            loadResults("all");
            document.getElementById("dropdown-text").innerHTML = "Jahrgang <i class='fa-solid fa-caret-down' id='dropdown-icon'></i>";
        }

    </script>



</html>
    
