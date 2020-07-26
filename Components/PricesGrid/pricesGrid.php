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
            foreach ($contents as $content) {
                foreach ($content as $key => $value) {
                    ?>
                    <tr>
                    <?php
                    foreach ($value as $elem) {
                        ?>
                        <?php if ($key === "firstRow") { ?>
                            <th><?php echo $elem ?></th>
                        <?php } else { ?>
                            <td class="<?php if ($key === "secondRow") echo "txt-black" ?>"><?php echo $elem ?></td>
                        <?php } ?>
                    <?php }
                }
                ?> </tr> <?php
            } ?>
        </table>
    </div>
    <div id="ctnPricesRedirect">
        <a class="ctn-prices-link">
            <span>Découvrir nos <br /> prestations en détail </span>
        </a>
        <a class="ctn-prices-link">
            <span>Être <br /> contacté </span>
        </a>
        <a id="redirectQuote" class="ctn-prices-link">
            <span>Établissez <br /> votre devis</span>
        </a>
    </div>
</div>