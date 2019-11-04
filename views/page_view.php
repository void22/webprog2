<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MVC - PHP</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php
            if ($viewData['style']) {
                echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">';
            }
        ?>
    </head>
    <body>
        <header>
            <div id="user"><em><?= $_SESSION['wp2lastname'] . " " . $_SESSION['wp2firstname'] ?></em></div>
            <h1 class="header">Web-programozás II - MVC alkalmazás</h1>
        </header>
        <nav>
            <?php
                echo Menu::getMenu($viewData['selectedItems']);
            ?>
        </nav>
        <aside>
                <p>Phasellus wisi nulla...</p>
        </aside>
        <section>
            <?php
                if($viewData['render']) {
                    include($viewData['render']);
                }
            ?>
        </section>
        <footer>&copy; NJE - GAMF - Informatika Tanszék <?= date("Y") ?></footer>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/page.js"></script>
    </body>
</html>