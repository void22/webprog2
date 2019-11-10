<br>
<div>
    <h2>Bejegyzés szerkesztése</h2>
    <a href="<?= SITE_ROOT ?>guestbook">Vissza a vendégkönyvhöz...</a>
</div>
<br />
<?php
    $data = json_decode($viewData['data']['entries'])[0];
?>

<form action="<?= SITE_ROOT ?>guestbookoperations" method="post">
    <div>
        <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
        <div class="block">
            <label for="content">Hozzászólás</label>
            <textarea name="content" id="content" required><?= $data->content ?></textarea>
        </div>
    </div>
    <br />
    <input type="submit" name="update" value="Küldés" />
    <input type="submit" name="delete" value="Törlés" />
</form>
<br />