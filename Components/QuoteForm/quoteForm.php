<div id="quoteForm">
    <div id="quoteFormHeader" class="banner-simple">
        <h1>Établissez votre devis, en moins de XXX <br /> minutes depuis chez vous ! </h1>
        <div>
            <span>Où se trouve le défunt ?</span>
        </div>
    </div>
    <div id="ctnQuoteForm">
        <div id="ctnInput">
            <?php
            $contents = json_decode(file_get_contents(__DIR__ . "/content.json"));
            foreach ($contents as $content) {
                ?>
                <button name="lieu" value="<?php echo $content->id; ?>" class="quote-input" >
                    <span><?php echo $content->key; ?>.</span> <?php echo $content->text; ?>
                </button>
            <?php } ?>
        </div>
        <button id="btnSubmitQuote" class="btn-redirect-blue">
            <span>Suivant</span>
        </button>
    </div>
    <div id="ctnRedirectContact">
        <a href="">
            <span>Je souhaiterais être contacté</span>
        </a>
    </div>
</div>