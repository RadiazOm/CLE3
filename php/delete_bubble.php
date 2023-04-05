<?php
require_once '../webservice/includes/dbh_include.php';
//@var array($sql);

// delete de data
$sql = "DELETE FROM bubbles WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql) === TRUE) {
    echo "Event deleted succesfully";
} else  {
    echo "Error deleting Event: " . mysqli_error($con);
}

// als de functie zijn werk heeft gedsaan stuurt het je weer terug naar de index pagina
header('Location: http://localhost/doof-project/speaker-bubbles.php');

mysqli_close();

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login_index.php');
    exit;
}

?>