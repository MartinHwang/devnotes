<!DOCTYPE html>

<html>
    <head>
        <title>DevNotes</title>

        <link rel="stylesheet" type="text/css" href="/devnotes.css">

        <link href="https://fonts.googleapis.com/css?family=Noto+Sans:700|Noto+Serif+KR|Material+Icons" rel="stylesheet">
    </head>

    <body>
        <header>
            <span>DevNotes</span>
        </header>

        <aside>
            <nav>
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/notes/css">CSS Notes</a></li>
                    <li><a href="/notes/js">JavaScript Notes</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <?php if (isset($message)) { echo "<div id='notice'>$message</div>"; } ?>

            <?php include $contents; ?>
        </main>

        <footer>
            &copy; 2018 Martin Hwang
        </footer>
    </body>
</html>
