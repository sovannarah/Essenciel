<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Essenciel';

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', 'root', '');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST["total"])) {
    var_dump("ENCULER!!!");
    $_SESSION["total"] = $_POST["total"];
}

if (isset($_POST["type_options"])) {
    $res = $bdd->query("SELECT * FROM type_option WHERE id_type = " . $_POST["type_options"]);
    $data = $res->fetch();
    $res->closeCursor();
    $resAns = $bdd->query("SELECT * FROM type_option_answer WHERE id_type_option = " . $data["id_type_option"]);
    $data["answers"] = [];
    $index = 0;
    while ($dataAns = $resAns->fetch()) {
        $data["answers"][$index] = $dataAns;
        $index++;
    }
    $resAns->closeCursor();
    echo json_encode($data);

}

if (isset($_POST["amount"])) {
    $type_option_answer = isset($_SESSION["type_option_answer"]) ? $_SESSION["type_option_answer"] : 0;
    if ($type_option_answer > 2) {
        $type_option_answer = $_SESSION["type_option_answer"] - 2;
    }
    $location = isset($_SESSION["location"]) ? $_SESSION["location"] : 0;
    $type = isset($_SESSION["type"]) ? $_SESSION["type"] : 0;
    $req = "SELECT * FROM formule WHERE id_location = '" . $location . "' AND id_type= '" . $type . "' AND id_type_option_answer = '" . $type_option_answer . "'";
    $res = $bdd->query($req);
    echo json_encode($res->fetch());
}


if (isset($_POST["type_option_answer"])) {
    if (isset($_SESSION["type_option_answer"])) {
        echo $_SESSION["type_option_answer"];
    }
}

if (isset($_POST["type"])) {
    echo $_SESSION['type'];
}

if (isset($_POST["redirect"])) {
    $valid = [];
    foreach ($_POST["redirect"] as $keys) {
        if ($keys !== "") {
            if (!isset($_SESSION[$keys])) {
                $valid[] = $keys;
            }
        }
    }
    echo json_encode($valid);
}


if (isset($_POST["search_quote"])) {
    $req = "";
    if ($_POST["search_quote"] !== "") {
        $req = "SELECT * FROM devis NATURAL JOIN formule NATURAL JOIN accompaniments NATURAL JOIN  civilities NATURAL JOIN links NATURAL JOIN location NATURAL JOIN civilities_def WHERE CONCAT(
etablishment_address,
last_name_def,
first_name_def,
last_name,
first_name,
phone_number,
email,
message,
createdAt,
id_type_option_answer,
total,
accompaniment,
civility,
link,
location,
civility_def
) LIKE '%" . $_POST["search_quote"] . "%'";
    } else {
        $req = "SELECT * FROM devis NATURAL JOIN formule NATURAL JOIN accompaniments NATURAL JOIN  civilities NATURAL JOIN links NATURAL JOIN location NATURAL JOIN civilities_def";
    }
    $data = [];
    $res = $bdd->query($req);
    while ($r = $res->fetch()) {
        $data[] = $r;
    }
    echo json_encode($data);
}


if (isset($_POST["form"])) {

    var_dump($_SESSION);

    $etablishmentAddress = $_SESSION["etablishment_address"];
    $idAccompaniment = $_SESSION["accompaniment"];
    $idCivilityDef = $_SESSION["civi_def"];
    $lastNameDef = $_SESSION["last_name_def"];
    $firstNameDef = $_SESSION["first_name_def"];
    $idLink = $_SESSION["def_link"];
    $idCivility = $_SESSION["civi"];
    $lastName = $_SESSION["last_name"];
    $firstName = $_SESSION["first_name"];
    $phoneNumber = $_SESSION["phone_number"];
    $email = $_SESSION["email"];
    $idFormule = $_SESSION["formule"];
    $message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
    $query = "INSERT INTO users (etablishment_address, id_accompaniment, id_civility_def, last_name_def, first_name_def, id_link, id_civility, last_name,first_name, phone_number, email, id_formule, message)
  			  VALUES('$etablishmentAddress','$idAccompaniment','$idCivilityDef','$lastNameDef','$firstNameDef','$idLink','$idCivility','$lastName','$firstName','$phoneNumber','$email','$idFormule' ,'$message')";
    mysqli_query($bdd, $query);
}
?>