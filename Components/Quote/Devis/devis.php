<h2>Votre devis</h2>
<div id="ctn-devis">
    <?php
    $contents = json_decode(file_get_contents($GLOBALS["ip"] . "src/Pages/Quote/formules.json"));
    ?>
    <h4>Prestations</h4>

    <?php
    $formule = array_filter($contents, function($obj){
        if (
                $obj->id_lieu == $_SESSION["lieu"] &&
                $obj->id_types == $_SESSION["types"] &&
                $obj->id_ceremony == $_SESSION["ceremony"]
        ) {
            return true;
        }
    });
        foreach (array_values($formule)[0]->prestations as $prestation) {
    ?>
            <h5><?php echo $prestation->title; ?></h5>
            <ul>
                <?php
                foreach ($prestation->list as $elem) {
                ?>
                    <li><?php echo $elem; ?></li>
                <?php } ?>
            </ul>
    <?php } ?>
</div>