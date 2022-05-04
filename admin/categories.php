<?php require_once "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Categories</h2>

                        <div class="col-xs-6">

                        <?php insert_categories(); ?>

                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat-title">Add Category</label>
                              <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                            
                          </form>

                          <?php //Update And Include Query
                          
                          if(isset($_GET['edit'])) {
                            $cat_id = escape($_GET['edit']);

                            require_once "includes/update_categories.php";
                          }
                          
                          ?>

                        </div><!-- Add Category Form -->

                        <div class="col-xs-6">

                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php //Find All Categories Query

                              findAllCategories();
                            
                            ?>

                            <?php

                            //Delete Query
                            
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

        <?php require_once "includes/admin_footer.php" ?>
