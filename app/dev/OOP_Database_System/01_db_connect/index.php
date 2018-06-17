<?php require_once 'includes/init.php' // local init file for testing?>
<!doctype html>
<html lang="en">
    <head>
        <?php $metatitle = '01 DB OOP'; ?>
        <?php include_once APPROOT . '/layouts/head.php' ?>
    </head>
    <body>
        <header id="header">
            <?php include_once APPROOT . '/layouts/header.php' ?>
        </header>
        <div id="middle">
            <div class="container">
                <h1>Working with the Database</h1>
                <section class="light bx">
                    <ul class="list list-bullet">
                        <li><strong>Connection to the database</strong> with with <code>DB2::getInstance()</code>. <br>This function checks to see if there is a connection (instance) to the database and will connected if required</li>
                    </ul>
                    <div class="bx orange">
                        <?php
                            $db = DB2::getInstance(); // database connection

                            if ($db) {
                                echo "Connected Sucessfully";
                            }
                        ?>
                    </div>
<pre class="prettyprint"><code>$db = DB2::getInstance();</code></pre>                    
                </section>
                
            </div>
        </div>
    </body>
</html>

