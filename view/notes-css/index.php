<header>
    <h1>CSS Notes</h1>
</header>

<div id="core">
    <?php
    while ($row = pg_fetch_assoc($notes_css)) {
        echo '<ul class="list objectList">';
            echo "<li><a href='/notes/css/show/{$row['id']}'>{$row['title']}</a><!--
             --><a href='/notes/css/edit/{$row['id']}'><span class='material-icons md-18'>edit</span></a><!--
             --><a href='/notes/css/delete/{$row['id']}'><span class='material-icons md-18'>delete</span></a></li>";
        echo '</ul>';
    }
    ?>
    <hr>
    <a class="actions" href='/notes/css/create/'><span class='material-icons md-18'>create</span>Create New Note</a>
</div>
