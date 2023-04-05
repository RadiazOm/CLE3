<?php
include_once '../webservice/includes/dbh_include.php';

// check if data was sent from the login form
if (!isset($_POST['username'], $_POST['password']) ) {
    // could not get data
    exit('Voer a.u.b allebei de velden in');
}

// bereid de SQL voor, de SQL statement en vermeid SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM user WHERE username = ?')) {
    // bind parameter
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // sla de resultaten op zodat we kunnen checken of de user bestaat in de database
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // account bestaat, verify nu het password
        if (password_verify($_POST['password'], $password)) {
            // verification succes! user is ingelogd
            //maak nu een session
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            echo 'Welkom ' .$_SESSION['name'] . '!';
            header('Location: ../index.php');
        } else {
            // incorrect password
            echo 'incorrect password/username!';
        }
    } else {
        // incorrect username
        echo 'incorrect password/username!';
    }

    $stmt->close();
}
?>