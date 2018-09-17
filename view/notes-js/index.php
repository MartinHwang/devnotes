<header>
    <p>JS Notes</p>
</header>

<div id="core">
    <?php
        while ($row = pg_fetch_assoc($notes_js)) {
            echo '<ul>';
                echo "<li><a href='/notes/js/show/{$row['id']}'>{$row['title']}</a> 
                        <a href='/notes/js/edit/{$row['id']}'>Edit</a>
                        <a href='/notes/js/delete/{$row['id']}'>Delete</a></li>";
            echo '</ul>';
        }
    ?>
    <hr>
    <a href='/notes/js/create/'>Create New Note</a>
</div>
