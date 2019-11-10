<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Webprogramozás II projekt feladat - NJE</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/site.css">
        <?php
            if ($viewData['style']) {
                echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">';
            }
        ?>
    </head>
    <body>
        <header>
            <div id="user"><em><?= $_SESSION['wp2lastname'] . " " . $_SESSION['wp2firstname'] ?></em></div>
            <h1 class="header">Mozi és DVD filmek megjelenése</h1>
        </header>
        <nav>
            <?php
                echo Menu::getMenu($viewData['selectedItems']);
            ?>
        </nav>
        <section>
            <?php
                if($viewData['render']) {
                    include($viewData['render']);
                }
            ?>
        </section>
        <footer class="footer">Ez a weboldal egyetemi projetfeladatként készült.<br />
                Készítette: Klimisz Dezső<br />
                A projekt dokumentációja <a href="<?= SITE_ROOT . "docs/Projektfeladat-Fejlesztői dokumentáció.pdf" ?>" target="_blank">itt</a> elérhető<br />
                A projekt forráskódja letölthető <a href="<?= SITE_ROOT . "docs/source.zip" ?>" target="_blank">innen</a><br />
                GitHub repository: <a href="https://github.com/void22/webprog2" target="_blank">https://github.com/void22/webprog2</a><br />
        </footer>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/page.js"></script>
    </body>
</html>