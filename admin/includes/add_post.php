<?php

  if(isset($_POST['create_post'])) {
    $post_title = escape($_POST['title']);
    $post_user = escape($_POST['post_user']);
    $post_category_id = escape($_POST['post_category']);

    $post_image = escape($_FILES['image']['name']);
    $post_image_temp = escape($_FILES['image']['tmp_name']);

    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_date = escape(date('d-m-y'));
    $post_comment_count = escape(0);
    $post_status = escape($_POST['post_status']);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_user}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

    $the_post_id = mysqli_insert_id($connection); //will pull out the last created id from the database

    echo "<p class='bg-success' >Post created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit Other Posts</a></p>";

  }

?>

<h3>Create New Post</h3>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" required>
  </div>

  <div class="form-group">
    <label for="post_category">Category</label><br>

    <select name="post_category" id="post_category">

      <?php
      
        $query = " SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);

        confirmQuery($select_categories);
                    
        while($row = mysqli_fetch_assoc($select_categories)) {
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];

          echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
      
      ?>

    </select>
    
  </div>
      
  <div class="form-group">
    <label for="post_user">User</label><br>
    <!-- <input type="text" class="form-control" name="author"> -->
    <select name="post_user" id="post_user">
      <?php
        $query = " SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);

        confirmQuery($select_users);
                    
        // while($row = mysqli_fetch_assoc($select_users)) {
        //   $user_id = $row['user_id'];
        //   $username = $row['username'];

          if(isset($_SESSION['username'])) {
            $myUserName = $_SESSION['username'];
            echo "<option selected value='{$myUserName}'>{$myUserName}</option>";
          }
          // echo "<option value='{$username}'>{$username}</option>";
        // }
      ?>
    </select>
  </div>
     
  <div class="form-group">
    <label for="post_status">Status</label><br>
    <select name="post_status" id="post_status">
      <option value="draft">draft</option>
      <option value="published">published</option>
    </select>
  </div>
     
  <div class="form-group">
    <label for="post_image">Image</label>
    <input type="file" name="image">
  </div>
   
  <div class="form-group">
    <label for="post_tags">Tags</label>
    <input type="text" class="form-control" name="post_tags" required>
  </div>
      
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" id="summernote" cols="30" rows="10" class="form-control" required></textarea>
  </div>
     
  <div class="form-group">
     
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish">
     
  </div>
</form>