<header>
    <h1>Home</h1>
</header>

<div id="core">
    <table>
    <?php
    while ($line = pg_fetch_array($users, null, PGSQL_ASSOC)) {
        echo '<tr>';
            foreach ($line as $col_value) {
                echo "<td>$col_value</td>";
            }
        echo '</tr>';
    }
    ?>
    </table>
</div>
