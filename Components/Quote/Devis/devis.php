<h2>Votre devis</h2>
<div id="ctn-devis">
    <?php
    $contents = json_decode(file_get_contents("http://192.168.1.18/Essenciel/src/Pages/Quote/formules.json"));
    ?>
    <h4>Prestations</h4>

    <?php
        foreach ($contents[0]->prestations as $prestation) {
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