<form action="" method="post">

    <div class="from-group">
        <label for="cat-title">Update Category</label>

        <?php  // Update query

        if (isset($_GET['update'])){

            $cat_id = escape($_GET['update']);

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = escape($row['cat_id']);
                $cat_title = escape($row['cat_title']);
                ?>

                <input value="<?php if (isset($cat_title)) { echo $cat_title;}  ?>" type="text" class="form-control" name="cat_title">

            <?php }

        }  ?>


        <?php  // Update query

        if (isset($_POST['update_category'])){

            $the_cat_title = escape($_POST['cat_title']);
            $query = "UPDATE categories SET cat_title = '{$the_cat_title}'WHERE cat_id = {$cat_id}";
            $update_query = mysqli_query($connection, $query);

            if (!$update_query ){
                die('QUERY FAILEd' . mysqli_error($connection));
            }


        }

        ?>


    </div>

    <div class="from-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>

</form>