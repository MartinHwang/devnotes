<header>
    <h1>CSS Notes</h1>
</header>

<div id="core">
    <form method="post" action="/notes/css/doDelete">
        <label>Title<br>
            <input name="title" type="text" value="<?= $note->title ?>"></label>

        <label>Note<br>
            <textarea name="note"><?= $note->note ?></textarea></label>

        <input name="id" type="hidden" value="<?= $note->id ?>">

        <button type="submit"><span class="material-icons md-18">delete</span>Delete</button>
    </form>
</div>
