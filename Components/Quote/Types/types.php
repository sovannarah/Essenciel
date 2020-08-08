<?php
    var_dump($_SESSION['types']);
    var_dump($_SESSION['ceremony']);
?>
<h2>Je fais appel à vous pour </h2>
<div id="ctn-btn-lieu">
    <?php
    $contents = json_decode(file_get_contents($GLOBALS["ip"] . "src/Pages/Quote/request.json"));
    foreach ($contents[0]->types as $content) {
        ?>
        <button name="types" class="quote-input <?php if (isset($_SESSION["types"]) && $_SESSION["types"] == $content->id) {
            echo "select-choice";
        } ?>" value="<?php echo $content->id; ?>">
            <img src="<?php $GLOBALS["ip"] ?>assets/png-x2/<?php echo $content->img ?>.svg" alt=""/>
            <div>
                <span><?php echo $content->key; ?>.</span> <?php echo $content->text; ?></div>
            <?php if (isset($content->add)) {
                echo "<div class='add-price-quote'>" .
                    "<img src='" . $GLOBALS["ip"] . "assets/png-x2/euroinacircle.svg' alt=''/><span>+"
                    . $content->add .
                    "</span></div>";
            } ?>
        </button>
    <?php } ?>
</div>
<div id="ctn-types-next">
<!--<div id="ctn-quote-input" >-->
<!--    <label id="question-ceremony">Souhaitez-vous organiser une cérémonie ?</label>-->
<!--    <div id="ctn-checkbox-quote">-->
<!--        <div>-->
<!--            <input name="ceremony" value="0" class="quote-input ceremony-input" type="checkbox" id="ceremony-0">-->
<!--            <label for="ceremony-0">Oui</label>-->
<!--            <div class='add-price-quote'>-->
<!--                <img src='http://192.168.1.18/Essenciel/assets/png-x2/euroinacircle.svg' alt=''/>-->
<!--                <span>+ 300</span>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div>-->
<!--            <input name="ceremony" value="1" class="quote-input ceremony-input" type="checkbox" id="ceremony-1">-->
<!--            <label for="ceremony-1">Non</label>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</div>