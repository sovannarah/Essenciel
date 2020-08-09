<div id="pricesGrid">

    <div id="ctnPricesGrid">
        <div id="prices-col-0">
            <div id="row-0">
                <p>Nos tarifs sont <span><br/>justes, transparents <br/> et invariables</span></p>
            </div>
            <div id="row-1" class="prices-row">
                <p><span>A.</span> Le défunt se trouve en établissement de soins.</p>
            </div>
            <div class="prices-row">
                <p><span>B.</span> Le défunt se trouve à domicile / en maison de retraite. </p>
            </div>
            <div class="prices-row">
                <p><span>C.</span> Le défunt se trouve à l’institut médico légal.</p>
            </div>
        </div>
        <table>
            <?php
            $contents = json_decode(file_get_contents(__DIR__ . "/content.json"));
            for ($i = 0; $i < count($contents); $i++) {
                $content = $contents[$i]; ?>
                <tr class="<?php if ($i == 0) {
                    echo "thead";
                } ?>">
                    <?php
                    for ($y = 0; $y < count($content); $y++) {
                        $value = $content[$y];
                        $txtColor = ($i == 1) ? "txt-black" :  "";
                        ?>
                        <?php if($i == 0) {
                            echo "<th>" . $value . "</th>";
                        } else {
                            echo "<td class='" . $txtColor . "'>" . $value . "</td>";
                        }?>
                    <?php } ?>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>


    <div id="ctnPricesRedirect">
        <a class="ctn-prices-link">
            <span>Découvrir nos <br/> prestations en détail </span>
        </a>
        <a class="ctn-prices-link">
            <span>Être <br/> contacté </span>
        </a>
        <a id="redirectQuote" class="btn-redirect-blue">
            <span>Établissez <br/> votre devis</span>
        </a>
    </div>
</div>