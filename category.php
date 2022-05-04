<?php require_once 'includes/db.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'admin/functions.php'; ?>

    <!-- Navigation -->

    <?php require_once 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

                if(isset($_GET['category'])) {
                    $the_post_category_id = $_GET['category'];

                    if(is_admin($_SESSION['username'])) {
                        //////////////////// to avoid SQL injections below query has been refactored as prepare() statements
                        // $query = "SELECT * FROM posts WHERE post_category_id = $the_post_category_id ORDER BY post_id DESC";
                        $stmt1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ?");
                    } else {
                        $stmt2 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? AND post_status = ? ORDER BY post_id DESC");
                        $published = 'published';
                    }
                
                    if(isset($stmt1)) {
                        mysqli_stmt_bind_param($stmt1, "i", $the_post_category_id);
                        mysqli_stmt_execute($stmt1);
                        mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                        $stmt = $stmt1;
                    } else {
                        mysqli_stmt_bind_param($stmt2, "is", $the_post_category_id, $published); // 'i' stands for integer because value of $the_post_category_id is an integer; // 's' stands for string because value of $published is a string
                        mysqli_stmt_execute($stmt2);
                        mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                        $stmt = $stmt2;
                    }

                    // if(mysqli_stmt_num_rows($stmt) === 0) {
                    //     echo "<h3 class='text-center'>No posts</h3>";
                    // }
                    while(mysqli_stmt_fetch($stmt)):
                  ?>

                <!-- First Blog Post -->
                <div class="singlepost">
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                    </h2>
                    
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    </a>
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <!-- <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Olvass tovább<span class="glyphicon glyphicon-chevron-right"></span></a> -->
                </div>

                    <?php endwhile; mysqli_stmt_close($stmt);
                    } else {
                        header("Location: index.php");
                    }
            
            ?>
        

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php require_once 'includes/sidebar.php'?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

    <?php require_once 'includes/footer.php'; ?>