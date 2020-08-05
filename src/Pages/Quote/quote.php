<?php
$r = json_decode(file_get_contents(__DIR__ . "/request.json"));
foreach ($r[0] as $key=>$value) {
    var_dump($key);
    if (isset($_SESSION[$key])) {
        $GLOBALS[$key] = $_SESSION[$key];
    }
}
?>

<section id="quote">
    <div id="ctnQuote">
        <ul id="navQuote">
            <?php
            $contents = json_decode(file_get_contents(__DIR__ . "/pages.json"));
            foreach ($contents as $content) {
                ?>
                <li>
                    <button id="btn-nav-quote-<?php echo $content->page; ?>" value="<?php echo $content->id; ?>" class="<?php if ($content->page === "lieu") {echo 'active-nav-quote';} ?>">
                        <span><?php echo $content->text; ?></span>
                    </button>
                </li>
            <?php } ?>
            <li>
                <button value="<?php echo $content->id; ?>">
                    <p>
                        <strong>Besoin d'aide ?</strong><br/><span>Être contacté
                    </span>
                </button>
            </li>
        </ul>
        <div id="formQuote">
            <?php
                include("Components/Quote/Lieu/lieu.php");
            ?>
        </div>
        <div id="ctnInfoPrice">
            <div class="info-price">
                <h3>Montant total</h3>
                <span class="bg-option">de votre devis</span>
                <strong class="price-quote price">
                    ----
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
        <button id="next-quote-form" class="btn-redirect-blue">
            <span>Suivant</span>
        </button>
    </div>
</section>