
<h2>Où se trouve le défunt?</h2>

<div id="ctn-choice">
<div id="ctn-btn-lieu">
    <?php
    $res = $GLOBALS["bdd"]->query('SELECT * FROM location');
    while($data = $res->fetch()) {
        ?>
        <button name="location" value="<?php echo $data["id_location"]; ?>"
                class="quote-input <?php if (isset($_SESSION["location"]) && $_SESSION["location"] == $data["id_location"]) {
                    echo "select-choice";
                } ?>">
            <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/<?php echo $data["img_location"]; ?>.svg" alt=""/>
            <div>
                <span><?php echo $data["letter_key"]; ?>.</span> <?php echo $data["location"]; ?></div>
            <?php if (isset($data["price_add"])) {
                echo "<div class='add-price-quote'>" .
                    "<img src='" . $GLOBALS["ip"] . "assets/png-x2/euroinacircle.svg' alt=''/><span>+ "
                    . $data["price_add"] .
                    "€</span></div>";
            } ?>
        </button>
    <?php
    }
    $res->closeCursor();
    ?>
    </div>
    <span id="error-location" class="error-choice d-none">*Choix requis</span>
</div>
<div id="ctn-quote-input">
    <label for="establishment_address">Dans quel établissement se trouve-t-il?</label>
    <input id="establishment_address" class="text-field" name="etablishment_address" placeholder="<?php
    if (isset($_SESSION["etablishment_address"]) && $_SESSION["etablishment_address"] !== "") {
        echo $_SESSION["etablishment_address"];
    } else {
        echo "Nom de l'établissement...";
    }
    ?>" type="text"/>
    <span id="error-etablishment_address" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
</div>