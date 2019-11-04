<h2>
    <br>Ide jönnek a filmpremier adatok SOAP-on keresztül...<br>
</h2>
<table>
    <tr>
        <th>Bemutató</th>
        <th>Cím</th>
        <th>Megjelenés</th>
        <th>Rendező</th>
        <th>Szereplők</th>
        <th>Korhatár</th>
    </tr>
    <?php
        for ($i=0; $i < count($viewData['releases']); $i++) {
            $row = $viewData['releases'][$i];

            echo "<tr>";
            echo "<td>" . ($row['type'] == 0 ? "Mozifilm" : "DVD") . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . date("Y/m/d", strtotime($row['release_date'])) . "</td>";
            echo "<td>" . $row['directors'] . "</td>";
            echo "<td>" . $row['actors'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            echo "<table>";
            echo "<tr>";
            echo "<td>" . $row['description'] . "</td>";
            echo "</tr>";
            echo '</tr>';
            echo "</table>";
        }
    ?>
</table>
<br>