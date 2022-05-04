<?php require_once "includes/db.php"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "admin/functions.php"; ?>

 <?php
 
 if($_SERVER['REQUEST_METHOD'] == "POST") {
    $registration_username = trim($_POST['username']);
    $registration_email = trim($_POST['email']);
    $registration_password = trim($_POST['password']);

    $error = [
        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if(strlen($registration_username) < 3) {
        $error['username'] = 'Username needs to be longer than 2 characters';
    }
    if($registration_username == '') {
        $error['username'] = 'Username cannot be empty';
    }
    if(username_exists($registration_username)) {
        $error['username'] = 'Username already exists, pick another';
    }

    if($registration_email == '') {
        $error['email'] = 'Email cannot be empty';
    }
    if(email_exists($registration_email)) {
        $error['email'] = 'Email already exists, <a href="index.php">Please login</a>';
    }

    if($registration_password == '') {
        $error['password'] = "Password cannot be empty";
    }

    foreach($error as $key => $value) {
        if(empty($value)) {
            unset($error[$key]);
        }
    }
    if (empty($error)) {
        register_user($registration_username, $registration_email, $registration_password);
        login_user($registration_username, $registration_password);

    }
 }
    
 
 ?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    <!-- Page Content -->
    <div class="container">
    
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                    <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($registration_username) ? $registration_username : '' ?>" required>

                                <h4 class='text-center bg-danger'><?php echo isset($error['username']) ? $error['username'] : '' ?></h4>

                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" autocomplete="on" value="<?php echo isset($registration_email) ? $registration_email : '' ?>" required>

                                <h4 class='text-center bg-danger'><?php echo isset($error['email']) ? $error['email'] : '' ?></h4>

                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                            </div>
                    
                            <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>
                    
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <hr>

<?php include "includes/footer.php";?>
