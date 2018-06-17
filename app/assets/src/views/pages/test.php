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

        <h1><?php echo $data['title']; ?></h1>


        
        <!-- 
            <div class="col-lg-6 col-md-8 mar-auto bx dark">
                <h3>Log into your account</h3>
                <p>Please fill in credentials to log in</p>
                <form class="frm" action="<?php echo BASEURL ?>/users/login" method="POST" >

                    <span class="txt-red"><?php echo $data['err_msg']; ?></span>
                    <div class="frm-row">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="text" name="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                        <span class="txt-red"><?php echo $data['email_err']; ?></span>
                    </div>

                    <div class="frm-row">
                        <label>Password: <sup>*</sup></label>
                        <input type="password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                        <span class="txt-red"><?php echo $data['password_err']; ?></span>
                    </div>
                    
                    <div class="flex-row">
                        <div class="col"><button type="submit" class="btn btn-primary">Login</button></div>
                        <div class="col">No account? <a href="<?php echo BASEURL ?>/users/register">log in</a></div>
                    </div>
                </form>
            </div>
         --></div>
    </div>
    <footer id="footer">
        <?php include_once APPROOT . '/layouts/footer.php' ?>
    </footer>
</body>
</html>

