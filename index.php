<?php
session_start();
if (!isset($_SESSION["prices"])) {
    $_SESSION["prices"] = [];
}


if (!isset($_SESSION["total"])) {
    $_SESSION["total"] = 0;
}

if (isset($_SESSION["total"]) && isset($_SESSION["prices"])) {
    $_SESSION["total"] = array_sum($_SESSION["prices"]);
}

$GLOBALS["ip"] = "http://192.168.1.18/Essenciel/";

$tabUrl = explode("/", $_SERVER["REQUEST_URI"]);

$lastParams = $tabUrl[count($tabUrl) - 1];

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Essenciel';


try
{
    // On se connecte à MySQL
    $GLOBALS["bdd"] = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Essenciel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/headerResponsive.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/prestations.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/header.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/prestationsResponsive.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/pricesGrid.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/pricesGridResponsive.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/footer.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/about.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/aboutResponsive.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/quoteForm.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/quoteFormResponsive.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/concept.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/conceptResponsive.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/help.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/helpResponsive.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/quote.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/quoteResponsive.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/lieu.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/devis.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/more.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>assets/styles/admin.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>index.css"/>
    <link rel="stylesheet" type='text/css' href="<?php echo $GLOBALS["ip"]; ?>responsive.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;s700;900&display=swap" rel="stylesheet"/>

</head>
<body id="main">
<?php
require "vendor/autoload.php";
include("Components/Header/header.php");


$router = new App\Router\Router($_GET['url']);


$router->post("/quote/:key", function ($key) {
//    if ($key === "total") {
//        $_SESSION["prices"][key($_POST[$key])] = $_POST[$key][key($_POST[$key])];
//        $_SESSION["total"] = array_sum($_SESSION["prices"]);
//    } else {
    var_dump($key);
        $_SESSION[$key] = $_POST[$key];
//    }
});


$router->get('/', function () {
});
$router->get('/prestations', function () {
    include('src/Pages/Prestations/prestations.php');
});
$router->get('/concept', function () {
    include('src/Pages/Concept/concept.php');
});
$router->get('/a-propos', function () {
    include('src/Pages/About/about.php');
});
$router->get('/aide', function () {
    include('src/Pages/Help/help.php');
});
$router->get('/admin', function () {
    include('src/Pages/Admin/admin.php');
});
$router->get("/quote/:lieu", function ($lieu) {
    include('src/Pages/Quote/quote.php');
});

$router->run();
?>
<?php
if ($lastParams !== "admin") {
    include("Components/QuoteForm/quoteForm.php");
} ?>
<?php include("Components/Footer/footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>-->
<script type="text/javascript" src="<?php echo $GLOBALS["ip"]; ?>script.js"></script>
</body>
</html>
