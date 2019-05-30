
<?php  include "db.php"; ?>
<?php  session_start(); ?>
<?php  include "admin/functions.php"; ?>

<?php

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = escape($username);
    $password = escape($password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query){
        die("Query Failed" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)){

        $db_user_id = escape($row['user_id']);
        $db_username = escape($row['username']);
        $db_user_password = escape($row['user_password']);
        $db_user_firstname = escape($row['user_firstname']);
        $db_user_lastname = escape($row['user_lastname']);
        $db_user_role = escape($row['user_role']);


    }

//    $password = crypt($password, $db_user_password);

    if (password_verify($password, $db_user_password)) {

        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;

        header("Location: ../admin");

    } else {

        header("Location: ../index.php");
    }


}

?>