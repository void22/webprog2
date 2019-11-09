<a href="guestbookdetails">Új hozzászólás</a>
<br>
<table>
    <tr>
        <th>Felhasználó</th>
        <th>Dátum</th>
        <th>Frissítve</th>
        <th> </th>
    </tr>
    <?php
        $data = json_decode($viewData['entries']);
        for ($i=0; $i < count($data); $i++) {
            $row = $data[$i];

            echo "<tr>";
            echo "<td>" . $row->username . "</td>";
            echo "<td>" . $row->entry_date . "</td>";
            echo "<td>" . $row->last_updated . "</td>";

            if ($row->user_id == $_SESSION['wp2uid']) {
                echo "<td><a href=\"guestbookdetails/?id=" . $row->id . "\">Részletek</a></td>";
            }
            else {
                echo "<td> </td>";
            }
            
            echo "<table>";
            echo "<tr>";
            echo "<td>" . $row->content . "</td>";
            echo "</tr>";
            echo "</table>";
            echo '</tr>';
        }
    ?>
</table>
<br>