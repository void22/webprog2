<h2>
    <br>Új megjelenés feltöltése<br>
</h2>
<form id="upload_form">
    <label for="type">Típus:</label>
    <select name="type" id="type">
        <option value="0">Film megjelenés</option>
        <option value="1">DVD megjelenés</option>
    </select><br>
    <label for="title">Cím:</label>
    <input type="text" name="title" id="title"><br>
    <label for="releasedate">megjelenés dátuma:</label>
    <input type="date" name="releasedate" id="releasedate"><br>
    <label for="rating">Korhatár:</label>
    <input type="range" name="rating" id="rating" min="3" max="21" value="16"><span></span><br>
    <label for="director">Rendező:</label>
    <input type="text" name="director" id="director"><br>
    <label for="actors">Szereplők:</label>
    <input type="text" name="actors" id="actors"><br>
    <label for="description">Tartalom:</label>
    <textarea type="text" name="description" id="description"></textarea><br>
    <button type="button" id="upload">Mentés</button>
</form>
