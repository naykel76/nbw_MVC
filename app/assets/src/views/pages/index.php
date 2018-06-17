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
        
        <div class="hero">
            <picture>
                <source srcset="images/hero-xl.jpg 1920w" media="(min-width: 1380px)">
                <source srcset="images/hero-lg.jpg 1380w" media="(min-width: 980px)">
                <source srcset="images/hero-md.jpg 980w" media="(min-width: 640px)">
                <img srcset="images/hero-sm.jpg 480w" alt="Moving fast at night">
            </picture>
            <div class="hero-text">
                <h1 class="hero-title">HERO TITLE</h1>
                <h2 class="hero-subtitle">Super Awesome Inspiring Words</h2>
            </div>
        </div>
        
        <footer id="footer">
            <?php include_once APPROOT . '/layouts/footer.php' ?>
        </footer>
        
    </body>
</html>