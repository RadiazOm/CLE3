<?php
//Require functions for actions
require_once "includes/actions.php";

$data = 'API is not working';

if ($_GET['webservice'] == 'translator') {
    $data = getSignLibrary();
}

if ($_GET['webservice'] == 'info') {
    if ($_GET['id'] === 'General'){
        $data = 'no function yet';
    } else if ($_GET['id'] === 'Popular'){
        $data = ':/';
    }
    else if ($_GET['id'] === 'Communication'){
        $data = ':/';
    }
    else{
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