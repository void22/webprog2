<h2>Belépés</h2>
<form action="<?= SITE_ROOT ?>authenticate" method="post">
    <label for="login">Felhasználó:</label>
    <input type="text" name="login" id="login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3,}"><br>
    <label for="password">Jelszó:</label>
    <input type="password" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br>
    <input type="submit" value="Küldés">
</form>
<br>Ha még nincs felhasználói fiókja, <a href="registration">itt létrehozhat</a> egyet.
<h2>
    <br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br>
</h2>