<?php require_once 'includes/init.php' // local init file for testing?>
<!doctype html>
<html lang="en">
<head>
    <?php $metatitle = '04 Insert Update'; ?>
    <?php include_once APPROOT . '/layouts/head.php' ?>
</head>
<body>
    <header id="header">
        <?php include_once APPROOT . '/layouts/header.php' ?>
    </header>
    <div id="middle">
        <div class="container">
            <h1>Insert and update database records</h1>
            <section class="light bx">
                <ul class="list list-bullet">
                    <li><strong>Insert data</strong> using the 'insert' method <code>->insert($tblName, array('key'=> 'value'))</code>.</li>
<pre class="prettyprint"><code>$user = DB2::getInstance()-&gt;insert($tblName, array('key'=> 'value'));
or
$user = DB2::getInstance()-&gt;insert($tbl_test, array(
    'firstname' => 'Nathan',
    'lastname' => 'Watts'
));</code></pre>
                    <li><strong>Insert data from form</strong> using the 'insert' method.</li>
<pre class="prettyprint"><code>
$user = DB2::getInstance()-&gt;insert(tbl_test, array(
    'firstname' => $_GET ['firstname'],
    'lastname' => $_GET ['lastname']
));</code></pre>
                    <form class="mar" action="" method="GET">
                        <input type="text" name="firstname" placeholder="first name" >
                        <input type="text" name="lastname" placeholder="last name" >
                        <input type="submit">
                    </form>
                    <!-- uncomment php to enter from form -->
                    <?php 
                        // DB2::getInstance()->insert('tbl_test', array(
                        //     'firstname'  => $_GET ['firstname'],
                        //     'lastname'   => $_GET ['lastname']
                        // ));
                     ?>
                    <li><strong>Update record</strong> using the 'update' method <code>->update($tblName, $id, array('key'=> 'value'))</code>.</li>
                    <?php 
                        $user = DB2::getInstance()->update('tbl_test', 5, array(
                            'firstname' => 'Paul',
                            'lastname'  => 'Kiderburg'
                        ));
                    ?>
<pre class="prettyprint"><code>$user = DB2::getInstance()-&gt;update($tblName, $id, array('key'=> 'value'));
or
$user = DB2::getInstance()-&gt;update('tbl_test', 5, array(
    'firstname' => 'Paul',
    'lastname' => 'Kiderburg'
));</code></pre>                    
                </ul>
            </section>
        </div>
    </div>
</body>
</html>

<?php 
    // DB2::getInstance()->insert('tbl_test', array(
    //     'firstname' => 'Nathan',
    //     'lastname' => 'Watts'
    // ));
 ?>

<ul class="list list-bullet">
                    
                    
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
                
            </ul>