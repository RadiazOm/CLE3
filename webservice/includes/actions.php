<?php

function getSignLibrary() {
    return [
        "a" => "a.png",
        "b" => "b.png",
        "c" => "c.png",
        "d" => "d.png",
        "e" => "e.png",
        "f" => "f.png",
        "g" => "g.png",
        "h" => "h.png",
        "i" => "i.png",
        "j" => "j.png",
        "k" => "k.png",
        "l" => "l.png",
        "m" => "m.png",
        "n" => "n.png",
        "o" => "o.png",
        "p" => "p.png",
        "q" => "q.png",
        "r" => "r.png",
        "s" => "s.png",
        "t" => "t.png",
        "u" => "u.png",
        "v" => "v.png",
        "w" => "w.png",
        "x" => "x.png",
        "y" => "y.png",
        "z" => "z.png",

    ];
}

function getSportInfo() {
    return[
        //Main title
        "mainTitle" => "Sporten",

        //general
        "firstParagraph" => "Heb je een auditieve beperking en wil je toch sporten. wekelijks sporten 29% van de Nederlanders met een auditieve beperking.",

        //populair
        "secondParagraph" => "Wil je een sport oefenen en weet je niet wat. Dit zijn de meest populaire sporten: atletiek, zwemmen, bowling, fietsen, golf, judo, schieten, schaken, squash, volleybal en tennis",

        //communication
        "thirdParagraph" => "Tijdens sporten is het communiceren heel belangrijk zowel voor mensen met beperkingen en mensen zonder beperkingen",

    ];
}

function getBubblesInfo(){
    // pak alle data uit de user tabel
    require_once "dbh_include.php";


    $id = $_SESSION['id'];

    $query ="SELECT * FROM bubbles WHERE user_id = '$id'";
    $result = mysqli_query($con, $query)
    or die('ERROR: ' . mysqli_error($con). 'with query ' . $query);


    $bubbles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $bubbles[] = $row;
    }
    return $bubbles;
}

