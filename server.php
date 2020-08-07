<?php
session_start();
if (isset($_POST['getReq'])) {
    echo json_decode(file_get_contents('http://192.168.1.18/Essenciel/src/Pages/request.json'));
}

if (isset($_POST["total"])) {
    echo $_SESSION['total'];
}

if(isset($_POST["ceremony"])) {
    echo $_SESSION["ceremony"];
}

if (isset($_POST["types"])) {
    echo $_SESSION['types'];
}

if(isset($_POST["redirect"])) {
    $valid = true;
    foreach ($_POST["redirect"] as $keys) {
        if(!isset($_SESSION[$keys])) {
            $valid = false;
        }
    }
    echo $valid;
}

?>