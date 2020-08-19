<section id="admin">

    <div id="admin-header">
        <h2>Vos dernières <br/><span>DEMANDE DE DEVIS</span></h2>
        <div id="ctn-btns-header-admin">
            <div class="ctn-btn-header-admin ctn-filter">
                    <button id="filter-admin">
                        filter
                        <img src="<?php echo $GLOBALS["ip"]; ?>/assets/png-x2/filter.svg" alt=""/>
                    </button>
                <div id="popover-filter" class="d-none">
                    <div id="ctn-checkbox-type" class="ctn-ckx">
                        <label class="title-ckx">TYPES D'OBSEQUES</label>
                        <div class="ctn-check">
                            <label>Cremation</label>
                            <input class="checkbox-filter" type="checkbox" name="id_type" value="1"/>
                        </div>
                        <div class="ctn-check">
                            <label>Enterrement</label>
                            <input class="checkbox-filter" type="checkbox" name="id_type" value="2"/>
                        </div>
                    </div>
                    <div id="ctn-checkbox-accompaniment" class="ctn-ckx">
                        <label class="title-ckx">ACCOMPAGNEMENT</label>
                        <div class="ctn-check">
                            <label>A distance</label>
                            <input class="checkbox-filter" type="checkbox" name="id_accompaniment" value="1"/>
                        </div>
                        <div class="ctn-check">
                            <label>En agence</label>
                            <input class="checkbox-filter" type="checkbox" name="id_accompaniment" value="2"/>
                        </div>
                    </div>
                    <div id="ctn-checkbox-status" class="ctn-ckx">
                        <label class="title-ckx">STATUT</label>
                        <div class="ctn-check">
                            <label>En attente</label>
                            <input class="checkbox-filter" type="checkbox" name="id_status" value="1"/>
                        </div>
                        <div class="ctn-check">
                            <label>Valider</label>
                            <input class="checkbox-filter" type="checkbox" name="id_status" value="2"/>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ctn-search-quote" class="ctn-btn-header-admin">
                <input id="text-field-search" class="filter" name="search-quote" type="text"
                       placeholder="Rechercher..."/>
                <button>
                    <img src="<?php echo $GLOBALS["ip"]; ?>/assets/png-x2/loupe.svg" alt=""/>
                </button>
            </div>
        </div>
    </div>
    <div id="ctn-admin-table">
        <div id="admin-table">
            <div class="thead">
                <div class="col-date">Date</div>
                <div class="col-name">Nom</div>
                <div class="col-firstname">Prénom</div>
                <div class="col-number">

                    N de téléphone
                </div>
                <div class="col-mail">
                    E-mail
                </div>
                <div class="col-total">Montant</div>
                <div class="col-status">Statut</div>
                <div class="col-action"></div>
            </div>
            <div id="admin-rows" class="tbody">

            </div>
        </div>
    </div>
    <div id="view-quote" class="d-none">
        <button id="close-view-quote">
            fermer x
        </button>
    </div>
</section>