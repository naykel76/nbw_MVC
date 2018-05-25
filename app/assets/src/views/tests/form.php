<!doctype html>
<html lang="en">
<head>
    <?php include_once APPROOT . '/layouts/head.php' ?>
</head>
<body>
    <header id="header">
        <?php include_once APPROOT . '/layouts/header.php' ?>
    </header>
    <div class="col-md-6 mar-auto mar-lg-t">
            <!-- <form class="frm" action="<?php echo BASEURL ?>/tests/form" method="POST"> -->
            <form class="frm"  method="POST">
                <div class="bx light">
                    <div class="frm-row">
                        <label for="firstname">First Name: <sup>*</sup></label>
                        <!-- IF ('firstname_err' IS NOT empty){
                                // there is an error so...
                                add class, set value to $data['firstname']
                             } 
                            value="<?php echo $data['firstname'] ?>" // this keeps the field value to prevent needing to re-type 
                            https://www.udemy.com/object-oriented-php-mvc/learn/v4/t/lecture/8287176?start=0
                        -->
                        <input type="text" name="firstname" class="<?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>">
                        <!-- display the 'firstname_err' -->
                        <span class="txt-red"><?php echo $data['firstname_err']; ?></span>
                    </div>

                    <div class="frm-row">
                        <label for="lastname">Last Name: <sup>*</sup></label>
                        <input type="text" name="lastname" class="<?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>">
                        <span class="txt-red"><?php echo $data['lastname_err']; ?></span>
                    </div>
                    

                <div class="frm-row">
                    <button type="submit" class="btn btn-primary">Test Form</button>
                </div>
            </div>
        </form>
    </div>
    <footer id="footer">
        <?php include_once APPROOT . '/layouts/footer.php' ?>
    </footer>
</body>
</html>