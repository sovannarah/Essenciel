<?php
session_start();
//session_unset();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Essenciel';

try {
    $bdd = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST["total"])) {
    $_SESSION["total"] = $_POST["total"];
}

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["type_options"])) {
    $res = $bdd->query("SELECT * FROM type_option WHERE id_type=" . $_POST["type_options"]);
    $data = $res->fetch();
    $res->closeCursor();
    $resAns = $bdd->query("SELECT * FROM type_option_answer WHERE id_type_option = " . $data["id_type_option"]);
    $data["answers"] = [];
    $index = 0;
    while ($dataAns = $resAns->fetch()) {
        $data["answers"][$index] = $dataAns;
        $index++;
    }
//    var_dump($data);
    echo json_encode($data);
    $resAns->closeCursor();

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

if (isset($_POST["getQuote"])) {
    $req = "SELECT * FROM devis WHERE id=" . $_POST["getQuote"];
    $res = $bdd->query($req);
    $query = $bdd->prepare('INSERT INTO archives (id, etablishment_address, id_accompaniment, id_civility_def, last_name_def, first_name_def, id_link, id_civility, last_name,first_name, phone_number, email, id_formule, message)
  			  VALUES(:id, :etablishment_address, :id_accompaniment, :id_civility_def, :last_name_def, :first_name_def, :id_link, :id_civility, :last_name, :first_name, :phone_number, :email, :id_formule, :message)');
    while ($data = $res->fetch()) {
        $query->execute(array(
            'id' => $data["id"],
            'etablishment_address' => $data["etablishment_address"],
            'id_accompaniment' => $data["id_accompaniment"],
            'id_civility_def' => $data["id_civility_def"],
            'last_name_def' => $data["last_name_def"],
            'first_name_def' => $data["first_name_def"],
            'id_link' => $data["id_link"],
            'id_civility' => $data["id_civility"],
            'last_name' => $data["last_name"],
            'first_name' => $data["first_name"],
            'phone_number' => $data["phone_number"],
            'email' => $data["email"],
            'id_formule' => $data["id_formule"],
            'message' => $data["message"]
        ));
    }
    $delReq = "DELETE FROM devis WHERE id=" . $_POST["getQuote"];
    $delQuery = $bdd->query($delReq);
    $delQuery->execute();

}

if (isset($_POST["search_quote"])) {
    $req = "";
    $search = "";
    $filterType = "";
    $filterAccompaniment = "";
    $filterStatus = "";
    $where = "";
    if ($_POST["search_quote"]["search"] || $_POST["search_quote"]["id_type"] || $_POST["search_quote"]["id_accompaniment"] || $_POST["search_quote"]["id_status"]) {
        $where = "WHERE ";
    }
    if ($_POST["search_quote"]["search"]) {
        $search = "CONCAT(
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
        ) LIKE '%" . $_POST["search_quote"]["search"] . "%' ";
    }
    if ($_POST["search_quote"]["id_type"]) {
        $filterType = "id_type='" . $_POST["search_quote"]["id_type"] . "' ";
    }
    if ($_POST["search_quote"]["id_accompaniment"]) {
        $filterAccompaniment = "id_accompaniment='" . $_POST["search_quote"]["id_accompaniment"] . "' ";
    }
    if ($_POST["search_quote"]["id_status"]) {
        $filterStatus = "id_type='" . $_POST["search_quote"]["id_status"] . "' ";
    }
    $filter = $filterType . $filterAccompaniment . $filterStatus;

    $filter = str_replace(" ", " AND ", $filter);
    $filter = substr($filter, 0, -4);
    $comb = "";
    if ($filter !== "" && $search !== "") {
        $comb = " AND ";
    }
    $combineFilter = $filter . $comb . $search;
    $req = "SELECT * FROM " . $_POST["search_quote"]["table"] . " NATURAL JOIN formule NATURAL JOIN accompaniments NATURAL JOIN  civilities NATURAL JOIN links NATURAL JOIN location NATURAL JOIN civilities_def " . $where . $combineFilter;
//    var_dump($req);

    $data = [];
    $res = $bdd->query($req);
    while ($r = $res->fetch()) {
        $data[] = $r;
    }
    echo json_encode($data);
}

if (isset($_POST["formContact"])) {
    try {
        $idCivility = $_SESSION["civi"];
        $lastName = $_SESSION["last_name"];
        $firstName = $_SESSION["first_name"];
        $phoneNumber = $_SESSION["phone_number"];
        $email = $_SESSION["email"];
        $query = $bdd->prepare('INSERT INTO contacts (id_civility, last_name ,first_name, phone_number, email)
  			  VALUES(:id_civility, :last_name, :first_name, :phone_number, :email)');
        $query->execute(array(
            'id_civility' => $idCivility,
            'last_name' => $lastName,
            'first_name' => $firstName,
            'phone_number' => $phoneNumber,
            'email' => $email,
        ));
        echo "success";
    } catch (PDOException $e) {
        echo ('Erreur : ' . $e->getMessage());
    }
}

if (isset($_POST["form"])) {

    try {
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
        $query = $bdd->prepare('INSERT INTO devis (etablishment_address, id_accompaniment, id_civility_def, last_name_def, first_name_def, id_link, id_civility, last_name,first_name, phone_number, email, id_formule, message)
  			  VALUES(:etablishment_address, :id_accompaniment, :id_civility_def, :last_name_def, :first_name_def, :id_link, :id_civility, :last_name, :first_name, :phone_number, :email, :id_formule, :message)');
        $query->execute(array(
            'etablishment_address' => $etablishmentAddress,
            'id_accompaniment' => $idAccompaniment,
            'id_civility_def' => $idCivilityDef,
            'last_name_def' => $lastNameDef,
            'first_name_def' => $firstNameDef,
            'id_link' => $idLink,
            'id_civility' => $idCivility,
            'last_name' => $lastName,
            'first_name' => $firstName,
            'phone_number' => $phoneNumber,
            'email' => $email,
            'id_formule' => $idFormule,
            'message' => $message
        ));
        echo "success";
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

}

if (isset($_POST["getFormule"])) {
    $req = "SELECT id_formule FROM formule WHERE id_formule = " . $_POST["getFormule"];
    $res = $bdd->query($req);
    $results = [];
    while ($formule = $res->fetch()) {
        $reqCat = "SELECT * FROM prestation_category";
        $resCat = $bdd->query($reqCat);
        while ($cat = $resCat->fetch()) {
            $results[$cat["prestation_category"]] = [];
        }
        $reqPrest = "SELECT * FROM prestations NATURAL JOIN prestation NATURAL JOIN prestation_category WHERE prestations.id_formule = " . $formule["id_formule"];
        $resPres = $GLOBALS["bdd"]->query($reqPrest);

        while ($data = $resPres->fetch()) {
            $results[$data["prestation_category"]][] = $data;
        }
    }
    echo json_encode($results);
}
?>