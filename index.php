<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Essenciel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/styles/header.css" />
        <link rel="stylesheet" href="assets/styles/headerResponsive.css" />
        <link rel="stylesheet" href="assets/styles/prestations.css" />
        <link rel="stylesheet" href="assets/styles/prestationsResponsive.css" />
        <link rel="stylesheet" href="assets/styles/pricesGrid.css" />
        <link rel="stylesheet" href="assets/styles/quoteForm.css" />
        <link rel="stylesheet" href="assets/styles/footer.css" />
        <link rel="stylesheet" href="assets/styles/about.css" />
        <link rel="stylesheet" href="assets/styles/concept.css" />
        <link rel="stylesheet" href="assets/styles/help.css" />
        <link rel="stylesheet" href="assets/styles/quote.css" />
        <link rel="stylesheet" href="assets/styles/lieu.css" />
        <link rel="stylesheet" href="assets/styles/devis.css" />
        <link rel="stylesheet" href="assets/styles/more.css" />
        <link rel="stylesheet" href="index.css" />
        <link rel="stylesheet" href="responsive.css" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;s700;900&display=swap" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
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
        $router->get("/quote/:lieu", function($lieu) {include('src/Pages/Quote/quote.php');});
//        $router->get('/quote/types', function() {include('src/Pages/Quote/quote.php');});
        $router->run();
        ?>
    </body>
    <?php include("server.php") ?>
    <?php include("Components/QuoteForm/quoteForm.php"); ?>
    <?php include("Components/Footer/footer.php") ?>
</html>
