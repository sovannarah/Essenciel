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

if(isset($_POST["total"])) {
    var_dump("ENCULER!!!");
    $_SESSION["total"] = $_POST["total"];
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
    $type_option_answer = isset($_SESSION["type_option_answer"]) ? $_SESSION["type_option_answer"] : 0;
    if($type_option_answer > 2) {
        $type_option_answer  = $_SESSION["type_option_answer"]  - 2;
    }
    $location = isset($_SESSION["location"]) ? $_SESSION["location"] : 0;
    $type = isset($_SESSION["type"]) ? $_SESSION["type"] : 0;
    $req = "SELECT * FROM formule WHERE id_location = '" . $location . "' AND id_type= '" . $type ."' AND id_type_option_answer = '" . $type_option_answer . "'";
    $res = $bdd->query($req);
    echo json_encode($res->fetch());
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
    $valid = [];
    foreach ($_POST["redirect"] as $keys) {
        if($keys !== "") {
            if (!isset($_SESSION[$keys])) {
                $valid[] = $keys;
            }
        }
    }
    echo json_encode($valid);
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