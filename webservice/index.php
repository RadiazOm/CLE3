<?php
//Require functions for actions
require_once "includes/actions.php";

$data = null;

//jeffrey's part
if ($_GET['webservice'] == 'translator') {
    $data = getSignLibrary();
}

//ricky's part
if ($_GET['webservice'] == 'info') {
    if (isset($_GET['id'])) {
        $data = getSportInfoDetails();
    } else {
        $data = getSportInfo();
    }
}

//dieuwe's part
if ($_GET['webservice'] == 'drawing') {
//Based on the existence of the GET parameter, 1 of the 2 functions will be called
    if (!isset($_GET['id'])) {
        $data = getDrawingInfo();
//    } else {
//        $data = getDishDetails($_GET['id']);
//    }

//Set the header & output JSON so the client will know what to expect.
    header("Content-Type: application/json");
    echo json_encode($data);
    exit;
}

//oliviers part
if ($_GET['webservice'] == 'bubbles') {
    $data = getBubblesInfo();
}

//Set the header & output JSON so the client will know what to expect.
header("Content-Type: application/json");
echo json_encode($data);

exit;
?>