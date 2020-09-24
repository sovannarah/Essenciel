<div id="accueil">
    <!-- Sub Header -->
    <div id="sub-header">
        <div class="sub-header-01">
            <li class="sub-header-content">
                <img src="assets/png-x2/01-sub-header.png" alt=""></img>
                <p><strong>Des obsèques dignes</strong><br>Un service de qualité</p></br>
            </li>

            <li class="sub-header-content-02">
                <img src="assets/png-x2/02-sub-header.png" alt=""></img>
                <p><strong>Le meilleur tarif garanti</strong><br>Des tarifs déterminés en avance</p></br>
            </li>

            <li class="sub-header-content-03">
                <img src="assets/png-x2/03-sub-header.png" alt=""></img>
                <p><strong>Une fabriquation française</strong><br>Une gamme de produits écologiques</p></br>
            </li>
        </div>

    </div>
    <!-- End Sub Header -->

    <div id="banner-top-container">

        <div class="container-full-width">

            <div class="container-full-width-2">        
                <img src="assets/png-x2/banner-left.webp" class="banner-left" alt="">
                <img src="assets/png-x2/banner-right.webp" class="banner-right" alt="">
                <a href="" class="link-cadre">
                    <span>Découvrez l'ensemble <br/> de nos prestations</span>
                    <img src="<?php echo $GLOBALS["ip"] ?>assets/png-x2/fl.svg" alt=""/>
                </a>
                <h2><span>Gérer l’organisation d’obsèques depuis chez vous ou dans notre agence</span></h2>
            </div>

            <div class="link-cadre-left">
                <span>Avec <strong>notre accompagnement en agence</strong> nous offrons la</span>
                <span style="color:#ec6f40;">possibilité à nos familles désorientées de nous rencontrer.</span><span> <a style="color:#4abfcb; text-decoration:underline;">En savoir plus</a></span>
            </div>

            <div class="link-cadre-right">
                <span>Avec<strong> notre accompagnement à distance</strong></span>
                <span>vous <span style="color:#ec6f40;">n’aurez pas besoin de vous déplacer</span>. <a style="color:#4abfcb; text-decoration:underline;">En savoir plus</a></span>
            </div>
        </div>

    </div>
 
    <div id="ctnPrices">
        <?php include("Components/PricesGrid/pricesGrid.php"); ?>
    </div>
    <!--
    <div id="ctn-accueil-slider">

        <div id="slidershow-accueil">
            <?php
            $contents = json_decode(file_get_contents(__DIR__ . "/sliderContent.json"));
            foreach ($contents as $content) {
                if ($content->value == 0) {
                    ?>
                    
                    <div class="elem-slidershow-accueil">
                        <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/slide-help/<?php echo $content->img; ?>.webp"
                             alt=""/>
                        <span><?php echo $content->text; ?></span>
                        <a href="#">Ouvrir</a>
                    </div>

                <?php } ?>
            <?php } ?>
        </div>

        <div id="title-slide">
            <h2>L'organisation d'obseque</br><font style="color:#ec6f40;">vos questions les plus frequentes</font></h2>
            <p></br>Toutes nos informations et conseils</br>sur<strong>www.pflestroisroses.fr</strong></p>
        </div>

        <div id="hide-slider-accueil">
            <div id="slider-accueil">
                <?php
                $contents = json_decode(file_get_contents(__DIR__ . "/sliderContent.json"));
                foreach ($contents as $content) {
                    ?>
                    <div class="elem-slide-accueil">
                        <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/slide-help/<?php echo $content->img; ?>.webp"
                             alt=""/>
                        <span><?php echo $content->text; ?></span>
                        <a href="#">Ouvrir</a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <button id="btn-slider-accueil-prev">
            <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/fl.svg" alt=""/>
        </button>

        <button id="btn-slider-accueil-next">
            <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/fl.svg" alt=""/>
        </button> 

    </div>-->
</div>