<header>
    <p>CSS Notes</p>
</header>

<div id="core">
    <?php
        while ($row = pg_fetch_assoc($notes_css)) {
            echo '<ul>';
                echo "<li>{$row['title']} 
                    <a href='/notes/css/show/{$row['id']}'>Read</a> 
                    <a href='/notes/css/edit/{$row['id']}'>Edit</a>
                    <a href='#{$row['id']}'>Delete</a></li>";
            echo '</ul>';
        }
    ?>
</div>