<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login_index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>tekst bubbels</title>
    <link rel="stylesheet" href="css/bubbles-index-style.css">

    <link rel="icon" type="image/x-icon" href="media/soundoff-sport-website-favicon-white.png">
    <link rel="stylesheet" href="css/main.css">
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

<!--hero-->
<div id="scroll3" class="hero3">
    <div class="hero3-text">
        <h1><b>tekst bubbels</b></h1>
        <p>samen staan we sterk in een groep.</p>
    </div>
</div>

<!--alinea-->

    <main>


    <section>

        <div class="textbox">
            <p>Voor dove mensen kan communiceren lastig zijn, maar tekstbubbels op het scherm bieden een oplossing.
                Door tekst te typen en te delen op een scherm, kan er een dialoog ontstaan.
                Dit helpt dove mensen om zich te uiten en te begrijpen wat er gezegd wordt.</p>
        </div>

        <div class="card-container">
            <div class="card">
                <div class="card-lines"></div>
                <div class="card-imgBx">
                    <img src="media/microphone.png">
                </div>
                <div class="card-content">
                    <div class="card-details">
                        <h2>Spreker</h2>
                        <p>op deze pagina kunt u tekst bubbels creëren en selecteren.</p>
                        <a href="speaker-bubbles.php">Klik Hier</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-lines"></div>
                <div class="card-imgBx">
                    <img src="media/Speaker.png">
                </div>
                <div class="card-content">
                    <div class="card-details">
                        <h2>luisteraar</h2>
                        <p>op deze pagina komen alle doorgestuurde tekst bubbels van de spreker pagina.</p>
                        <a href="#">Klik Hier</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

</body>
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
</html>