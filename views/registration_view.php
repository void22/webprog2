<br>
<h3>Regisztráció</h3>
<form action="<?= SITE_ROOT ?>register" method="post">
    <div class="block">
        <label for="login">Felhasználónév:</label>
        <input type="text" name="login" id="login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3,}"><br>
    </div>
    <div class="block">
        <label for="lastname">Vezetéknév:</label>
        <input type="text" name="lastname" id="lastname" required><br>
    </div>
    <div class="block">
        <label for="firstname">Keresztnév:</label>
        <input type="text" name="firstname" id="firstname" required><br>
    </div>
    <div class="block">
        <label for="password">Jelszó:</label>
        <input type="password" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4,}[\-\.a-zA-Z0-9_]+"><br>
    </div>
    <input type="submit" value="Küldés">
</form>
<h2>
    <br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br>
</h2>