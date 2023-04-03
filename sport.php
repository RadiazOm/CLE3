<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sport</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="js/sport.js"></script>
</head>
<body>

<nav class="navbar">
    <img src="media/soundoff-sport-website-favicon-white.png" alt="" class="logo">
</nav>

<!--    Title    -->
<div id="titleSport" class="text-center"> </div>


<div id="containerSport" class="flex-around align-center container">
    <div class="flex-column container">
        <div>

            <!--    GeneralSport    -->

            <h2 class="title">Algemeen</h2>
            <div class="box-blue">
                <p>
                    <i class="fa-regular fa-magnifying-glass-plus" data-id="0"></i>

                <div id="generalSport"></div>

                </p>
            </div>
        </div>
        <div>

            <!--    PopularSport    -->

            <h2 class="title">Populair</h2>
            <div class="box-blue">
                <p>
                    <i class="fa-regular fa-magnifying-glass-plus" data-id="1"></i>
                <div id="popularSport"></div>
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <!--    CommunicationSport    -->


            <h2 class="title">Communicatie</h2>
            <div class="box-blue">
                <p>
                    <i class="fa-regular fa-magnifying-glass-plus" data-id="2"></i>
                <div id="communicationSport"></div>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- modal -->

<dialog class="modal" id="popup-sport" >
    <div class="modal-content"> </div>
    <button class="modal-close" id="modal-close">X</button>
</dialog>




<footer class="footer">
    <div class="container flex-around">
        <div class="box-orange align-center flex-wrap eight">
            <a href="https://github.com/fredsjr" target="_blank">
                <img src="media/github.png" alt="" class="logo">
            </a>
            <h3>Olivier</h3>
        </div>
        <div class="box-orange align-center flex-wrap eight">
            <a href="https://github.com/soapinmysight" target="_blank">
                <img src="media/github.png" alt="" class="logo">
            </a>
            <h3>Dieuwe</h3>
        </div>
        <div class="box-orange align-center flex-wrap eight">
            <a href="https://github.com/RadiazOm" target="_blank">
                <img src="media/github.png" alt="" class="logo">
            </a>
            <h3>Jeffrey</h3>
        </div>
        <div class="box-orange align-center flex-wrap eight">
            <a href="https://github.com/ikeetkip" target="_blank">
                <img src="media/github.png" alt="" class="logo">
            </a>
            <h3>Ricky</h3>
        </div>
    </div>
    <div class="text-center text-4">
        <span>
            © Jeffrey van Otterloo, Dieuwe van Rijnswou, Ricky Ng, Olivier Schell
        </span>
    </div>
</footer>

</body>
</html>