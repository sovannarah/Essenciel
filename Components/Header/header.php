<?php
$tabUrl = explode("/", $_SERVER["REQUEST_URI"]);
?>

<header id="header">
    <div id="ctn-header">
        <div id="ctn-logo">
            <img src="assets/png-x2/logo.png" alt="" />
            <a href="">Être contacté</a>
        </div>
        <div id="ctn-index">
            <div id="ctn-index-title">
                <?php
                    $titles = json_decode(file_get_contents(__DIR__ . "/titleHeader.json"));
                $tabUrl = explode("/", $_SERVER["REQUEST_URI"]);
                    foreach ($titles as $title) {
                        if($title->url == $tabUrl[count($tabUrl) - 1]) {
                ?>
                <h1><?php echo $title->title; ?></h1>
                <?php }} ?>

            </div>
            <div id="ctn-index-price">
                <div class="info-price">
                    <h3>Crémation</h3>
                    <span class="bg-option">sans cérémonie</span>
                    <strong class="price">1890<span class="euro">€</span></strong>
                </div>
                <div class="info-price">
                    <h3>Crémation</h3>
                    <span class="bg-option">avec cérémonie</span>
                    <strong class="price">2190<span class="euro">€</span></strong>
                </div>
                <div class="info-price">
                    <h3>Inhumation</h3>
                    <span class="bg-option">caveau existant</span>
                    <strong class="price">2190<span class="euro">€</span></strong>
                </div>
                <div class="info-price">
                    <h3>Inhumation</h3>
                    <span class="bg-option">pleine terre</span>
                    <strong class="price">2190<span class="euro">€</span></strong>
                </div>
            </div>
        </div>
    </div>
    <?php include("Menu/menu.php"); ?>
    <a href="/Essenciel/quote/lieu" id="ctn-action-header" class="btn-redirect-blue">
        <span>Établissez <br/> un devis</span>
    </a>
</header>