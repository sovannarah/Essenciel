<?php
session_start();

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'Essenciel';
// Try and connect using the info above.
$db = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

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
        if($keys !== "") {
            if (!isset($_SESSION[$keys])) {
                $valid = false;
            }
        }
    }
    echo $valid;
}


if(isset($_POST["form"])) {


    $lieu  = ["lieu"];
    $etablishment  = ["etablishment-address"];
    $types  = ["types"];
    $ceremony  = ["ceremony"];
    $accompaniment  = ["accompaniment"];
    $cividef  = ["civi-def"];
    $lastNameDef = ["last-name-def"];
    $firstNameDef  = ["first-name-def"];
    $defLink  = ["def-link"];
    $civi = ["civi"];
    $lastName = ["last-name"];
    $firstName  = ["first-name"];
    $phoneNumber  = ["phone-number"];
    $email  = ["email"];
    $query = "INSERT INTO users (lieu,etablishment-address, types, ceremony, accompaniment, civi-def, last-name-def, first-name-def, def-link, civi, last-name, first-name, phone-number, email) 
  			  VALUES('$lieu','$etablishment','$types','$ceremony','$accompaniment','$cividef','$lastNameDef','$firstNameDef','$defLink','$civi','$lastName','$firstName','$phoneNumber' ,'$email')";
mysqli_query($db, $query);
}
?>