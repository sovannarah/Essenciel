<?php
$id_choice = "<script>document.write(form.types)</script>";
?>

<h2>De quel manière souhaitez-vous<br/> être accompagné</h2>
<div id="ctn-btn-lieu">
    <?php
    $contents = json_decode(file_get_contents("http://192.168.1.18/Essenciel/src/Pages/Quote/request.json"));
    foreach ($contents[0]->accompaniment as $content) {
        ?>
        <button name="accompaniment" class="quote-input <?php if ($id_choice == $content->id) {
            echo "select-choice";
        } ?>" value="<?php echo $content->id; ?>">
            <img src="http://192.168.1.18/Essenciel/assets/png-x2/<?php echo $content->img ?>.svg" alt=""/>
            <div>
                <?php echo $content->text; ?></div>
            <?php if (isset($content->add)) {
                echo "<div class='add-price-quote'>" .
                    "<img src='http://192.168.1.18/Essenciel/assets/png-x2/euroinacircle.svg' alt=''/><span>+"
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
        <select id="civi-def">
            <option value="" class="select-placeholder" disabled selected hidden>Madame, Monsieur...</option>
            <option>test</option>
        </select>
    </div>
    <div class="row-mor-def">
        <h5>Comment s’appellait-il.elle?</h5>
        <div class="row-def-inputs">
            <div>
                <label for="def-last-name">Nom</label>
                <input id="def-last-name" placeholder="Nom du défunt..." type="text"/>
            </div>
            <div>
                <label for="def-first-name" >Prénom</label>
                <input id="def-first-name" placeholder="Prénom du défunt..." type="text"/>
            </div>
        </div>
    </div>
    <div class="row-mor-def">
        <h5>Quel est votre lien avec le.la défunt.e? </h5>
        <div>
            <div class="row-def-inputs">
                <div>
                    <label for="def-link">Lien</label>
                    <select id="def-link">
                        <option value="" class="select-placeholder" disabled selected hidden>Conjoint, Soeur...</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>