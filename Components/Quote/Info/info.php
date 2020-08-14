<?php
$contents = json_decode(file_get_contents($GLOBALS["ip"] . "src/Pages/Quote/request.json"));
?>

<div id="ctn-quote-input">
    <h2>Quelles sont vos coordonnées?</h2>
    <div class="row-mor-def">
        <label for="civi">Civilité<span>*</span></label>
        <select id="civi" name="civi" class="select">
            <option value="" class="select-placeholder" disabled selected hidden>Madame, Monsieur...</option>
            <?php
            $reqCivi = "SELECT * FROM civilities";
            $resCivi = $GLOBALS["bdd"]->query($reqCivi);
            while ($civility = $resCivi->fetch()) {
                ?>
                <option value="<?php echo $civility["id"]; ?>"
                    <?php if(isset($_SESSION["civi"]) && ($_SESSION["civi"] == $civility["id"])) {
                        echo "selected";
                    } ?>
                ><?php echo $civility["civility"]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="row-mor-def">
        <h5>Comment vous appelez-vous ?</h5>
        <div class="row-def-inputs">
            <div class="ctn-field">
                <label for="last-name">Nom</label>
                <input id="last-name" name="last-name" class="text-field" type="text" placeholder="<?php
                if (isset($_SESSION["last_name"]) && $_SESSION["last_name"] !== "") {
                    echo $_SESSION["last_name"];
                } else {
                    echo "Nom";
                }
                ?>"/>
            </div>
            <div class="ctn-field">
                <label for="first-name">Prénom</label>
                <input id="first-name" name="first-name" class="text-field" type="text" placeholder="<?php
                if (isset($_SESSION["first_name"]) && $_SESSION["first_name"] !== "") {
                    echo $_SESSION["first_name"];
                } else {
                    echo "Prénom";
                }
                ?>"/>
            </div>
        </div>
    </div>
    <div class="row-mor-def">
        <h5>Où pouvons nous vous joindre?  </h5>
        <div>
            <div class="row-def-inputs column">
                <div>
                    <label for="phone_number">Téléphone</label>
                    <input id="phone_number" type="text" class="text-field" name="phone_number" placeholder="<?php
                    if (isset($_SESSION["phone_number"]) && $_SESSION["phone_number"] !== "") {
                        echo $_SESSION["phone_number"];
                    } else {
                        echo "06...";
                    }
                    ?>">
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input id="email" type="text" class="text-field" name="email" placeholder="<?php
                    if (isset($_SESSION["email"]) && $_SESSION["email"] !== "") {
                        echo $_SESSION["email"];
                    } else {
                        echo "e-mail@email.com...";
                    }
                    ?>">
                </div>
            </div>
        </div>
    </div>
</div>