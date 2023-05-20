

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Visual communication tool</title>
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

<h1 class="text-2 text-center">Notitie tool</h1>

<!-- pocket for main part of webpage
(heb het zo genoemd zodat ik het kan aanpassen in de css zonder de anderen hun css aan te passen) -->
<div class="pocket">

    <!-- canvas in wrapper -->
    <div class="wrappercanvas"><canvas id="canvas"></canvas></div>

    <!-- class for navbar for picking color to draw with -->
    <div class="colornav">
        <!-- color buttons -->
        <!-- We will be accessing the data-color in JavaScript -->
        <div class="color" data-color="#ffffff"></div>
        <div class="color" data-color="#3FAEFA"></div>
        <div class="color" data-color="#CC7B2B"></div>
        <div class="color" data-color="#FDC601"></div>
        <div class="color" data-color="#383961"></div>
            <!-- other buttons -->
        <button class="clear drawing-button">clear</button>
        <button class="download drawing-button">download</button>
        <button class="fav drawing-button" id="fav">favorite</button>
        <button class="fav drawing-button" id="save">save</button>
    </div>

    <!-- button to get to the page where the drawing tool is explained -->
    <div class="otherdrawingtool">
        <button class="explained drawing-button"><a href="drawingtoolmagazine.php">Klik hier voor meer uitleg over het tekenhulpmiddel</button>
    </div>

    <!-- ruimte voor tekeningen opslaan op web ipv device -->
    <h2 class="text-2 text-center">Opgeslagen tekening</h2>
    <div class="wrappercanvas"><canvas id="canvas"></canvas></div>

</div>



<script src="js/canvas.js"></script>
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
