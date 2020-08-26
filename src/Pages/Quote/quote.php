<?php
$r = json_decode(file_get_contents(__DIR__ . "/request.json"));
$tabUrl = explode("/", $_SERVER["REQUEST_URI"]);
//session_unset();
?>

<section id="quote">
    <div id="ctnQuote">
        <?php
        if ($tabUrl[count($tabUrl) - 1] !== "contact" && $tabUrl[count($tabUrl) - 2] !== "contact") {
            ?>
            <ul id="navQuote">
                <?php
                $contents = json_decode(file_get_contents(__DIR__ . "/pages.json"));
                foreach ($contents as $content) {
                    ?>
                    <li>
                        <a class="btn-nav-quote <?php if ($tabUrl[3] === $content->page) {
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
                <li class="n-help">
                    <a href="<?php echo $GLOBALS["ip"]; ?>contact">
                        <span><strong>Besoin d'aide ?</strong><br/>Être contacté
                    </span>
                    </a>
                </li>
            </ul>
        <?php } ?>
        <div class="<?php
        if ($tabUrl[count($tabUrl) - 1] === "contact") { echo "contact-form"; }
        if($tabUrl[count($tabUrl) - 2] === "contact") { echo "ml-auto"; }
        ?>">
            <div id="formQuote">
                <?php
                if ($tabUrl[count($tabUrl) - 1] !== "contact") {
                    include("Components/Quote/" . ucfirst($tabUrl[count($tabUrl) - 1]) . "/" . $tabUrl[count($tabUrl) - 1] . ".php");
                } else {
                    include("Components/Quote/Info/info.php");
                }
                ?>
            </div>
            <?php
            if ($tabUrl[count($tabUrl) - 1] !== "contact" && $tabUrl[count($tabUrl) - 1] !== "valide") {
                ?>

                <div id="footer-quote-form">
                    <div id="ctn-step">
                        <?php
                        $steps = json_decode(file_get_contents(__DIR__ . "/steps.json"));
                        $nbStep = 0;
                        $active = "active-step-bar";
                        for ($i = 0; $i < count($steps); $i++) {
                            $step = $steps[$i];
                            ?>
                            <div class="step-bar <?php echo $active; ?>"></div>
                            <?php
                            if ($step->url === $tabUrl[count($tabUrl) - 1]) {
                                $nbStep = $i + 1;
                                $active = "";

                            }
                        }
                        echo "<span>Étapes " . $nbStep . "/5</span>";
                        ?>
                    </div>
                    <div id="ctn-step-info">
                        <p>*Essenciel est dédié aux familles endeuillées confrontées à un décès, qui ont choisi des
                            obsèques
                            civiles, survenu à : Paris, et dans les villes suivantes : Boulogne-Billancourt, Créteil,
                            Issy
                            les
                            Moulineaux, Ivry-sur-Seine, Le Kremlin Bicêtre, Saint-Mandé,  Villejuif.</p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div id="ctnInfoPrice">
            <?php
            if ($tabUrl[count($tabUrl) - 1] !== "contact" && $tabUrl[count($tabUrl) - 1] !== "valide") {
                ?>
                <div class="info-price">
                    <h3>Montant total</h3>
                    <span class="bg-option">de votre devis</span>
                    <strong class="price-quote price">
                        <?php
                        $type_option_answer = isset($_SESSION["type_option_answer"]) ? $_SESSION["type_option_answer"] : 0;
                        if ($type_option_answer > 2) {
                            $type_option_answer = $_SESSION["type_option_answer"] - 2;
                        }
                        $location = isset($_SESSION["location"]) ? $_SESSION["location"] : 0;
                        $type = isset($_SESSION["type"]) ? $_SESSION["type"] : 0;
                        $req = "SELECT * FROM formule WHERE id_location = '" . $location . "' AND id_type= '" . $type . "' AND id_type_option_answer = '" . $type_option_answer . "'";
                        $res = $GLOBALS["bdd"]->query($req)->fetch();
                            echo $res["total"];
                        ?>
                        <span class="euro">€</span>
                    </strong>
                </div>
                <?php
            }
            if ($_SERVER['REQUEST_URI'] === "/Essenciel/quote/info") {
                ?>

                <button id="submit-form" class="btn-redirect-blue">
                    <span>Valider</span>
                    <img src="<?php echo $GLOBALS["ip"] ?>assets/png-x2/fl-w.svg" />
                </button>

            <?php } else if ($tabUrl[count($tabUrl) - 1] === "contact") { ?>
                <button id="submit-form-contact" class="btn-redirect-blue">
                    <span>Valider</span>
                    <img src="<?php echo $GLOBALS["ip"] ?>assets/png-x2/fl-w.svg" />
                </button>
            <?php } else if ($tabUrl[count($tabUrl) - 1] === "valide") { ?>
                <button id="end-quote-form" value="<?php echo $tabUrl[count($tabUrl) - 1]; ?>"
                        class="btn-redirect-blue">
                    <span>Terminé</span>
                    <img src="<?php echo $GLOBALS["ip"] ?>assets/png-x2/fl-w.svg" />
                </button>
            <?php } else { ?>
                <button id="next-quote-form" value="<?php echo $tabUrl[count($tabUrl) - 1]; ?>"
                        class="btn-redirect-blue">
                    <span>Suivant</span>
                    <img src="<?php echo $GLOBALS["ip"] ?>assets/png-x2/fl-w.svg" />
                </button>
            <?php } ?>
        </div>
    </div>
</section>
