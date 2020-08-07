<h2>Où se trouve le défunt?</h2>
<div id="ctn-btn-lieu">
    <?php
    $contents = json_decode(file_get_contents("http://192.168.1.18/Essenciel/src/Pages/Quote/request.json"));
    foreach ($contents[0]->lieu as $content) {
        ?>
        <button name="lieu" value="<?php echo $content->id; ?>"
                class="quote-input <?php if (isset($_SESSION["lieu"]) && $_SESSION["lieu"] == $content->id) {
                    echo "select-choice";
                } ?>">
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
    <label for="establishment-address">Dans quel établissement se trouve-t-il?</label>
    <input id="establishment-address" placeholder="Nom de l'établissement..." type="text"/>
</div>