<ul class="nav flexnav">

    <li><a href="<?php echo BASEURL; ?>/articles/articles">Articles</a></li>
    <li><a href="<?php echo BASEURL; ?>/tests/test">Tests</a></li>
    <li><a href="<?php echo BASEURL; ?>/dev">Dev</a></li>

    <?php if(isLoggedIn()) : ?>
        <li><a href="<?php echo BASEURL; ?>/users/logout">logout</a></li>
    <?php else : ?>
        <li><a href="<?php echo BASEURL; ?>/users/login">login</a></li>
        <li><a href="<?php echo BASEURL; ?>/users/register">register</a></li>
    <?php endif; ?>

</ul>