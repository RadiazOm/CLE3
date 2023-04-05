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

function getDrawingInfo() {
    return[
        // title
        "drawingTitle" => "Tekenhulpmiddel uitgelegd",
    // kleuren kiezen
        "chooseColor" => "Met de kleuren in de rondjes rechts onderin kan je de kleur kiezen waar je mee wilt tekenen. Als je op een kleur klikt, is je brush voortaan die kleur totdat je op een andere klikt.",
    // clear knop
        "clearCanvas" => "Met de clear-knop kan je je canvas leeg maken. Als je hier op drukt, verdwijnt alles dat je hebt getekent en kan je helemaal overnieuw beginnen.",
    // save knop
        "saveCanvas" => "Met de save-knop kan je je notitie/tekening opslaan. Je slaat dan een png bestand op op je apparaat. Zo gaat je kunstwerk nooit meer weg!",
    //favoriet knop
        "favCanvas" => "Als je op de favoriet knop drukt, blijft je pagina hetzelfde als je hem herlaadt. Op deze manier ben je niet oppeens heel je tekening kwijt, terwijl je er nog mee bezig bent!",

    ];
}

function getBubblesInfo(){
    // pak alle data uit de user tabel
    require_once "dbh_include.php";
    $query ="SELECT * FROM bubbles";
    $result = mysqli_query($con, $query)
    or die('ERROR: ' . mysqli_error($con). 'with query ' . $query);


    $bubbles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $bubbles[] = $row;
    }
    return $bubbles;
}



function getSportInfoDetails() {
    return [
        //general
        "Heb je een auditieve beperking en wil je toch sporten. wekelijks sporten 29% van de Nederlanders met een auditieve beperking.",

        //populair
        "Wil je een sport oefenen en weet je niet wat. Dit zijn de meest populaire sporten: atletiek, zwemmen, bowling, fietsen, golf, judo, schieten, schaken, squash, volleybal en tennis",

        //communication
       "Tijdens sporten is het communiceren heel belangrijk zowel voor mensen met beperkingen en mensen zonder beperkingen",

    ];

}

