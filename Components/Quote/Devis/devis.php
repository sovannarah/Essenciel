<h2>Votre devis</h2>
<div id="ctn-devis">
    <h4>Prestations</h4>
    <?php
    if ($_SESSION["type_option_answer"] > 2) {
        $_SESSION["type_option_answer"] = $_SESSION["type_option_answer"] - 2;
    }
    $req = "SELECT id FROM formule WHERE id_location = " . $_SESSION["location"] . " AND id_type = " . $_SESSION["type"] . " AND id_type_option_answer = " . $_SESSION["type_option_answer"];
    $res = $GLOBALS["bdd"]->query($req);
    while ($formule = $res->fetch()) {
        $_SESSION["formule"] = $formule["id"];
        $reqCat = "SELECT * FROM prestation_category";
        $resCat = $GLOBALS["bdd"]->query($reqCat);
        $results = [];
        while ($cat = $resCat->fetch()) {
            $results[$cat["prestation_category"]] = [];
        }
        $reqPrest = "SELECT * FROM prestations NATURAL JOIN prestation NATURAL JOIN prestation_category WHERE prestations.id_formule = " . $formule["id"];
        $resPres = $GLOBALS["bdd"]->query($reqPrest);

        while ($data = $resPres->fetch()) {
            $results[$data["prestation_category"]][] = $data;
        }
        foreach ($results as $result) {
            if (count($result) > 0) {
                ?>
                <h5><?php echo $result[0]["prestation_category"]; ?></h5>
                <ul>
                    <?php
                    foreach ($result as $line) {
                        ?>
                        <li><?php echo $line["prestation"]; ?></li>
                        <?php
                    }

                    ?>  </ul> <?php
            }
        }
        $resPres->closeCursor();
        $resCat->closeCursor();
    }
    $res->closeCursor();
    ?>
</div>
