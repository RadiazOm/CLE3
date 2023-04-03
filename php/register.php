<?php
include_once '../webservice/includes/dbh_include.php';

// check of de data is doorgestuurd
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    // als je data niet krijgt wordt dit gestuurd
    exit('Maak het registratie formulier compleet a.u.b');
}
// check of de submit values niet leeg zijn
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
    // een of meer values zijn leeg
    exit('Maak het registratie formulier compleet a.u.b');
}

// check of de username bestaat
if ($stmt = $con->prepare('SELECT id, password FROM user WHERE username = ?')) {
    // email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        exit('email bestaat niet');
    }
    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
        exit('Username is not valid!');
    }
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        exit('Password must be between 5 and 20 characters long!');
    }
    // bind parameters
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    // store result om te zien of de user al bestaat
    if ($stmt->num_rows() > 0) {
        echo 'Username bestaat al, kies een andere naam.';
    } else {
        // username bestaat niet, maak een nieuw account aan
        if ($stmt = $con->prepare('INSERT INTO user (username, password, email) VALUES (?, ?, ?)')){
            // hash de passwords
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
            $stmt->execute();
            echo 'You have successfully registered, you can now login!';
        } else {
            // er is iets mis met de SQL
            echo 'kan de statement niet uitvoeren';
        }
    }
    $stmt->close();
    header('Location: http://localhost/doof-project/');
} else {
    // er is iets mis met de SQL
    echo 'kan de statement niet uitvoeren';
}
?>