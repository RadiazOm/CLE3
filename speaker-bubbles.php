<?php
// je moet altijd eerst een session maken, gebruik daarom altijd deze code
session_start();
// als de user niet is ingelogd wordt hij altijd gestaart naar de login pagina
if (!isset($_SESSION['loggedin'])) {
    header('location: http://localhost/doof-project/login_index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bubbles-index-style.css">
  <link rel="icon" type="image/x-icon" href="media/soundoff-sport-website-favicon-white.png">
  <script src="js/bubbles.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

<main>

    <div class="bubble-container" id="bubble-container">
        <div class="bubble bubble-bottom-left" id="bubble-create">
            <a href="#"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>

    <!--    modal    -->
    <div class="bg-modal" >
        <div class="modal-content">
            <div class="close">+</div>
            <img src="media/soundoff-sport-website-favicon-black.png" alt="logo">

            <form action="" id="modal-form">
                <input type="text" id="input-field" placeholder="Vul hier tekst in">
                <input type="submit" value="Submit" id="submit" class="modal-submit">
                <input type="submit" value="delete" id="delete" class="modal-delete">
            </form>
        </div>
    </div>

</main>

</body>
</html>