<?php
$r = json_decode(file_get_contents(__DIR__ . "/request.json"));
$tabUrl = explode("/", $_SERVER["REQUEST_URI"]);
var_dump($_SERVER["REQUEST_URI"])
?>

<section id="quote">
    <div id="ctnQuote">
        <ul id="navQuote">
            <?php
            $contents = json_decode(file_get_contents(__DIR__ . "/pages.json"));
            foreach ($contents as $content) {
                ?>
                <li>
                    <a
                    class="btn-nav-quote <?php if ($tabUrl[3] === $content->page) {
                        echo "active-nav-quote";
                    } ?>
                    id=" btn-nav-quote-<?php echo $content->page; ?>"
                    value="<?php echo $content->id; ?>" class="<?php if ($content->page === "lieu") {
                        echo 'active-nav-quote';
                    } ?>">
                    <span><?php echo $content->text; ?></span>
                    </a>
                </li>
            <?php } ?>
            <li>
                <a value="<?php echo $content->id; ?>">
                        <span><strong>Besoin d'aide ?</strong><br/>Être contacté
                    </span>
                </a>
            </li>
        </ul>
        <div id="formQuote">
            <?php
            include("Components/Quote/" . ucfirst($tabUrl[3]) . "/" . $tabUrl[3] . ".php");
            ?>
        </div>
        <div id="ctnInfoPrice">
            <div>
                <?php
                foreach ($_SESSION["prices"] as $key => $value) {
                    echo "<span class='d-none' id='info-price-hidden-" . $key . "'>" . $value . "</span>";
                }
                ?>
            </div>
            <div class="info-price">
                <h3>Montant total</h3>
                <span class="bg-option">de votre devis</span>
                <strong class="price-quote price">
                    <?php
                    if (!isset($_SESSION["total"])) {
                        echo "----";
                    } else {
                        echo $_SESSION["total"];
                    }
                    ?>
                    <span class="euro">€</span>
                </strong>
            </div>
        </div>
    </div>
    <div id="footer-quote-form">
        <div id="ctn-step">
            <p>*Essenciel est dédié aux familles endeuillées confrontées à un décès, qui ont choisi des obsèques
                civiles, survenu à : Paris, et dans les villes suivantes : Boulogne-Billancourt, Créteil, Issy les
                Moulineaux, Ivry-sur-Seine, Le Kremlin Bicêtre, Saint-Mandé,  Villejuif.</p>
        </div>
        <?php
        if($_SERVER['REQUEST_URI'] !== "/Essenciel/quote/info") {
            ?>

        <button id="next-quote-form" class="btn-redirect-blue">
            <span>Suivant</span>
        </button>
        <?php } else { ?>
            <button id="submit-form" class="btn-redirect-blue">
                <span>Valider</span>
            </button>
        <?php } ?>
    </div>
</section>