<?php
$contents = json_decode(file_get_contents($GLOBALS["ip"] . "src/Pages/Quote/request.json"));
?>

<div id="ctn-quote-input">
    <h2>Quelles sont vos coordonnées?</h2>
    <div class="row-mor-def">
        <label for="civi">Civilité<span>*</span></label>
        <select id="civi" name="civi" class="select">
            <option value="" class="select-placeholder" disabled selected hidden>Madame, Monsieur...</option>
            <?php
            foreach ($contents[0]->civility as $civility) {
                ?>
                <option value="<?php echo $civility->id; ?>"><?php echo $civility->text; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="row-mor-def">
        <h5>Comment vous appelez-vous ?</h5>
        <div class="row-def-inputs">
            <div class="ctn-field">
                <label for="def-last-name">Nom</label>
                <input id="last-name" name="last-name" class="text-field" placeholder="Nom" type="text"/>
            </div>
            <div class="ctn-field">
                <label for="def-first-name">Prénom</label>
                <input id="first-name" name="first-name" class="text-field" placeholder="Prénom" type="text"/>
            </div>
        </div>
    </div>
    <div class="row-mor-def">
        <h5>Où pouvons nous vous joindre?  </h5>
        <div>
            <div class="row-def-inputs column">
                <div>
                    <label for="def-link">Téléphone</label>
                    <input type="text" class="text-field" name="number" placeholder="06...">
                </div>
                <div>
                    <label for="def-link">E-mail</label>
                    <input type="text" class="text-field" name="email" placeholder="e-mail@email.com...">
                </div>
            </div>
        </div>
    </div>
</div>