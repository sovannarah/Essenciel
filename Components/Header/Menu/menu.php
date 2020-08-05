<nav id="menu">
    <ul>
        <?php

        $routes = json_decode(file_get_contents(__DIR__ . "/routes.json"));
        foreach ($routes as $route) {
            ?>
            <li>
                <a
                    class="<?php if ($_SERVER["REQUEST_URI"] === "/Essenciel" . $route->path) {
                        echo "active-link";
                    } ?>"
                    href="/Essenciel<?php echo $route->path; ?>"><?php echo $route->text; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>