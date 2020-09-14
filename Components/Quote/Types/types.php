<?php

//var_dump($_SERVER["HTTP_REFERER"]);
//if(isset($_SESSION["type"]) && $_SESSION["type_option_answer"]) {
//    if ($_SESSION['type'] && $_SESSION['type_option_answer']) {

?>
    <h2>Je fais appel à vous pour </h2>
    <div id="ctn-choice">
        <div id="ctn-btn-lieu">
            <?php
            $res = $GLOBALS["bdd"]->query('SELECT * FROM types');
            while ($data = $res->fetch()) {
                ?>
                <button name="type"
                        class="quote-input <?php if (isset($_SESSION["type"]) && $_SESSION["type"] == $data["id_type"]) {
                            echo "select-choice";
                        } ?>" value="<?php echo $data["id_type"]; ?>">
                    <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/<?php echo $data["img_type"] ?>.svg" alt=""/>
                    <span>
                        <span><?php echo $data["letter_key"]; ?>.</span> <?php echo $data["type"]; ?></span>
                    <?php if (isset($data["add_price_type"])) {
                        echo "<span class='add-price-quote'>" .
                            "<img src='" . $GLOBALS["ip"] . "assets/png-x2/euroinacircle.svg' alt=''/><span>+"
                            . $data["add_price_type"] .
                            "</span></span>";
                    } ?>
                </button>
                <?php
            }
            $res->closeCursor();
            ?>
        </div>
        <span id="error-type" class="error-choice d-none">*Choix requis</span>
    </div>
    <div id="ctn-types-next">
    </div>

<?php
//    } else {
//        ?><!--<script>window.history.back()</script> --><?php
//    }
//} else {
//    ?><!--<script>window.history.back()</script> --><?php
//}
//?>