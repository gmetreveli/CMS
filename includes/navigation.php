<?php  include "admin/functions.php"; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">


        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS FRONT</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                    <?php

                        $query = "SELECT * FROM categories";
                        $select_all_categories_query = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_all_categories_query)){
                            $cat_id = escape($row['cat_id']);
                            $cat_title = escape($row['cat_title']);
                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }
                    ?>

                <li>
                    <a href="admin/">Admin</a>
                </li>
                <li>
                    <a href="registration.php">Registration</a>
                </li>


                <?php
                    //This if checks whether session is started or not, and if it's not started, it starts it.
                    if (session_status() == PHP_SESSION_NONE) session_start();

                    if (isset($_SESSION['user_role'])){

                        if (isset($_GET['p_id'])){

                            $the_post_id = escape($_GET['p_id']);
                            echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit post</a></li>";
                        }

                    }

                ?>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>