<section id="prestations">
    <span id="texteJQ"></span>
    <div id="prestations-banner" class="banner-double-img">
        <div id="prestations-banner-1">
            <h1>Cremation <br/> avec ou sans ceremonie <br/> de recueillement</h1>
        </div>
        <div id="prestations-banner-2">
            <h1>Inumation en caveau existant <br/> ou en pleine terre</h1>
        </div>
    </div>
    <div>
        <?php
        $contents = json_decode(file_get_contents(__DIR__ . "/content.json"));
        foreach ($contents as $content) {
            ?>
            <div class="prestation-row prestation-side-<?php echo $content->side ?>">
                <div class="prestation-row-main-content">
                    <h2><?php echo $content->title; ?></h2>
                    <ul>
                        <?php foreach ($content->list as $element) { ?>
                            <li><?php echo $element; ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="prestation-row-img-content">
                    <img src="http://192.168.1.17/Essenciel/assets/png-x2/<?php echo $content->img ?>.png"
                         alt=""/>
                    <a href=<?php $content->link ?>>
                        <span><?php echo $content->textLink ?></span>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="ctnPrices">
        <?php include("Components/PricesGrid/pricesGrid.php"); ?>
    </div>
</section>