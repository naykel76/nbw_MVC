



<!doctype html>
<html lang="en">
<head>
    <?php $metatitle = 'Page Title'; ?>
    <?php include_once APPROOT . '/layouts/head.php' ?>
</head>
<body>

    <header id="header">
        <?php include_once APPROOT . '/layouts/header.php' ?>
    </header>

    <div id="middle">
        <div class="container">
            <table class="tbl-striped">
                <thead class="dark">
                    <tr>
                        <?php
                        $cols = array( "ID", "Article Title", "Category", "Sort");
                        foreach ($cols as $col){echo "<th>" . $col . "</th>" ;}
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['articles'] as $article) : ?>
                        <tr>
                            <td><?php echo $article->id ?></td>
                            <td><a href="articles/show/<?php echo $article->id ?>"><?php echo $article->title ?></a></td>
                            <td><?php echo $article->category ?></td>
                            <td><?php echo $article->sort ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer id="footer">
        <?php include_once APPROOT . '/layouts/footer.php' ?>
    </footer>

</body>
</html>




