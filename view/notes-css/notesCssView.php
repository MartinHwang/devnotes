<header>
    <p>CSS Notes</p>
</header>

<div id="core">
    <?php
        while ($row = pg_fetch_assoc($notes_css)) {
            echo '<article>';
                echo "<h2>{$row['title']}</h2>";
                echo "<p>{$row['note']}</p>";
            echo '</article>';
        }
    ?>
</div>
