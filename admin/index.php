<?php require_once "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small> <?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        ////////////////refactored with checkNumRowsWhere() function, see functions.php

                                        // $query = "SELECT * FROM posts WHERE post_status = 'published'";
                                        // $select_published_post = mysqli_query($connection, $query);
                                        // $published_post_count = mysqli_num_rows($select_published_post);

                                        $published_post_count = checkNumRowsWhere('posts', 'post_status', 'published');
                                        $draft_post_count = checkNumRowsWhere('posts', 'post_status', 'draft');

                                        echo "<div class='huge'>{$published_post_count} + {$draft_post_count}</div>";
                                        ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                                        $approved_comment_count = checkNumRowsWhere('comments', 'comment_status', 'approved');
                                        $unapproved_comment_count = checkNumRowsWhere('comments', 'comment_status', 'unapproved');

                                        echo "<div class='huge'>{$approved_comment_count} + {$unapproved_comment_count}</div>";
                                        ?>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                                        $subscriber_user_count = checkNumRowsWhere('users', 'user_role', 'subscriber');
                                        $admin_user_count = checkNumRowsWhere('users', 'user_role', 'admin');

                                        echo "<div class='huge'>{$subscriber_user_count} + {$admin_user_count}</div>";
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $categories_count = checkNumRows('categories');
                                        echo "<div class='huge'>{$categories_count}</div>";
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <?php
                
                ?>

                <div class="row">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php
                            
                            $element_text = ['Published Posts', 'Draft Posts', 'Approved Comments', 'Unapproved Comments', 'Subscribers', 'Admins', 'Categories'];
                            $element_count = [$published_post_count, $draft_post_count, $approved_comment_count, $unapproved_comment_count, $subscriber_user_count, $admin_user_count, $categories_count];

                            for($i = 0; $i < count($element_text); $i++) {
                                echo "['{$element_text[$i]}', {$element_count[$i]}],";
                            }
                            
                            ?>

                            // ['Posts', 1000],
                            ]);

                            var options = {
                            chart: {
                                title: 'Kutyamenhely Statistics',
                                subtitle: '2022',
                            }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>
