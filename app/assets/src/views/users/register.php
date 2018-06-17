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
            <div class="col-lg-6 col-md-8 mar-auto bx dark">
                <h3>Create An Account</h3>
                <p>Please fill in the form to register with us</p>
                <form class="frm" action="<?php echo BASEURL ?>/users/register" method="POST" >
                    
                    <div class="frm-row">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="<?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                        <span class="txt-red"><?php echo $data['name_err']; ?></span>
                    </div>

                    <div class="frm-row">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="text" name="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                        <span class="txt-red"><?php echo $data['email_err']; ?></span>
                    </div>


                   
                    <div class="frm-row">
                        <label>Set A Password <sup>*</sup></label>
                        <input type="password" name="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                        <span class="txt-red"><?php echo $data['password_err']; ?></span>
                    </div>

                    <div class="frm-row">
                        <label>Confirm Password <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="<?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                        <span class="txt-red"><?php echo $data['confirm_password_err']; ?></span>
                    </div>

                    <div class="flex-row">
                        <div class="col"><button type="submit" class="btn btn-primary" name="register">Register</button></div>
                        <div class="col">Have an account? <a href="<?php echo BASEURL ?>/users/login">log in</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer id="footer">
        <?php include_once APPROOT . '/layouts/footer.php' ?>
    </footer>
</body>
</html>

