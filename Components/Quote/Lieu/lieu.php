<?php
//session_unset();
    var_dump($_SESSION["location"]);
    var_dump($_SESSION["etablishment_address"]);
?>

<h2>Où se trouve le défunt?</h2>
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
<div id="ctn-quote-input">
    <label for="establishment_address">Dans quel établissement se trouve-t-il?</label>
    <input id="establishment_address" class="text-field" name="etablishment_address" placeholder="Nom de l'établissement..." type="text"/>
</div>