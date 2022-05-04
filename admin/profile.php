<?php include "includes/admin_header.php" ?>
<?php

  if(isset($_SESSION['username'])) {
    $username = escape($_SESSION['username']);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_profile)) {
      $user_id = $row['user_id'];
      $username = $row['username'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_image = $row['user_image'];
    }
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
                    <h2 class="page-header">Profile of <?php echo $username; ?></h2>
                    <?php
                    
                    if(isset($_POST['edit_user'])) {
                      $user_firstname = escape($_POST['user_firstname']);
                      $user_lastname = escape($_POST['user_lastname']);
                      $username = escape($_POST['username']);
                      $user_email = escape($_POST['user_email']);
                      $user_password = escape($_POST['user_password']);
                  
                      if(!empty($user_password)) {
                        $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
                        $get_user_query = mysqli_query($connection, $query);
                        confirmQuery($get_user_query);
                  
                        $row = mysqli_fetch_array($get_user_query);
                  
                        $db_user_password = $row['user_password'];
                  
                        if($db_user_password != $user_password) {
                          $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, ['cost' => 12]);
                        }
                  
                        $query = "UPDATE users SET ";
                        $query .= "user_firstname = '{$user_firstname}', ";
                        $query .= "user_lastname = '{$user_lastname}', ";
                        $query .= "username = '{$username}', ";
                        $query .= "user_email = '{$user_email}', ";
                        $query .= "user_password = '{$hashed_password}' ";
                        $query .= "WHERE username = '{$username}' ";
                  
                        $update_profile_query = mysqli_query($connection, $query);
                  
                        confirmQuery($update_profile_query);

                        echo "Profile updated: " . " " . "<a href='users.php'>View Users</a>";
                      }
                    }
                    
                    ?>

                    <form action="" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="user_firstname">Firstname</label>
                        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                      </div>
                        
                      <div class="form-group">
                        <label for="user_lastname">Lastname</label>
                        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                      </div>
                      
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                      </div>
                          
                      <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
                      </div>

                      <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo $user_password; ?>">
                      </div>
                        
                      <div class="form-group">
                        
                        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                        
                      </div>
                    </form>
                    
                  </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>
