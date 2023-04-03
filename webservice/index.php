<?php
//Require functions for actions
require_once "includes/actions.php";

$data = null;

if ($_GET['webservice'] == 'translator') {
    $data = getSignLibrary();
}

if ($_GET['webservice'] == 'info') {
    if (isset($_GET['id'])) {
        $data = getSportInfoDetails();
    } else {
        $data = getSportInfo();
    }
}

if ($_GET['webservice'] == 'drawing') {

}

if ($_GET['webservice'] == 'bubbles') {

}

//Set the header & output JSON so the client will know what to expect.
header("Content-Type: application/json");
echo json_encode($data);

exit;
?>