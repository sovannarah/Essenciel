

<div>
    <div id="conceptRow-1">
        <div id="conceptRow-Image" class="banner-simple-left">
            <div>
                <h2>Nous voulons sortir de la logique <br/> consumériste du milieu funéraire <br/> qui est
                    insupportable.</h2>
            </div>
        </div>
        <div id="conceptRowContent">
            <div>
                <p>Nous proposons nos prestations avec un <br/> <strong>accompagnement bienveillant</strong> en
                    proposant <span>un <br/> tarif forfaitaire, tout inclus, invariable </span>permettant aux <br/>familles
                    de vivre leur deuil, sans la crainte de se faire <br/>arnaquer.</p>
            </div>
        </div>
        <div id="conceptRowInfo">
            <label>Tout est clair dès le début:</label>
            <p>Nos tarifs sont fixes <br/>et sont définitifs.</p>
        </div>
    </div>

    <div id="container-concept-slider">
        <div id="ctn-dot-slider">
            <?php
            $contents = json_decode(file_get_contents(__DIR__ . "/content.json")); ?>
            <button class="dot-slide-concept active-concept-slider" onclick="sliderConceptAnim()">•</button>
            <button class="dot-slide-concept" onclick="sliderConceptAnim()">•</button>
        </div>
        <div id="hide-concept-slider">
            <div id="concept-slider">
                <?php
                $elemPerCol = 3;
                for ($i = 0; $i < count($contents[0]->slider) / $elemPerCol; $i++) {
                    $paddingTop = $i % 2 == 1 ? ' ' : ' pt-cl';
                    echo "<div class='col-slide-concept col-slide-concept-" . $i . $paddingTop . "'>";
                    $y = 0;
                    for ($x = $elemPerCol * $i; $x < count($contents[0]->slider) - ($elemPerCol - $i * $elemPerCol); $x++) {
                        ?>
                        <div class="elem-slide-concept elem-slide-concept-<?php echo $y; ?>">
                            <div class="ctn-img-slide-concept">
                                <img src="http://localhost/Essenciel/assets/png-x2/<?php echo $contents[0]->slider[$x]->img; ?>.png"
                                     alt=""/>
                            </div>
                            <p><?php echo $contents[0]->slider[$x]->txt; ?></p>
                        </div>
                        <?php
                        $y++;
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <div id="concept-banner" class="banner-double-img">
        <div id="concept-banner-1">
            <h1>Gérer l'organisation d'obsèques <br/> depuis chez vous</h1>
        </div>
        <div id="concept-banner-2">
            <h1>Gérer l'organisation d'obsèques <br/> dans notre agence</h1>
        </div>
    </div>
    <div id="commitmentsRow">
        <div id="commitmentsRow-1">
            <h3>Nos <br/><span>engagements</span></h3>
            <a href="">
                <span>Découvrir nos prestations en détail</span>
            </a>
        </div>
        <div id="ctnCommitmentsList">
            <ul>
                <li><span>01</span>
                    <p><strong>Être à l'écoute</strong> de nos familles.<br/>Se concentrer sur l'humain.</p></li>
                <li><span>02</span>
                    <p>Boulogne-<br/><strong>Bannir toute approche <br/> commerciale et mercantile.</strong></p></li>
                <li><span>03</span>
                    <p>Proposer un <strong>tarif clair, lisible et <br/>compréhensible</strong> sans frais cachés.</p>
                </li>
                <li><span>04</span>
                    <p>Nous nous engageons à <strong>proposer des <br/>forfaits fixés à l'avance et
                            définitifs*.</strong></p></li>
                <li><span>05</span>
                    <p>Réaliser des <strong>obsèques simples, mais <br/>dignes,</strong> avec des valeurs laïques.</p>
                </li>
            </ul>
            <p class="trotrr">*(sauf exlusions qui ne sont pas de notre responsabilité)<br/>Exemple: Il n'y a plus de
                place dans la sépulture apres vérification<br/> et nous devons faire des exhumations: Hors cadre.</p>
        </div>
    </div>
</div>