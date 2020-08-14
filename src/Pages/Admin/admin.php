<section id="admin">
    <div id="admin-header">
        <h2>Vos dernières <br/><span>DEMANDE DE DEVIS</span></h2>
        <div>
            <button>filter</button>
        </div>
        <div>
            <button>
                Rechercher
            </button>
        </div>
    </div>
    <div>
        <div id="admin-table">
            <div class="thead">
                <div class="col-date">Date</div>
                <div class="col-name">Nom</div>
                <div class="col-firstname">Prénom</div>
                <div class="col-number">N de téléphone</div>
                <div class="col-mail">E-mail</div>
                <div class="col-total">Montant</div>
                <div class="col-status">Statut</div>
                <div class="col-action">dwd</div>
            </div>
            <div class="tbody">
            <?php
            for ($i = 0; $i < 3; $i++) {
                ?>
                <div class="tr">
                    <div class="main-tr">
                        <div class="col-date">04/08/2020</div>
                        <div class="col-name">Doe</div>
                        <div class="col-firstname">John</div>
                        <div class="col-number">00634178339</div>
                        <div class="col-mail">sovannra.hem@gmail.com</div>
                        <div class="col-total">2190</div>
                        <div class="col-status">en attente</div>
                        <div class="col-action">dwdw</div>
                    </div>
                    <div class="clp">

                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>