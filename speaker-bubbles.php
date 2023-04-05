<?php

include_once "webservice/includes/dbh_include.php";


if (!isset($_SESSION['loggedin'])) {
    header('Location: login_index.php');
    exit;
}


if (isset($_POST['submit'])) {

    // pak alle values
    $content = $_POST['content'];
    $userid = $_SESSION['id'];

    $sql = "INSERT INTO bubbles(content, user_id)
            VALUES ('$content', '$userid' )";
    mysqli_query($con, $sql);
    echo $sql;

    header("location: bubble_confirm.php");
}


//// pak alle data uit de user tabel
//$query ="SELECT * FROM user";
//$result = mysqli_query($con, $query)
//or die('ERROR: ' . mysqli_error($con). 'with query ' . $query);
//
//
//$bubbles =[];
//while ($row = mysqli_fetch_assoc($result)) {
//    $bubbles[] = $row;
//}
//
//// read the JSON file content
//$jsondata = file_exists('webservice/includes/bubbles.php');
//// convert JSON object to php array
//$data = json_decode($jsondata, true);
//
//// get all bubble details
//$id = $data['id'];
//$content = $data['content'];
//$userid = $data['user_id'];
//
//// insert into SQL table
//$sql = "INSERT INTO bubbles(id, content, user_id)
//        VALUES ('$id', '$content', $userid)";


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
    <script src="js/nav.js" ></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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

            <form action="" method="post" id="modal-form" class="form">
                <input type="text" name="content" id="input-field" placeholder="Vul hier tekst in">
                <input type="submit" name="submit" value="Submit" id="submit" class="modal-submit">
            </form>
            <form action="php/delete_bubble.php?id" method="post">
                <input type="hidden" name="id" value="" id="delete-id">
                <input type="submit" value="delete" id="delete" class="modal-delete">
            </form>
        </div>
    </div>

</main>

</body>
</html>