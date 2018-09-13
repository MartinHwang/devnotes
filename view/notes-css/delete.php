<header>
    <p>CSS Notes</p>
</header>

<div id="core">
    <form method="post" action="/notes/css/doDelete">
        <label>Title<br>
            <input name="title" type="text" value="<?= $note->title ?>"></label>

        <label>Note<br>
            <textarea name="note"><?= $note->note ?></textarea></label>

        <input name="id" type="hidden" value="<?= $note->id ?>">

        <button type="submit">Delete</button>
    </form>
</div>
