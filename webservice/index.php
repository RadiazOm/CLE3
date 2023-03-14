<?php
//Require functions for actions
require_once "includes/actions.php";

switch ($_GET['id']) {
    case 1:
        $data = getSignLibrary();
        break;
    case 2:
        $data = getSportInfo();
        break;
    default:
        $data = "error, cannot find data";
}

//Set the header & output JSON so the client will know what to expect.
header("Content-Type: application/json");
echo json_encode($data);

exit;
?>