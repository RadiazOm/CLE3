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
    if (isset($_GET['id'])) {
        $data = getDrawingInfoDetails();
    } else {
        $data = getDrawingInfo();
    }
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