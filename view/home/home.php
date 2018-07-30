<header>
    <p>Home</p>
</header>

<div id="core">
    <?php
        echo '<table>';
        while ($line = pg_fetch_array($users, null, PGSQL_ASSOC)) {
            echo '<tr>';
            foreach ($line as $col_value) {
                echo "<td>$col_value</td>";
            }
            echo '</tr>';
        }
        echo '</table>';
    ?>
</div>
