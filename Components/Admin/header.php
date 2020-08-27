<?php
$tabAdmin = ["devis", "archives", "contacts"];
$tabUrl = explode("/", $_SERVER["REQUEST_URI"]);
$lastParams = $tabUrl[count($tabUrl) - 1];
?>

<header id="header-admin">
    <div class="d1">
        <img src="<?php echo $GLOBALS["ip"]; ?>assets/png-x2/logo.png" alt=""/>
        <div class="tabs-admin">
            <?php
            foreach ($tabAdmin as $tab) {
                ?>
                <a href="<?php echo $GLOBALS["ip"] . "admin/" . $tab; ?>" class="<?php if($lastParams === $tab) { echo "active-tab-admin"; } ?>">
                <span>
                    <?php echo $tab; ?>
                </span>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
    <a class="back-site-admin" href="<?php echo $GLOBALS["ip"]; ?>">
        <span>
            VISITER LE SITE
        </span>
    </a>
</header>