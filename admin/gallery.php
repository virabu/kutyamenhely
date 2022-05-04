<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="page-header">Gallery</h2>

                    <?php
                    
                    if(isset($_GET['source'])) {
                      $source = escape($_GET['source']);
                    } else {
                      $source = '';
                    }

                    switch($source) {
                      case 'add_photo';
                      include "includes/add_photo.php";
                      break;

                      case 'edit_photo';
                      include "includes/edit_photo.php";
                      break;

                      default:
                      include "includes/view_gallery.php";
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
