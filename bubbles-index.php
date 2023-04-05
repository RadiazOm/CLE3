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
    <script src="js/nav.js"></script>
</head>
<body>

<nav>
    <div class="rounded-edges" id="nav-button">
        <div class="circle">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <div id="popup">
        <div class="big-circle">
            <a href="page1" class="circle-link"></a>
            <a href="page1" class="circle-link"></a>
            <a href="page1" class="circle-link"></a>
            <a href="page1" class="circle-link"></a>
        </div>
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
</html>