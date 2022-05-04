<?php include "includes/admin_header.php" ?>

<?php

  if(!is_admin($_SESSION['username'])) {
    header("Location: index.php");
  }
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="page-header">Comments</h2>

                    <?php
                    
                    if(isset($_GET['source'])) {
                      $source = escape($_GET['source']);
                    } else {
                      $source = '';
                    }

                    switch($source) {
                      case 'add_post';
                      include "includes/add_post.php";
                      break;

                      case 'edit_post';
                      include "includes/edit_post.php";
                      break;

                      default:
                      include "includes/view_all_comments.php";

                      break;
                    }

                    
                    ?>
                    
                  </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>
