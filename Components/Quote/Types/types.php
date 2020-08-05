<?php
    $id_choice = "<script>document.write(form.types)</script>";
?>

<h2>Je fais appel à vous pour  </h2>
<div id="ctn-btn-lieu">
    <?php
    $contents = json_decode(file_get_contents("http://192.168.1.18/Essenciel/src/Pages/Quote/request.json"));
    foreach ($contents[0]->types as $content) {
        ?>
        <button name="types" class="quote-input <?php if($id_choice == $content->id) { echo "select-choice";} ?>" value="<?php echo $content->id; ?>">
            <img src="http://192.168.1.18/Essenciel/assets/png-x2/<?php echo $content->img ?>.svg" alt=""/>
            <div>
                <span><?php echo $content->key; ?>.</span> <?php echo $content->text; ?></div>
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
    <label for="establishment-address">Souhaitez-vous organiser une cérémonie ?</label>
    <div id="ctn-checkbox-quote">
        <div>
            <input name="ceremony" value="0" class="quote-input" type="checkbox" id="types-oui">
            <label for="types-oui">Oui</label>
            <div class='add-price-quote'>
                <img src='http://192.168.1.18/Essenciel/assets/png-x2/euroinacircle.svg' alt=''/>
                <span>+ 300</span>
            </div>
        </div>
        <div>
            <input name="ceremony" value="0" class="quote-input" type="checkbox" id="types-non">
            <label for="types-non">Non</label>
        </div>
    </div>
</div>