<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <!-- Styles -->

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://codeandscale.com/wp-content/uploads/2021/11/admin-ajax.png" alt=""
                    width="200">
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row" id="form-nbr-joueurs">
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="nbr_joueur" class="form-label">Nombre des Joueurs</label>
                                <input type="number" class="form-control" id="nbr_joueur" name="nbr_joueur"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-6">
                                <button style="margin-top: 30px" class="btn  btn-success" id="btn-jrs-valider">
                                    Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4" id="form-score">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="joueur-id">Joueurs : </label>
                        <select class="form-control form-select" name="joueur-id" id="joueur-id">
                            <option value="1">Joueur N° 1</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="frame-id">Frame : </label>
                        <select class="form-control form-select" name="frame-id" id="frame-id">
                            <option value="1">Frame 1</option>
                            <option value="2">Frame 2</option>
                            <option value="3">Frame 3</option>
                            <option value="4">Frame 4</option>
                            <option value="5">Frame 5</option>
                        </select>
                    </div>
                    <div class="col-4 mt-3">
                        <label class="form-label" for="lancer">Lancer</label>
                        <select class="form-control form-select" name="lancer-id" id="lancer-id">
                            <option value="a">Lancer N° 1</option>
                            <option value="b">Lancer N° 2</option>
                            <option value="c">Lancer N° 3</option>
                            <option value="d">Lancer N° 4</option>
                        </select>
                    </div>
                    <div class="col-4 mt-3">
                        <label class="form-label" for="nbr-quille">Nombre de quilles touchées</label>
                        <input class="form-control" type="number" name="nbr-quille" id="nbr-quille">
                    </div>
                    <div class="col-4 mt-3">
                        <button class="btn btn-success" style="margin-top: 30px" id="btn-score"> Valider</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4" id="show-score">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Score des Joueurs</h5>
                    </div>
                    <div class="card-body" id="joueur-id-container">
                        <h5>Joueur N° 1</h5>
                        <table class="table table-bordered table-responsive text-center" id="joueur-id-1">
                            <thead>
                                <tr>
                                    <th colspan="3">1</th>
                                    <th colspan="3">2</th>
                                    <th colspan="3">3</th>
                                    <th colspan="3">4</th>
                                    <th colspan="4">5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="frame-1a">.</td>
                                    <td id="frame-1b">.</td>
                                    <td id="frame-1c">.</td>
                                    <td id="frame-2a">.</td>
                                    <td id="frame-2b">.</td>
                                    <td id="frame-2c">.</td>
                                    <td id="frame-3a">.</td>
                                    <td id="frame-3b">.</td>
                                    <td id="frame-3c">.</td>
                                    <td id="frame-4a">.</td>
                                    <td id="frame-4b">.</td>
                                    <td id="frame-4c">.</td>
                                    <td id="frame-5a">.</td>
                                    <td id="frame-5b">.</td>
                                    <td id="frame-5c">.</td>
                                    <td id="frame-5d">.</td>
                                </tr>
                                <tr>
                                    <td colspan="3" id="frame-1-score">0</td>
                                    <td colspan="3" id="frame-2-score">0</td>
                                    <td colspan="3" id="frame-3-score">0</td>
                                    <td colspan="3" id="frame-4-score">0</td>
                                    <td colspan="4" id="frame-5-score">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#form-score").hide();
            $("#show-score").hide();

            $("#btn-jrs-valider").click(function() {
                var nbr_joueur = $("#nbr_joueur").val();
                var selectBox = $("#joueur-id");
                selectBox.empty();

                for (let i = 1; i <= nbr_joueur; i++) {
                    let option = $("<option>").attr("value", i).text("Joueur N° " + i);
                    selectBox.append(option);
                }

                $("#form-score").show();
                $("#show-score").show();
                $("#form-nbr-joueurs").hide();

                for (let i = 2; i <= nbr_joueur; i++) {
                    let table = $("#joueur-id-1").clone();
                    table.attr("id", "joueur-id-" + i);
                    $("#joueur-id-container").append("<h5>Joueur N° " + i + "</h5>");
                    $("#joueur-id-container").append(table);
                }
            });
        });

        $("#btn-score").click(function() {
            var joueurId = $("#joueur-id").val();
            var frameId = $("#frame-id").val();
            var lancerId = $("#lancer-id").val();
            var nbrQuille = parseInt($("#nbr-quille").val());

            var table = document.getElementById("joueur-id-" + joueurId);
            if (table) {
                var cell = table.querySelector("#frame-" + frameId + "" + lancerId);
                if (cell.textContent != ".") {

                    alert("Vous avez déjà lancé cette quille");

                } else {

                    var totalScoreOfFrame = CheckValueOfFrame(frameId,joueurId);

                    if( (totalScoreOfFrame == 15 || (nbrQuille + totalScoreOfFrame) > 15) && frameId < 5 ){
                        alert("La totalité d'une frame ne doit pas dépasser le 15 !");
                    }else{
                        if(frameId < 5 ){
                            if(nbrQuille == 15 && lancerId == 'a'){
                                cell.textContent = 'X'
                            }
                            if((nbrQuille + totalScoreOfFrame) == 15 && lancerId != 'a'){
                                cell.textContent = '/'
                            }
                            if((nbrQuille + totalScoreOfFrame) < 15){
                                cell.textContent = nbrQuille;
                            }
                        }else{

                            if(nbrQuille == 15 && lancerId == 'a'){
                                cell.textContent = 'X'
                            }
                            if(totalScoreOfFrame == 15 && lancerId != 'a' && nbrQuille == 15){
                                cell.textContent = '/'
                            }

                            if(totalScoreOfFrame == 15 && lancerId != 'a' && nbrQuille < 15){
                                cell.textContent = nbrQuille;
                            }
                        }
                        var valeursFrames = GetValueAllFrames(joueurId);
                        GetScore(valeursFrames)
                    }
                }
            } else {
                console.log("Table not found");
            }
        });

        function GetValueAllFrames(joueurId) {
            var frames = {};
            var table = document.getElementById("joueur-id-" + joueurId);
            for (var i = 1; i <= 5; i++) {
                frames[i] = [];
                for (var j = 1; j <= 4; j++) {
                    var tdId = '#frame-' + i + String.fromCharCode(96 + j);

                    var tdValue = table.querySelector(tdId).textContent;

                    var value = (tdValue == "X" || tdValue == "/") ? 15 : tdValue;
                    value = (tdValue == "." ) ? 0 : value;

                    frames[i].push(parseInt(value));

                    j = (i<5 && j ==3)? 5 : j
                }
            }
            return frames;
        }

        function CheckValueOfFrame(frame,joueurId){
            var sum = 0;
            var table = document.getElementById("joueur-id-" + joueurId);
            for (var j = 1; j <= 4; j++) {
                var tdId = '#frame-' + frame + String.fromCharCode(96 + j);

                var tdValue = table.querySelector(tdId).textContent;

                var value = (tdValue == "X" || tdValue == "/") ? 15 : tdValue;
                value = (tdValue == "." ) ? 0 : value;

                sum += parseInt(value);

                j = (frame<5 && j ==3)? 5 : j
            }

            return (sum > 15) ? 15 : sum;
        }

        function GetScore(data){
            $.ajax({
                url: '{{ route("getscore") }}',
                method: 'GET',
                data: {
                    data: data,
                },
                success: function(data) {
                    console.log(data);
                    for(var i=0; i<data.length; i++){
                        var id = "#frame-" + (i+1) + "-score"
                        var joueurId = $("#joueur-id").val();
                        var table = document.getElementById("joueur-id-" + joueurId);
                        var cell = table.querySelector(id);
                        cell.textContent = data[i];
                    }
                },
                error:function(error) {
                    alert(error);
                }
            });
        }
    </script>
</body>

</html>
