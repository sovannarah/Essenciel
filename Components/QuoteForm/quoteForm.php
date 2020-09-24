<div id="formQuote" class="footer_quote">
    <div id="quoteFormHeader" class="banner-simple">
        <h1>Établissez votre devis, en moins de XXX <br /> minutes depuis chez vous ! </h1>
        <div>
            <span><strong>Où se trouve le défunt ?</strong></span>
        </div>
    </div>
    <div id="ctnQuoteForm">
        <div id="ctnInput">
            <?php
            $contents = json_decode(file_get_contents(__DIR__ . "/content.json"));
            foreach ($contents as $content) {
                ?>
                <button name="location" value="<?php echo $content->id + 1; ?>" class="quote-input" >
                    <span><?php echo $content->key; ?>.</span> <?php echo $content->text; ?>
                </button>
            <?php } ?>
        </div>
        <a href="<?php echo $GLOBALS["ip"] ?>quote/lieu" id="btnSubmitQuote" class="btn-redirect-blue">
            <span>Suivant</span>
            <img src="<?php echo $GLOBALS["ip"] ?>assets/png-x2/fl-w.svg" alt=""/>
        </a>
    </div>
    <div id="ctnRedirectContact">
        <a href="<?php echo $GLOBALS["ip"] ?>contact">
            <span>Je souhaiterais être contacté</span>
        </a>
    </div>
</div>
