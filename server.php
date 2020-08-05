<?php

if (isset($_POST['getReq'])) {
    echo json_decode(file_get_contents('http://192.168.1.18/Essenciel/src/Pages/request.json'));
}

if (isset($_POST["lieu"])) {
    echo $_SESSION["lieu"] = $_POST["lieu"];
}
?>