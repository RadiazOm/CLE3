<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="media/soundoff-sport-website-favicon-white.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Document</title>
    </head>



<body>



<div class="over-ons-container">
    <div class="ons-imgBx">
        <img src="media/logo-no-background.png" alt="logo">
    </div>
    <div class="ons-content">
        <p>Wij zijn Soundoff Sports, en het doel van onze website isom sporten net iets gemakkelijker te maken voor mensen met een auditieve beperking.
            Op onze website vind je een gebarentaal vertaler, een hulpmiddel voor lesgeven, een informatie pagina, en een teken- en notitiepagina.</p>
    </div>
</div>

<div class="container">
    <div class="icon">
        <div class="imgBx active" style="--i:1" data-id="content1">
            <img src="media/lesson.jpg">
        </div>
        <div class="imgBx" style="--i:2" data-id="content2">
            <img src="media/img2.jpg">
        </div>
        <div class="imgBx" style="--i:3" data-id="content3">
            <img src="media/sign-language.jpg">
        </div>
        <div class="imgBx" style="--i:4" data-id="content4">
            <img src="media/drawing.jpg">
        </div>
    </div>

    <div class="content">
        <div class="contentBx active" id="content1">
            <div class="card">
                <div class="imgBx1">
                    <img src="media/lesson.jpg">
                </div>
                <div class="textBx">
                    <h2>algemene info<br><span>Ricky</span></h2>
                    <button><a href="sport.php">klik hier</a></button>
                </div>
            </div>
        </div>

        <div class="contentBx" id="content2">
            <div class="card">
                <div class="imgBx1">
                    <img src="media/img2.jpg">
                </div>
                <div class="textBx">
                    <h2>Tekst bubbles<br><span>Olivier</span></h2>
                    <button><a href="bubbles-index.php">klik hier</a></button>
                </div>
            </div>
        </div>

        <div class="contentBx" id="content3">
            <div class="card">
                <div class="imgBx1">
                    <img src="media/sign-language.jpg">
                </div>
                <div class="textBx">
                    <h2>translator<br><span>Jeffery</span></h2>
                    <button><a href="translator.php">klik hier</a></button>
                </div>
            </div>
        </div>

        <div class="contentBx" id="content4">
            <div class="card">
                <div class="imgBx1">
                    <img src="media/drawing.jpg">
                </div>
                <div class="textBx">
                    <h2>Teken- en notitie hulpmiddel<br><span>Dieuwe</span></h2>
                    <button><a href="drawingtool.php">klik hier</a></button>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="login-container">
    <?php
    if (!isset($_SESSION['loggedin'])) {
        echo '<a href="login_index.php">Login</a>';;
    } else {
        echo '<div class="dropdown">
  <a class="dropbtn">User</a>
  <div class="dropdown-content">
    <a href="profile.php">profiel</a>
    <a href="php/logout.php">log uit</a>
  </div>';
    }
    ?>

</div>

<script src="js/script.js"></script>

</body>
</html>
