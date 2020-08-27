

<section id="help">
    <div id="help-stn-1">
        <h2>Comment se déroule <br/> <span>l’organisation d’obsèques ?</span></h2>
        <ul>
            <li>
                <span class="number">01</span>
                <h3>Contactez <br/> nous</h3>
                <p>
                    <span>Contactez nous</span> <br/>
                    via notre site internet /
                    <span class="txt-info">Établissez  <br/> votre devis.</span>
                </p>
            </li>
            <li>
                <span class="number">02</span>
                <h3>Gérer l'organisation<br/>d'obsèques depuis chez vous</h3>
                <p>
                    Nous sommes <span>en contact <br/> par courriel, par téléphone.</span>
                </p>
            </li>
            <li>
                <span class="number">03</span>
                <h3>Gérer l'organisation<br/>d'obsèques dans notre agence</h3>
                <p>
                    <span>Nous nous rencontrons </span>
                    dans notre <br/>
                    bureau, à 200 mètres de la place de la <br/>
                    République
                </p>
            </li>
        </ul>
    </div>
    <?php
    $contents = json_decode(file_get_contents(__DIR__ . "/content.json"));
    foreach ($contents as $content) {
        ?>
        <div class="help-row help-side-<?php echo $content->side ?>"">
        <div class="help-row-main-content">
            <div class="help-ctn-mrg">
                <?php
                echo "<h2>" . $content->title . "</h2>";
                if (isset($content->text)) {
                    echo "<p>" . $content->text . "</p>";
                } else {
                    echo "<label>" . $content->label . "</label>";
                    echo "<ul>";
                    foreach ($content->list as $elem) {
                        echo "<li>" . $elem . "</li>";
                    }
                    echo "</ul>";
                }
                ?>
            </div>
        </div>
        <div class="help-row-img-content">
            <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/<?php echo $content->img ?>.webp"
                 alt=""/>
            <?php if (isset($content->bubbleText)) {
                echo "<p class='bubble'>" . $content->bubbleText . "</p>";
            } ?>
        </div>
        </div>
    <?php } ?>
    <div
    <div id="ctn-help-slider">
        <button id="btn-slider-help-prev">
        <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/fl.svg" />
        </button>
        <div id="hide-slider-help">
            <div id="slider-help">
                <?php
                $contents = json_decode(file_get_contents(__DIR__ . "/sliderContent.json"));
                foreach ($contents as $content) {
                    ?>
                    <div class="elem-slide-help">
                        <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/slide-help/<?php echo $content->img; ?>.webp" alt=""/>
                        <span><?php echo $content->text; ?></span>
                        <a href>Ouvrir</a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <button id="btn-slider-help-next">
            <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/fl.svg" />
        </button>
    </div>
</section>