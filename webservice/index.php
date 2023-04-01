<?php
//Require functions for actions
require_once "includes/actions.php";

$data = null;

if ($_GET['webservice'] == 'translator') {
    $data = getSignLibrary();
}

if ($_GET['webservice'] == 'info') {

    if (isset($_GET['id'])) {
        if ($_GET['id'] === 'General') {
            $data = getSportInfoDetails();
        } else if ($_GET['id'] === 'Popular') {
            $data = getSportInfoDetails();
        } else if ($_GET['id'] === 'Communication') {
            $data = getSportInfoDetails();
        } else {
            $data = getSportInfo();
        }
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