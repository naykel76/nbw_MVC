<?php require_once 'includes/init.php' // local init file for testing?>
<!doctype html>
<html lang="en">
<head>
    <?php $metatitle = '03 Results'; ?>
    <?php include_once APPROOT . '/layouts/head.php' ?>
</head>
<body>
    <header id="header">
        <?php include_once APPROOT . '/layouts/header.php' ?>
    </header>

    <div id="middle">
        <div class="container">
            <h1>Getting results from the database</h1>
            <section class="light bx">
                <ul class="list list-bullet">
                    <li>Results are returned using the 'query' method <code>->query($sql)</code> or the 'action' method <code>->actionType($tblName, array()</code>.</li>
<pre class="prettyprint">$user = DB2::getInstance()->query("SELECT * FROM tbl_test");
or
$user = DB2::getInstance()->get('tbl_test', array('firstname', '=', 'Mike'));
</pre>
                    <li><strong>Return and display single record</strong> with the 'action' method to get the record and the 'first' method to display the results.</li>
<pre class="prettyprint"><code>$user = DB2::getInstance()-&gt;get('tbl_test', array('firstname', '=', 'Mike'));
if(!$user-&gt;count()) {
    echo &quot;no records returned&quot;;
} else {
    echo $user-&gt;first()-&gt;firstname;
}</code></pre>
                    <div class="bx pad-sm orange">
                        <?php
                            $user = DB2::getInstance()->get('tbl_test', array('firstname', '=', 'Mike'));
                            if(!$user->count()) {
                                echo "no records returned";
                            } else {
                                echo $user->first()->firstname;
                            }
                        ?>
                    </div>
                    <li><strong>Resturn and display record set</strong> with the 'query' method and the 'results' method.</li>
<pre class="prettyprint"><code>$user = DB2::getInstance()-&gt;query(&quot;SELECT * FROM tbl_test&quot;);
if(!$user-&gt;count()) {
    echo &quot;no records returned&quot;;
} else {
    foreach($user-&gt;results() as $user) {
        echo $user-&gt;firstname . &quot;&lt;br&gt;&quot;;
    }
}</code></pre>
                    <div class="bx pad-sm orange">
                        <?php
                            $user = DB2::getInstance()->query("SELECT * FROM tbl_test");
                            if(!$user->count()) {
                                echo "no records returned";
                            } else {
                                foreach($user->results() as $user) {
                                    echo $user->firstname . "<br>";
                                }
                            }

                        ?>
                    </div>   
                </ul>
            </section>
        </div>
    </div>
    </body>
    </html>
