<ul class="nav flexnav">

    <li><a href="<?php echo BASEURL; ?>/articles/articles">Articles</a></li>
    <li><a href="<?php echo BASEURL; ?>/articles/category/HCI">HCI</a></li>
    <!-- <li><a href="<?php echo BASEURL; ?>/articles/article-list">Article List</a></li> -->
    <?php if(isLoggedIn()) : ?>
        <li><a href="<?php echo BASEURL; ?>/users/logout">logout</a></li>
    <?php else : ?>
        <li><a href="<?php echo BASEURL; ?>/users/login">login</a></li>
        <li><a href="<?php echo BASEURL; ?>/users/register">register</a></li>
    <?php endif; ?>

</ul>