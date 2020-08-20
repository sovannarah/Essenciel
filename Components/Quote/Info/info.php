<div id="ctn-quote-input">
    <h2>Quelles sont vos coordonnées?</h2>
    <div class="row-mor-def">
        <div>
            <div class="row-def-inputs">
                <div>
                    <label for="civi">Civilité<span>*</span></label>
                    <div class="column">
                        <select id="civi" name="civi" class="select">
                            <option value="" class="select-placeholder" disabled selected hidden>Madame, Monsieur...
                            </option>
                            <?php
                            $reqCivi = "SELECT * FROM civilities";
                            $resCivi = $GLOBALS["bdd"]->query($reqCivi);
                            while ($civility = $resCivi->fetch()) {
                                ?>
                                <option value="<?php echo $civility["id_civility"]; ?>"
                                    <?php if (isset($_SESSION["civi"]) ) {
                                        if($_SESSION["civi"] == $civility["id_civility"]) {
                                            echo "selected";
                                        }
                                    } ?>
                                ><?php echo $civility["civility"]; ?></option>
                            <?php } ?>
                        </select>
                        <span id="error-civi" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-mor-def">
        <h5>Comment vous appelez-vous ?</h5>
        <div class="row-def-inputs">
            <div class="ctn-field">
                <label for="last_name">Nom</label>
                <div class="column">
                    <input id="last_name" name="last_name" class="text-field" type="text" placeholder="<?php
                    if (isset($_SESSION["last_name"]) && $_SESSION["last_name"] !== "") {
                        echo $_SESSION["last_name"];
                    } else {
                        echo "Nom";
                    }
                    ?>"/>
                    <span id="error-last_name" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                </div>
            </div>
            <div class="ctn-field">
                <label for="first_name">Prénom</label>
                <div class="column">
                    <input id="first_name" name="first_name" class="text-field" type="text" placeholder="<?php
                    if (isset($_SESSION["first_name"]) && $_SESSION["first_name"] !== "") {
                        echo $_SESSION["first_name"];
                    } else {
                        echo "Prénom";
                    }
                    ?>"/>
                    <span id="error-first_name" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row-mor-def">
        <h5>Où pouvons nous vous joindre? </h5>
        <div>
            <div class="row-def-inputs column">
                <div class="mb-5">
                    <label for="phone_number">Téléphone</label>
                    <div class="column">
                        <input id="phone_number" type="text" class="text-field" name="phone_number" placeholder="<?php
                        if (isset($_SESSION["phone_number"]) && $_SESSION["phone_number"] !== "") {
                            echo $_SESSION["phone_number"];
                        } else {
                            echo "06...";
                        }
                        ?>">
                        <span id="error-phone_number" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="email">E-mail</label>
                    <div class="column">
                        <input id="email" type="text" class="text-field" name="email" placeholder="<?php
                        if (isset($_SESSION["email"]) && $_SESSION["email"] !== "") {
                            echo $_SESSION["email"];
                        } else {
                            echo "e-mail@email.com...";
                        }
                        ?>">
                        <span id="error-email" class="error-input d-none">*Veuillez saisir l'adresse d'un établissement</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>