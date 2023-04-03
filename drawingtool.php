

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Visual communication tool</title>
</head>
<body>
<nav class="navbar">
    <img src="media/soundoff-sport-website-favicon-white.png" alt="" class="logo" id="nav-button">
    <div class="nav-popup box-orange" id="nav-popup">
        <a href="bubbles-index.php"><img src="media/img1.jpg" alt="" class="img-link"></a>
        <a href="translator.php"><img src="media/img2.jpg" alt="" class="img-link"></a>
        <a href="drawingtool.html"><img src="media/img3.jpg" alt="" class="img-link"></a>
        <a href="sport.php"><img src="media/img4.jpg" alt="" class="img-link"></a>
    </div>
</nav>

<h1 class="text-2 text-center">Notitie tool</h1>
<div class="pocket">
<div class="wrappercanvas"><canvas id="canvas"></canvas></div>
<div class="colornav">
    <!-- We will be accessing the data-color in JavaScript -->
    <div class="color" data-color="#ffffff"></div>
    <div class="color" data-color="#3FAEFA"></div>
    <div class="color" data-color="#CC7B2B"></div>
    <div class="color" data-color="#FDC601"></div>
    <div class="color" data-color="#383961"></div>
    <button class="clear drawing-button">clear</button>
    <button class="save drawing-button">save</button>
    <button class="fav drawing-button" id="fav">favorite</button>
</div>
</div>
<script src="js/canvas.js"></script>
</body>
</html>
