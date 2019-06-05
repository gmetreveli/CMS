<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>



<?php

if($_SERVER['REQUEST_METHOD'] == "POST")  {

    $username = escape($_POST['username']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);

    $error = [

        'username' => '',
        'email' => '',
        'password' => ''

    ];

    if (strlen($username) < 4 || strlen($username) > 16){

        $error['username'] = 'Username needs to be between 4 and 16 symbols';
    }

    if ($username == ''){

        $error['username'] = 'Username field cannot be empty';
    }

    if (username_exists($username)){

        $error['username'] = 'Username already exists';
    }


    if ($email == ''){

        $error['email'] = 'Email field cannot be empty';
    }

    if (email_exists($email)){

        $error['email'] = 'Email already exists <a href="index.php">Please login</a>';
    }

    if (strlen($password) < 7 || strlen($password) > 17){

        $error['password'] = 'Password needs to be between 7 and 17 symbols';
    }

    if ($password == ''){

        $error['password'] = 'Password field cannot be empty';
    }


    foreach ($error as $key => $value){

        if (empty($value)){

            unset($error[$key]);


        }

    }

    if (empty($error)){

        register_user($username, $email, $password);

        login_user($username, $password);

    }

}


?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
        <section id="login">
            <div class="container">
                <div class="row">

                    <div class="col-xs-6 col-xs-offset-3">

                        <div class="form-wrap">

                            <h1>Register</h1>

                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"
                                    autocomplete="on"
                                    value="<?php echo isset($username) ? $username : '' ?>">
                                    <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                                    autocomplete="on"
                                    value="<?php echo isset($email) ? $email : '' ?>">
                                    <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                    <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                                </div>

                                <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">

                            </form>

                        </div>

                    </div> <!-- /.col-xs-12 -->

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


        <hr>



<?php include "includes/footer.php";?>
