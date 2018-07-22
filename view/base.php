<!DOCTYPE html>

<html>
    <head>
        <title>DevNotes</title>
        <link rel="stylesheet" type="text/css" href="/devnotes.css">
    </head>

    <body>
        <header>
            <h3>Header</h3>
        </header>

        <aside>
            <nav>
                <p>Aside</p>
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/notes-css">CSS Notes</a></li>
                    <li><a href="/notes-js">JavaScript Notes</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <?php include $view; ?>
        </main>

        <footer>
            &copy; 2018 Inchul Hwang
        </footer>
    </body>
</html>
