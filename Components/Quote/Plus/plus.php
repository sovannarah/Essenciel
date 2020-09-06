
    <h2>De quel manière souhaitez-vous<br/> être accompagné</h2>
    <div id="ctn-choice">
        <div id="ctn-btn-lieu">
            <?php
            $req = "SELECT * FROM accompaniments";
            $res = $GLOBALS["bdd"]->query($req);
            while ($data = $res->fetch()) {
                ?>
                <button name="accompaniment"
                        class="quote-input <?php if (isset($_SESSION["accompaniment"]) && $_SESSION["accompaniment"] == $data["id"]) {
                            echo "select-choice";
                        } ?>" value="<?php echo $data["id_accompaniment"]; ?>">
                    <img src="<?php echo $GLOBALS["ip"] ?>assets/png-x2/<?php echo $data["img"]; ?>.svg" alt=""/>
                    <span><?php echo $data["accompaniment"]; ?></span>
                </button>
            <?php } ?>
        </div>
        <span id="error-accompaniment" class="error-choice d-none">*Choix requis</span>
    </div>
    <div id="ctn-quote-input">
        <h2>Quelles sont les informations sur le.la défunt.e ?</h2>
        <div class="row-mor-def">
            <h5>Quel est votre lien avec le.la défunt.e? </h5>
            <div>
                <div class="row-def-inputs">
                    <div>
                        <label for="civi_def">Civilité<span>*</span></label>
                        <div class="column">
                            <select id="civi_def" name="civi_def" class="select">
                                <option value="" class="select-placeholder" disabled selected hidden>Madame, Monsieur...</option>
                                <?php
                                $reqCivi = "SELECT * FROM civilities";
                                $resCivi = $GLOBALS["bdd"]->query($reqCivi);
                                while ($civility = $resCivi->fetch()) {
                                    ?>
                                    <option value="<?php echo $civility["id_civility"]; ?>"
                                        <?php if (isset($_SESSION["civi_def"]) && ($_SESSION["civi_def"] == $civility["id_civility"])) {
                                            echo "selected";
                                        } ?>
                                    ><?php echo $civility["civility"]; ?></option>
                                <?php } ?>
                            </select>
                            <span id="error-civi_def" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-mor-def">
            <h5>Comment s’appellait-il.elle?</h5>
            <div class="row-def-inputs">
                <div class="ctn-field">
                    <label for="def_last_name">Nom</label>
                    <div class="column">
                        <input id="def_last_name" name="last_name_def" class="text-field" type="text" placeholder="<?php
                        if (isset($_SESSION["last_name_def"]) && $_SESSION["last_name_def"] !== "") {
                            echo $_SESSION["last_name_def"];
                        } else {
                            echo "Nom du défunt...";
                        }
                        ?>"/>
                        <span id="error-last_name_def" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                    </div>
                </div>
                <div class="ctn-field">
                    <label for="def_first_name">Prénom</label>
                    <div class="column">
                    <input id="def_first_name" name="first_name_def" class="text-field" type="text" placeholder="<?php
                    if (isset($_SESSION["first_name_def"]) && $_SESSION["first_name_def"] !== "") {
                        echo $_SESSION["first_name_def"];
                    } else {
                        echo "Prénom du défunt...";
                    }
                    ?>"/>
                    <span  id="error-first_name_def" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-mor-def">
            <h5>Quel est votre lien avec le.la défunt.e? </h5>
            <div>
                <div class="row-def-inputs">
                    <div>
                        <label for="def_link">Lien</label>
                        <div class="column">
                            <select id="def_link" name="def_link" class="select">
                                <option value="" class="select-placeholder" disabled selected hidden>Conjoint, Soeur...
                                </option>
                                <?php
                                $reqLink = "SELECT * FROM links";
                                $resLink = $GLOBALS["bdd"]->query($reqLink);
                                while ($link = $resLink->fetch()) {
                                    ?>
                                    <option value="<?php echo $link["id"]; ?>" class="select-placeholder"
                                        <?php if (isset($_SESSION["def_link"]) && ($_SESSION["def_link"] == $link["id"])) {
                                            echo "selected";
                                        } ?>
                                    >
                                        <?php echo $link["link"]; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span id="error-def_link" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$res->closeCursor();
?>