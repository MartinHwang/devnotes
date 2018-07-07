<!DOCTYPE html>

<html>
    <head>
        <title>DevNotes</title>
        <link rel="stylesheet" type="text/css" href="devnotes.css">
    </head>

    <body>
        <header>
            <h3>Header</h3>
        </header>

        <aside>
            <nav>
                <p>Aside</p>
                <ul>
                    <li><a href="index.php?p=home">Home</a></li>
                    <li><a href="index.php?p=notes-css">CSS Notes</a></li>
                    <li><a href="index.php?p=notes-js">JavaScript Notes</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <?php
            $validPages = ['home', 'notes-css', 'notes-js'];
            $page = $_GET['p'];
            
            if (in_array($page, $validPages)) {
                include($page . '.html');
            } else {
                echo "Invalid page.";
            }
            ?>
        </main>

        <footer>
            &copy; 2018 Inchul Hwang
        </footer>
    </body>
</html>
