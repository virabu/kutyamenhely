<?php ob_start(); ?>
<?php require_once 'includes/db.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

                if(isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                    
                    $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id";
                    $update_view_query = mysqli_query($connection, $view_query);
                    if(!$update_view_query) {
                        die("Query failed" . mysqli_error($connection));
                    }

                    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                    } else {
                        $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'published' ";
                    }
                
                    $select_all_posts_query = mysqli_query($connection, $query);
                    if(mysqli_num_rows($select_all_posts_query) < 1) {
                        echo "<h3 class='text-center'>No posts</h3>";
                    } else {

                    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    // $post_author = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

                    ?>

                    <!-- First Blog Post -->
                    <h2>
                        <?php echo $post_title ?>
                    </h2>
                    
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <img class="img-responsive" src="images/<?php echo imagePlaceholder($post_image); ?>" alt="">
                    
                    <p><?php echo $post_content ?></p>

                    <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-chevron-left"></span> Vissza
                    </a>

                    <?php }                
                ?>
                    
                <?php } } else {
                    header("Location: index.php");
                }
                
                ?>
            </div>
            <br>

            <!-- Blog Sidebar Widgets Column -->
            <?php require_once 'includes/sidebar.php'?>

        </div>
        <!-- /.row -->

        <hr>

    <!-- Footer -->
    <?php require_once 'includes/footer.php'; ?>