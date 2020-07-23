<?php

include "./includes/header.php";



?>


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

                    <?php

                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case '1':
                            include "../include/add_comments.php";
                            break;

                        case 'edit_posts':
                            include "../include/edit_comments.php";
                            break;


                        default:
                            include "../admin/includes/view_all_comments.php";
                    }
                    ?>

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