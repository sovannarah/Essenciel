<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Essenciel';

try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST["type_options"])) {
    $res = $bdd->query("SELECT * FROM type_option WHERE id_type = " . $_POST["type_options"]);
    $data = $res->fetch();
    $res->closeCursor();
    $resAns = $bdd->query("SELECT * FROM type_option_answer WHERE id_type_option = " . $data["id_type_option"]);
    $data["answers"] = [];
    $index = 0;
    while($dataAns = $resAns->fetch()) {
        $data["answers"][$index] = $dataAns;
        $index++;
    }
    $resAns->closeCursor();
    echo json_encode($data);

}

if(isset($_POST["amount"])) {
    if($_SESSION["type_option_answer"] > 2) {
        $_SESSION["type_option_answer"]  = $_SESSION["type_option_answer"]  - 2;
    }
    $res = $bdd->query("SELECT * FROM formule WHERE id_location = " . $_SESSION["location"] . " AND id_type= " . $_SESSION['type'] ." AND id_type_option_answer = " . $_SESSION['type_option_answer']);
//    $_SESSION["total"] = $res->fetch()["total"];
    echo json_encode($res->fetch());
}

if (isset($_POST["total"])) {
    echo $_SESSION['total'];
}

if(isset($_POST["type_option_answer"])) {
    if(isset($_SESSION["type_option_answer"])) {
        echo $_SESSION["type_option_answer"];
    }
}

if (isset($_POST["type"])) {
    echo $_SESSION['type'];
}

if(isset($_POST["redirect"])) {
    $valid = true;
    foreach ($_POST["redirect"] as $keys) {
        if($keys !== "") {
            if (!isset($_SESSION[$keys])) {
                var_dump($keys);
                $valid = false;
            }
        }
    }
    echo $valid;
}


if(isset($_POST["form"])) {


//    $lieu  = ["lieu"];
//    $etablishment  = ["etablishment_address"];
//    $types  = ["types"];
//    $ceremony  = ["ceremony"];
//    $accompaniment  = ["accompaniment"];
//    $cividef  = ["civi_def"];
//    $lastNameDef = ["last-name_def"];
//    $firstNameDef  = ["first_name_def"];
//    $defLink  = ["def_link"];
//    $civi = ["civi"];
//    $lastName = ["last_name"];
//    $firstName  = ["first_name"];
//    $phoneNumber  = ["phone_number"];
//    $email  = ["email"];
//    $query = "INSERT INTO users (lieu,etablishment-address, types, ceremony, accompaniment, civi-def, last-name-def, first-name-def, def-link, civi, last-name, first-name, phone-number, email)
//  			  VALUES('$lieu','$etablishment','$types','$ceremony','$accompaniment','$cividef','$lastNameDef','$firstNameDef','$defLink','$civi','$lastName','$firstName','$phoneNumber' ,'$email')";
//mysqli_query($db, $query);
}
?>