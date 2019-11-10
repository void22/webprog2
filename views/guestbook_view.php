<table>
    <tr>
        <td>
            <a href="guestbookdetails">Új hozzászólás</a>
        </td>
        <td>

        </td>
    </tr>
    <?php
        $data = json_decode($viewData['entries']);
        for ($i=0; $i < count($data); $i++) {
            $row = $data[$i];

            echo "<tr>";
            echo "<td style=\"width:220px\">";
            echo "<strong>" . $row->username . "</strong><br><br>";
            echo "<strong>Létrehozva</strong><br>";
            echo $row->entry_date . "<br><br>";
            echo "<strong>Módosítva</strong><br>";
            echo $row->last_updated . "<br><br><br>";

            if ($row->user_id == $_SESSION['wp2uid']) {
                echo "<a href=\"guestbookdetails/?id=" . $row->id . "\">Részletek</a>";
            }

            echo "</td>";
            echo "<td>" . $row->content . "</td>";
            echo "</tr>";
        }
    ?>
</table>
<br>