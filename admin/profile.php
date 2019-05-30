<?php include "includes/admin_header.php"; ?>

<?php

    if (isset($_SESSION['username'])){

        $user_role = escape($_SESSION['user_role']);

        $query = "SELECT * FROM users WHERE user_role = '{$user_role}'";

        $select_user_profile = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_user_profile)){

            $user_id = escape($row['user_id']);
            $username = escape($row['username']);
            $user_password = escape($row['user_password']);
            $user_firstname = escape($row['user_firstname']);
            $user_lastname = escape($row['user_lastname']);
            $user_email = escape($row['user_email']);
            $user_image = escape($row['user_image']);
        }


    }

?>


<?php

if (isset($_POST['edit_user'])){

    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);

    $username = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);


    if (!empty($user_password)){

    $password_query = "SELECT user_password FROM users WHERE user_role = '{$user_role}'";
    $get_user_query = mysqli_query($connection, $password_query);

    confirmQuery($get_user_query);

    $row = mysqli_fetch_array($get_user_query);

    $db_user_password = escape($row['user_password']);

    if ($db_user_password != $user_password) {
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 7));

        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$hashed_password}' ";
        $query .= "WHERE username = '{$username}' ";


        $edit_user_query = mysqli_query($connection, $query);

        confirmQuery($edit_user_query);
    }

    }
}

?>



<div id="wrapper">



    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>



    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to Admin
                        <small>User</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">

                            <label for="author">Firstname</label>
                            <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">

                        </div>

                        <div class="form-group">

                            <label for="status">Lastname</label>
                            <input type="text" value="<?php echo $user_lastname; ?>"  class="form-control" name="user_lastname">

                        </div>

                        <div class="form-group">

                            <label for="title">Username</label>
                            <input type="text" value="<?php echo $username; ?>"  class="form-control" name="username">

                        </div>

                        <div class="form-group">

                            <label for="tags">Email</label>
                            <input type="email" value="<?php echo $user_email; ?>"  class="form-control" name="user_email">

                        </div>

                        <div class="form-group">

                            <label for="tags">Password</label>
                            <input type="password" autocomplete="off" class="form-control" name="user_password">

                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-primary" name="edit_user" value="Add Profile">

                        </div>


                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>



