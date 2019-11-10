<table>
    <?php
        for ($i=0; $i < count($viewData['releases']); $i++) {
            $row = $viewData['releases'][$i];

            echo "<tr>";
            echo "<td style=\"width:250px\">";
            echo "<strong>Bemutató</strong><br>";
            echo ($row['type'] == 0 ? "Mozifilm" : "DVD") . "<br><br>";
            echo "<strong>Cím</strong><br>";
            echo $row['title'] . "<br><br>";
            echo "<strong>Megjelenés</strong><br>";
            echo date("Y/m/d", strtotime($row['release_date'])) . "<br><br>";
            echo "<strong>Rendező</strong><br>";
            echo $row['directors'] . "<br><br>";
            echo "<strong>Szereplők</strong><br>";
            echo $row['actors'] . "<br><br>";
            echo "<strong>Korhatár</strong><br>";
            echo $row['rating'] . "<br><br>";
            echo "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "</tr>";
        }
    ?>
</table>
<br>