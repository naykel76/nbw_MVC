

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
        <article>
            <h1><?php echo $data['article']->title ?></h1>
       <?php echo $data['article']->content ?>
        </article>
     </div>
 </div>
        
        <footer id="footer">
            <?php include_once APPROOT . '/layouts/footer.php' ?>
        </footer>
        
    </body>
</html>
