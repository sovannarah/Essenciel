<?php
$id_choice = "<script>document.write(form.types)</script>";
var_dump($_SESSION["last-name-def"]);
var_dump($_SESSION["civi-def"]);
var_dump($_SESSION["def-link"]);
?>

<h2>De quel manière souhaitez-vous<br/> être accompagné</h2>
<div id="ctn-btn-lieu">
    <?php
    $contents = json_decode(file_get_contents($GLOBALS["ip"] . "src/Pages/Quote/request.json"));
    foreach ($contents[0]->accompaniment as $content) {
        ?>
        <button name="accompaniment"
                class="quote-input <?php if (isset($_SESSION["accompaniment"]) && $_SESSION["accompaniment"] == $content->id) {
                    echo "select-choice";
                } ?>" value="<?php echo $content->id; ?>">
            <img src="<?php $GLOBALS["ip"] ?>assets/png-x2/<?php echo $content->img ?>.svg" alt=""/>
            <div>
                <?php echo $content->text; ?></div>
            <?php if (isset($content->add)) {
                echo "<div class='add-price-quote'>" .
                    "<img src='" . $GLOBALS["ip"] . "assets/png-x2/euroinacircle.svg' alt=''/><span>+"
                    . $content->add .
                    "</span></div>";
            } ?>
        </button>
    <?php } ?>
</div>
<div id="ctn-quote-input">
    <h2>Quelles sont les informations sur le.la défunt.e ?</h2>
    <div class="row-mor-def">
        <label for="civi-def">Civilité<span>*</span></label>
        <select id="civi-def" name="civi-def" class="select">
            <option value="" class="select-placeholder" disabled selected hidden>Madame, Monsieur...</option>
            <?php
            foreach ($contents[0]->civility as $civility) {
                ?>
                <option value="<?php echo $civility->id; ?>"><?php echo $civility->text; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="row-mor-def">
        <h5>Comment s’appellait-il.elle?</h5>
        <div class="row-def-inputs">
            <div class="ctn-field">
                <label for="def-last-name">Nom</label>
                <input id="def-last-name" name="last-name-def" class="text-field" placeholder="Nom du défunt..." type="text"/>
            </div>
            <div class="ctn-field">
                <label for="def-first-name">Prénom</label>
                <input id="def-first-name" name="first-name-def" class="text-field" placeholder="Prénom du défunt..." type="text"/>
            </div>
        </div>
    </div>
    <div class="row-mor-def">
        <h5>Quel est votre lien avec le.la défunt.e? </h5>
        <div>
            <div class="row-def-inputs">
                <div>
                    <label for="def-link">Lien</label>
                    <select id="def-link" name="def-link" class="select">
                        <option value="" class="select-placeholder" disabled selected hidden>Conjoint, Soeur...</option>
                        <?php
                        foreach ($contents[0]->links as $link) {
                            ?>
                            <option value="<?php echo $link->id; ?>" class="select-placeholder">
                                <?php echo $link->text; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>