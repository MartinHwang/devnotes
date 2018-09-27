<header>
    <h1>JS Notes</h1>
</header>

<div id="core">
    <?php
    while ($row = pg_fetch_assoc($notes_js)) {
        echo '<ul class="list objectList">';
            echo "<li><a href='/notes/js/show/{$row['id']}'>{$row['title']}</a> 
                    <a href='/notes/js/edit/{$row['id']}'><span class='material-icons md-18'>edit</span></a>
                    <a href='/notes/js/delete/{$row['id']}'><span class='material-icons md-18' alt='Delete'>delete</span></a></li>";
        echo '</ul>';
    }
    ?>
    <hr>
    <a class="actions" href='/notes/js/create/'><span class='material-icons md-18'>create</span>Create New Note</a>
</div>
