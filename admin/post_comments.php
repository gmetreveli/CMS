<?php include "includes/admin_header.php"; ?>

<div id="wrapper">



    <!-- Navigation -->

    <?php include "includes/admin_navigation.php"; ?>



    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to Comments
                        <small>User</small>
                    </h1>

<?php

if (isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $comment_value_id){

        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {

            case  'approved':

                $query = "Update comments Set comment_status = '{$bulk_options}' WHERE comment_id = {$comment_value_id} ";
                $update_to_approved_status = mysqli_query($connection, $query);
                confirmQuery($update_to_approved_status);
                Break;

            case 'draft':

                $query = "Update comments Set comment_status = '{$bulk_options}' WHERE comment_id = {$comment_value_id} ";
                $update_to_unapproved_status = mysqli_query($connection, $query);
                confirmQuery($update_to_unapproved_status);
                Break;

            case 'delete':

                $query = "DELETE FROM comments WHERE comment_id = {$comment_value_id} ";
                $delete_from_posts = mysqli_query($connection, $query);
                confirmQuery($delete_from_posts);
                Break;

        }
    }

}

?>

<form action="" method="post">

    <table class="table table-bordered table-hover">

        <div id="bulkOptionContainer" class="col-xs-4">

            <select class="form-control" name="bulk_options" id="">

                <option value="">Select Options</option>
                <option value="approved">Approve</option>
                <option value="unapproved">Unapprove</option>
                <option value="delete">Delete</option>

            </select>

        </div>

        <div class="col-xs-4">

            <input type="submit" name="submit" class="btn btn-success" value="Apply">

        </div>

        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>

        <?php

        $query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($connection, $_GET['id']) ." ";
        $select_comments = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = escape($row['comment_id']);
            $comment_post_id = escape($row['comment_post_id']);
            $comment_author = escape($row['comment_author']);
            $comment_content = escape($row['comment_content']);
            $comment_email = escape($row['comment_email']);
            $comment_status = escape($row['comment_status']);
            $comment_date = escape($row['comment_date']);


            echo "<tr>";
            ?>

            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $comment_id; ?>'></td>

            <?php


            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";


            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_post_id_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_post_id_query)){

                $post_id = escape($row['post_id']);
                $post_title = escape($row['post_title']);

                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</td></td>";

            }


            echo "<td>{$comment_date}</td>";
            echo "<td><a href='post_comments.php?approve={$comment_id}'>Approve</a></td>";
            echo "<td><a href='post_comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
            echo "<td><a href='post_comments.php?delete={$comment_id}&id=" . $_GET['id'] . "'>Delete</a></td>";
            echo "</tr>";

        }

        ?>

        </tbody>

    </table>
</form>

<?php

if (isset($_GET['approve'])){

    if (isset($_SESSION['user_role'])) {

        if ($_SESSION['user_role'] == 'admin') {

            $the_comment_id = escape($_GET['approve']);

            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
            $approve_query = mysqli_query($connection, $query);

            header("Location: post_comments.php");
        }
    }
}


if (isset($_GET['unapprove'])){

    if (isset($_SESSION['user_role'])) {

        if ($_SESSION['user_role'] == 'admin') {

            $the_comment_id = escape($_GET['unapprove']);

            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
            $unapprove_query = mysqli_query($connection, $query);

            header("Location: post_comments.php");
        }
    }
}

if (isset($_GET['delete'])){

    if (isset($_SESSION['user_role'])) {

        if ($_SESSION['user_role'] == 'admin') {

            $the_comment_id = escape($_GET['delete']);

            $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
            $delete_query = mysqli_query($connection, $query);

            header("Location: post_comments.php?id=" . $_GET['id'] . " ");
        }
    }
}

?>


</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
