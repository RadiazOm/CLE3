

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tekenuitleg</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="js/drawingexplained.js"></script>
    <script src="js/nav.js"></script>
</head>
<body>

<nav class="navbar">
    <img src="media/soundoff-sport-website-favicon-white.png" alt="" class="logo" id="nav-button">
    <div class="nav-popup box-orange" id="nav-popup">
        <a href="bubbles-index.php"><img src="media/bubbleIcon.png" alt="" class="img-link"></a>
        <a href="translator.php"><img src="media/signIcon.png" alt="" class="img-link"></a>
        <a href="drawingtool.php"><img src="media/drawIcon.png" alt="" class="img-link"></a>
        <a href="sport.php"><img src="media/articleIcon.png" alt="" class="img-link"></a>
        <a href="index.php"><img src="media/soundoff-sport-website-favicon-white.png" class="img-link" alt=""></a>
    </div>
</nav>

<!--    Title    -->
<div id="title" class="text-center"> </div>


<div id="containerColorClear" class="flex-around align-center container">
    <div class="flex-column container">
        <!--kleuren kiezen-->
        <div>
            <h2 class="title">Kleuren kiezen</h2>
            <div class="box-blue">
                <p>
                <div id="chooseColor"></div>
                </p>
            </div>
        </div>

<!--        clear knop-->
        <div>
            <h2 class="title">Clear Knop</h2>
            <div class="box-blue">
                <p>
                <div id="clearCanvas"></div>
                </p>
            </div>
        </div>
    </div>
<!--    save knop-->
    <div class="flex-column container">
        <div>
            <div>
                <h2 class="title">Save knop</h2>
                <div class="box-blue">
                    <p>
                    <div id="saveCanvas"></div>
                    </p>
                </div>
            </div>
        </div>
        <div>
            <h2 class="title">Fav knop</h2>
            <div class="box-blue">
                <p>
                <div id="favCanvas"></div>
                </p>
            </div>
        </div>
    </div>

</div>


<!-- modal -->

<dialog class="modal" id="popup-canvas" >
    <div class="modal-content"></div>
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
