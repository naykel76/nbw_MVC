<?php require_once 'includes/init.php' // local init file for testing?>
<!doctype html>
<html lang="en">
<head>
    <?php $metatitle = '02 Query'; ?>
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
                    <li><strong>Connection to the database</strong> with with <code>DB2::getInstance()</code>. <br>This method checks to see if there is a connection (instance) to the database and will connected if required.</li>
<pre class="prettyprint">$db = DB2::getInstance();</code></pre>          
                    <li><strong>Query the database (manual)</strong> <code>->query($sql, array())</code>. <br>This method runs the database query and binds values into the array. <br>SQL = <code>("SELECT firstname FROM tbl_users WHERE firstname = ?", array('Nathan'));</code></li>
<pre class="prettyprint">$user = DB2::getInstance()->query($sql, array());
or
$user = DB2::getInstance()->query("SELECT firstname FROM tbl_test WHERE firstname = ?", array('Mike'));
</pre>
                    <div class="bx pad-sm orange">
                        <strong>Query test for manual query = </strong>
                        <?php
                            $db = DB2::getInstance(); // database connection
                            $users = $db->query("SELECT firstname FROM tbl_test WHERE firstname = ?", array('Mike'));
                            if($users->error()) {
                                echo "no records returned";
                            } else {
                                echo "OK!";
                            }
                        ?>
                    </div>
                    <li><strong>Query that database </strong> <code>->actionType('tblName', array('where', 'operator', 'value'))</code> <br> The query is run by calling one of the action methods (get, insert, update, delete).<br>
                    This calls the 'queryAction' method which in turn builds the sql.</li>
<pre class="prettyprint">$user = DB2::getInstance()->actionType($tblName, array());
or
$user = DB2::getInstance()->get('tbl_test', array('firstname', '=', 'Mike'));
</pre>
                    <div class="bx pad-sm orange">
                        <strong>Query test for manual query = </strong>
                        <?php
                            $users = $db->get('tbl_test', array('firstname', '=', 'Mike'));
                            if(!$users->count()) {
                                echo "no records returned";
                            } else {
                                echo "OK!";
                            }
                        ?>
                    </div>   
                </ul>
                
        </section>
            </div>
        </div>
    </body>
    </html>
