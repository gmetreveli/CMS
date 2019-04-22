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
                        Welcome to Admin
                        <small>User</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php

                        insert_categories();

                        ?>



                        <form action="" method="post">

                            <div class="from-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>

                            <div class="from-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>


                        <?php //update and include query

                            if (isset($_GET['update'])){
                                $cat_id = $_GET['update'];
                                include "includes/update_categories.php";
                            }

                        ?>



                    </div><!--Add category form -->


                    <div class="col-xs-6">


                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                            <?php  // Find all categories query

                            find_all_categories();

                            ?>


                            <?php  // Delete query

                                delete_categories();

                            ?>
                            
                            </tbody>

                        </table>

                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>



