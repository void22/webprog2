<h2>
    <br>Új megjelenés feltöltése<br>
</h2>
<form id="upload_form">
    <div class="block">
        <label for="type">Típus:</label>
        <select class="dropdown" name="type" id="type">
            <option value="0">Film megjelenés</option>
            <option value="1">DVD megjelenés</option>
        </select>
    </div>
    <div class="block">
        <label for="title">Cím:</label>
        <input type="text" name="title" id="title">
    </div>
    <div class="block">
        <label for="releasedate">megjelenés dátuma:</label>
        <input type="date" name="releasedate" id="releasedate">
    </div>
    <div class="block">
        <label for="rating">Korhatár: <span id="ratingtext"></span></label>
        <input type="range" name="rating" id="rating" min="3" max="21" value="16">
    </div>
    <div class="block">
        <label for="director">Rendező:</label>
        <input type="text" name="director" id="director">
    </div>
    <div class="block">
        <label for="actors">Szereplők:</label>
        <input type="text" name="actors" id="actors">
    </div>
    <div class="block">
        <label for="description">Tartalom:</label>
        <textarea type="text" name="description" id="description"></textarea>
    </div>
    <button type="button" id="upload">Mentés</button>
</form>
