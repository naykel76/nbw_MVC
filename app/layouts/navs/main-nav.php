<ul class="nav flexnav">

    <?php if(isLoggedIn()) : ?>
        <li><a href="<?php echo BASEURL; ?>/users/logout">logout</a></li>
    <?php else : ?>
        <li><a href="<?php echo BASEURL; ?>/users/login">login</a></li>
        <li><a href="<?php echo BASEURL; ?>/users/register">register</a></li>
    <?php endif; ?>

</ul>