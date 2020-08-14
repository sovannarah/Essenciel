<?php
$id_choice = "<script>document.write(form.types)</script>";
var_dump($_SESSION["last_name_def"]);
var_dump($_SESSION["civi_def"]);
var_dump($_SESSION["def_link"]);
?>

    <h2>De quel manière souhaitez-vous<br/> être accompagné</h2>
    <div id="ctn-btn-lieu">
        <?php
        //    $contents = json_decode(file_get_contents($GLOBALS["ip"] . "src/Pages/Quote/request.json"));
        $req = "SELECT * FROM accompaniments";
        $res = $GLOBALS["bdd"]->query($req);
        while ($data = $res->fetch()) {
            ?>
            <button name="accompaniment"
                    class="quote-input <?php if (isset($_SESSION["accompaniment"]) && $_SESSION["accompaniment"] == $data["id"]) {
                        echo "select-choice";
                    } ?>" value="<?php echo $data["id"]; ?>">
                <img src="<?php echo $GLOBALS["ip"] ?>assets/png-x2/<?php echo $data["img"]; ?>.svg" alt=""/>
                <div>
                    <?php echo $data["accompaniment"]; ?></div>
            </button>
        <?php } ?>
    </div>
    <div id="ctn-quote-input">
        <h2>Quelles sont les informations sur le.la défunt.e ?</h2>
        <div class="row-mor-def">
            <label for="civi_def">Civilité<span>*</span></label>
            <select id="civi_def" name="civi_def" class="select">
                <option value="" class="select-placeholder" disabled selected hidden>Madame, Monsieur...</option>
                <?php
                $reqCivi = "SELECT * FROM civilities";
                $resCivi = $GLOBALS["bdd"]->query($reqCivi);
                while ($civility = $resCivi->fetch()) {
                    ?>
                    <option value="<?php echo $civility["id"]; ?>"
                        <?php if(isset($_SESSION["civi_def"]) && ($_SESSION["civi_def"] == $civility["id"])) {
                            echo "selected";
                        } ?>
                    ><?php echo $civility["civility"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="row-mor-def">
            <h5>Comment s’appellait-il.elle?</h5>
            <div class="row-def-inputs">
                <div class="ctn-field">
                    <label for="def_last_name">Nom</label>
                    <input id="def_last_name" name="last_name_def" class="text-field" type="text" placeholder="<?php
                    if (isset($_SESSION["last_name_def"]) && $_SESSION["last_name_def"] !== "") {
                        echo $_SESSION["last_name_def"];
                    } else {
                        echo "Nom du défunt...";
                    }
                    ?>"/>
                </div>
                <div class="ctn-field">
                    <label for="def_first_name">Prénom</label>
                    <input id="def_first_name" name="first_name_def" class="text-field" type="text" placeholder="<?php
                    if (isset($_SESSION["first_name_def"]) && $_SESSION["first_name_def"] !== "") {
                        echo $_SESSION["first_name_def"];
                    } else {
                        echo "Prénom du défunt...";
                    }
                    ?>"/>
                </div>
            </div>
        </div>
        <div class="row-mor-def">
            <h5>Quel est votre lien avec le.la défunt.e? </h5>
            <div>
                <div class="row-def-inputs">
                    <div>
                        <label for="def_link">Lien</label>
                        <select id="def_link" name="def_link" class="select">
                            <option value="" class="select-placeholder" disabled selected hidden>Conjoint, Soeur...
                            </option>
                            <?php
                            $reqLink = "SELECT * FROM links";
                            $resLink = $GLOBALS["bdd"]->query($reqLink);
                            while ($link = $resLink->fetch()) {
                                ?>
                                <option value="<?php echo $link["id"]; ?>" class="select-placeholder"
                                    <?php if(isset($_SESSION["def_link"]) && ($_SESSION["def_link"] == $link["id"])) {
                                        echo "selected";
                                    } ?>
                                >
                                    <?php echo $link["link"]; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$res->closeCursor();
?>