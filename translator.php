<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="js/translator.js"></script>
    <script src="js/nav.js"></script>
    <script src="https://kit.fontawesome.com/aa25eb13aa.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar">
    <img src="media/soundoff-sport-website-favicon-white.png" alt="" class="logo" id="nav-button">
    <div class="nav-popup box-orange" id="nav-popup">
        <a href="bubbles-index.php"><img src="media/img1.jpg" alt="" class="img-link"></a>
        <a href="translator.php"><img src="media/img2.jpg" alt="" class="img-link"></a>
        <a href="drawingtool.php"><img src="media/img3.jpg" alt="" class="img-link"></a>
        <a href="sport.php"><img src="media/img4.jpg" alt="" class="img-link"></a>
        <a href="index.php"><img src="media/soundoff-sport-website-favicon-white.png" class="img-link" alt=""></a>
    </div>
</nav>

<h1 class="text-2 text-center">Vertaler</h1>

<div class="flex-between container">
    <div class="box-blue container">
        <textarea rows="10" placeholder="Enter text here" id="input" class="field-blue input-field"></textarea>
    </div>
    <div class="box-blue container">
        <div id="translated" class="field-blue flex-row flex-wrap"></div>
    </div>
</div>

<div>
    <div class="flex-center container">
        <button id="button" class="button">Go!</button>
    </div>

    <div class="flex-center container">
        <button id="save" class="button">Opslaan</button>
    </div>
</div>

<div class="flex-around container">
    <div class="container half">
        <div class="box-blue container">
            <div class="field-blue" id="quick-buttons">
                <!-- Place for the quick buttons to appear -->
            </div>
        </div>
    </div>
    <div class="container half">
        <div class="box-blue container">
            <div class="field-blue flex-around">
                <button class="button" id="gif"> Change to GIF</button>
                <input type="range" min="100" max="2000" value="1000" class="slider" id="speed">
            </div>
        </div>
    </div>
</div>

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