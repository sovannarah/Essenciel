
<div id="valide">
    <h2>Merci <?php echo $_SESSION["civi"] . " " . $_SESSION["last_name"]; ?> <br/><span>Votre demande a bien été prise en
            compte</span>
    </h2>
    <?php
    $tabUrl = explode("/", $_SERVER["REQUEST_URI"]);
    if($tabUrl[count($tabUrl) - 2] !== "contact") {
    ?>
    <div>
        <p>Un e-mail de confirmation récapitulant l’ensemble de vos souhaits <strong>vient de vous être envoyé par
                e-mail.</strong></p>
    </div>
    <div>
        <p>
            Vous avez choisi choix de <strong>l'accompagnement
                <?php
                if ($_SESSION["accompaniment"] == 1) {
                    echo " à distance";
                } else {
                    echo " en agence";
                }
                ?>.</strong>
            Nous allons revenir vers vous très rapidement afin de vous faire <strong>parvenir les documents nécessaires
                à
                l’organisation des obsèques.</strong>
        </p>
    </div>
    <div class="last-valide-div">
        <ul>
            <label>
                Dans l’intervalle, nous aurons besoin, entre autres, des documents suivants :
            </label>
                <li>Photocopie de <strong>votre carte d’identité</strong></li>
                <li>Livret de famille du défunt ou copie d’une pièce d’<strong>identité du défunt</strong></li>
            </ul>
    </div>
    <?php } else { ?>
            <div>
                <p>Un e-mail de confirmation récapitulant l’ensemble de vos souhaits <strong>vient de vous être envoyé par
                        e-mail.</strong></p>
            </div>
    <?php } ?>
</div>

