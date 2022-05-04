<?php

if(isset($_GET['edit_user'])) {

  $the_user_id = escape($_GET['edit_user']);

  $query = "SELECT * FROM users WHERE user_id = $the_user_id";
  $select_users_query = mysqli_query($connection, $query);
                                    
  while($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
  }

  if(isset($_POST['edit_user'])) {
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    $username = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);

    // $query = "SELECT randSalt FROM users"; //gets the hashformat from the database to be able to encrpyt the updated password below
    // $select_randsalt_query = mysqli_query($connection, $query);

    // if(!$select_randsalt_query) {
    //   die("Query failed" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    // }


    if(!empty($user_password)) {
      $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
      $get_user_query = mysqli_query($connection, $query_password);
      confirmQuery($get_user_query);

      $row = mysqli_fetch_array($get_user_query);

      $db_user_password = $row['user_password'];

      if($db_user_password != $user_password) {
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, ['cost' => 12]);
      }

      $query = "UPDATE users SET ";
      $query .= "user_firstname = '{$user_firstname}', ";
      $query .= "user_lastname = '{$user_lastname}', ";
      $query .= "user_role = '{$user_role}', ";
      $query .= "username = '{$username}', ";
      $query .= "user_email = '{$user_email}', ";
      $query .= "user_password = '{$hashed_password}' ";
      $query .= "WHERE user_id = {$the_user_id} ";

      $edit_user_query = mysqli_query($connection, $query);

      confirmQuery($edit_user_query);

      echo "User updated: " . " " . "<a href='users.php'>View Users</a>";
    }

    /* Below does not need anymore because of password_hash() function */

    // $row = mysqli_fetch_array($select_randsalt_query);
    // $salt = $row['randSalt'];
    // $hashed_password = crypt($user_password, $salt); //actual "salting" to encrypt password during update

  }
} else {
  header("Location: index.php");
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
    <label for="user_role">User role</label><br>
    <select name="user_role" id="">
      <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>

        <?php
        
          if($user_role == 'admin') {
            echo "<option value='subscriber'>subscriber</option>";
          } else {
            echo "<option value='admin'>admin</option>";
          }
        
        ?>
    </select>
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
     
    <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
     
  </div>
</form>