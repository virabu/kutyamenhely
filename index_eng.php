<?php require_once 'includes/db.php'; ?>
<?php require_once 'includes/header.php'; ?>

<!-- <?php phpinfo() ?> -->

    <!-- Navigation -->

    <?php require_once 'includes/navigation_eng.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

                $per_page = 5;

                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }

                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                    $post_query_count = "SELECT * FROM posts";
                } else {
                    $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
                }
            
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);

                if($count < 1) {
                    echo "<h3 class='text-center'>No posts</h3>";
                } else {

                $count = ceil($count / $per_page); //for loop uses this at the pagination at the bottom

                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                    $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1, $per_page";
                } else {
                    $query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC LIMIT $page_1, $per_page";
                }
                
                $select_all_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = substr($row['post_content'], 0, 200);
                  $post_status = $row['post_status'];
                  ?>

                    <!-- First Blog Post -->
                <div class="singlepost">

                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                        <!-- <a href="post/<?php echo $post_id; ?>"><?php echo $post_title ?></a> if you want pretty URL -->
                    </h2>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>

                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                        <img class="img-responsive" src="images/<?php echo imagePlaceholder($post_image); ?>" alt="">
                    </a>
                    
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Olvass tovább 
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>

                    <?php }
                }
                ?>
        
            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php require_once 'includes/sidebar_eng.php'?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->

        <ul class="pager">
            <?php
                for($i = 1; $i <= $count; $i++) {
                    if($i == $page) {
                        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                    } else {
                        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                    }
                }
            ?>
        </ul>

        <!-- Footer -->

    <?php require_once 'includes/footer.php'; ?>