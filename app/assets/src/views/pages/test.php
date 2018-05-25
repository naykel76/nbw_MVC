<?php include_once APPROOT . '/layouts/header.php' ?>

<h5 class='txt-red'>/views/pages/test.php loaded!</h5>

<!-- Load some data from the data array -->
<?php echo $data['msg'] . '<br>'?>
<?php echo 'Hello ' . $data['firstname'] ?>



<!-- Access the database results as an object rather than an item -->
<!-- $person->firstname instead of $person['firstname'] -->
<?php foreach ($data['people'] as $person): ?>
    <li><?php echo $person->firstname . " " . $person->firstname ?></li>
<?php endforeach ?>