<?php include "./includes/header.php"; ?>


<div id="wrapper">


    <?php include "./includes/navigation.php" ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blank Page
                        <small>Subheading</small>
                    </h1>
                    <div class="col-xs-6">
                        <?php if (isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];
                            if ($cat_title == "" || empty($cat_title)) {
                                echo "<h1>this should not be empty";
                            } else {
                                $sql = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";


                                if (mysqli_query($conn, $sql)) {
                                    echo "new category added";
                                } else {
                                    die('error in adding category' . mysqli_error($conn));
                                }
                            }
                        } ?>


                       
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Categories</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <input class="btn btn-primary" name="submit" type="submit" value="Add categories">



                        </form>
                        <form action="#" method="post">
                            <div class="form-group">
                                <!-- category update -->

                                <label for="update_cat">update Categories</label>

                            </div>

                            <?php include "./includes/update_categories.php"  ?>

                        </form>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categories</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_assoc($select_all_categories)) {
                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];

                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>";
                                        echo  "<td>{$cat_title}</td>";
                                        // to delete categories we are using delete function in the url
                                        echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
                                        echo "<td><a href='categories.php?update={$cat_id}'>UPDATE</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <!-- we are checking for the delete key -->
                                    <?php if (isset($_GET['delete'])) {
                                        $deleting_category = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id= $deleting_category";
                                        if (mysqli_query($conn, $query)) {
                                            echo "category deleted sucessfully";
                                            // we need to r4efresh the page after deleting category
                                            header("Location: categories.php");
                                        } else {
                                            echo 'category not deleted';
                                        }
                                    }


                                    ?>



                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "./includes/footer.php" ?>