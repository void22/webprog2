<br>
<div>
    <h2>Új bejegyzés a vendégkönyvbe</h2>
    <a href="<?= SITE_ROOT ?>guestbook">Vissza a vendégkönyvhöz...</a>
</div>
<br />
<form action="<?= SITE_ROOT ?>guestbookoperations" method="post">
    <div>
        <input type="hidden" name="id" id="id" value="0" />
        <div class="block">
            <label for="content">Hozzászólás</label>
            <textarea name="content" id="content" required></textarea>
        </div>
    </div>
    <br>
    <input type="submit" value="Küldés" />
</form>
<br />