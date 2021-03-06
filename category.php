<?php
include  "includes/db.php";
?>

<?php
include  "includes/header.php";
?>

    <!-- Navigation -->

<?php
include  "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                    if (isset($_GET['category'])){

                        $post_category_id = escape($_GET['category']);

                        if (is_admin($_SESSION['username'])){

                            $stmt1 = mysqli_prepare($connection,"SELECT post_id, post_title, post_author, post_date, post_image, post_content  FROM posts WHERE post_id = ? ");

                        } else {

                            $stmt2 = mysqli_prepare($connection,"SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id= ? AND post_status = ? ");

                            $published = 'published';

                        }


                    $select_all_posts_query = mysqli_query($connection, $query);

                    if (mysqli_num_rows($select_all_posts_query) < 1){

                        echo "<h1 class='text-center'>No published post available at the moment</h1>";

                    } else {

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_id = escape($row['post_id']);
                        $post_title = escape($row['post_title']);
                        $post_author = escape($row['post_author']);
                        $post_date = escape($row['post_date']);
                        $post_image = escape($row['post_image']);
                        $post_content = escape(substr($row['post_content'], 0, 150));

                     ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>


                    <?php }}} else {

                        header("Location: index.php");
                    }
                ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->

                <?php
                include "includes/sidebar.php";
                ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
            <?php
                include "includes/footer.php";
            ?>

