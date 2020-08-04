<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Essenciel</title>
        <link rel="stylesheet" href="assets/styles/header.css" />
        <link rel="stylesheet" href="assets/styles/prestations.css" />
        <link rel="stylesheet" href="assets/styles/pricesGrid.css" />
        <link rel="stylesheet" href="assets/styles/quoteForm.css" />
        <link rel="stylesheet" href="assets/styles/footer.css" />
        <link rel="stylesheet" href="assets/styles/about.css" />
        <link rel="stylesheet" href="assets/styles/concept.css" />
        <link rel="stylesheet" href="assets/styles/help.css" />
        <link rel="stylesheet" href="index.css" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet" />
    </head>
    <body>
        <?php
        include("Components/Header/header.php");
        require "vendor/autoload.php";

        $router = new App\Router\Router($_GET['url']);

        $router->get('/', function() {});
        $router->get('/prestations', function() {
            include('src/Pages/Prestations/prestations.php');
        });
        $router->get('/concept', function() {include('src/Pages/Concept/concept.php');});
        $router->get('/a-propos', function() {include('src/Pages/About/about.php');});
        $router->get('/aide', function() {include('src/Pages/Help/help.php');});

        $router->run();
        ?>
    </body>

    <?php include("Components/QuoteForm/quoteForm.php"); ?>
    <?php include("Components/Footer/footer.php") ?>
</html>
