<div id="accueil">
    <div id="accueil-banner" class="banner-double-img">
        <div id="accueil-banner-1">
        </div>

        <div id="accueil-banner-2">
        </div>
		
		<h2>Gérer l’organisation d'obsèques depuis chez vous ou dans notre agence</h2>

        <div id="accueil-btn-left">
            <span>Avec notre accompagnement à distance  vous n’aurez pas besoin de vous déplacer. En savoir plus</span>
        </div>

        <div id="accueil-btn-right">
            <span>Découvrez l’ensemble de nos prestations</span>
        </div>

        <div id="accueil-btn-right-bottom">
            <span>Avec notre accompagnement en agence, nous offrons la possibilité à nos familles  désorientées de nous  rencontrer. En savoir plus</span>
        </div>
    </div>
 
    <div id="ctnPrices">
        <?php include("Components/PricesGrid/pricesGrid.php"); ?>
    </div>

    <div id="ctn-accueil-slider">
        <button id="btn-slider-accueil-prev">
        <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/fl.svg" />
        </button>
        <div id="hide-slider-accueil">
            <div id="slider-accueil">
                <?php
                $contents = json_decode(file_get_contents(__DIR__ . "/sliderContent.json"));
                foreach ($contents as $content) {
                    ?>
                    <div class="elem-slide-accueil">
                        <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/slide-help/<?php echo $content->img; ?>.webp" alt=""/>
                        <span><?php echo $content->text; ?></span>
                        <a href>Ouvrir</a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <button id="btn-slider-accueil-next">
            <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/fl.svg" />
        </button>
    </div>
</div>