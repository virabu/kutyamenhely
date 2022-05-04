<?php  require_once "includes/db.php"; ?>
<?php  require_once "includes/header.php"; ?>

<?php
    if(isset($_POST['submit'])) {
        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        $to = "ranga.viki@gmail.com";
        $subject = wordwrap($_POST['subject'], 70);
        $body = $_POST['body'];
        $header = "From: " . $_POST['email'];

        // send email
        mail($to, $subject, $body, $header);

        echo "<h4 style='text-align: center' class='bg-success'>Message has been sent</h4>";
    }
?>

<!-- Navigation -->
<?php  require_once "includes/navigation_eng.php"; ?>
    
    <!-- Page Content -->
    <div class="container">
    
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3 contact">
                <!-- <div class="col-xs-8 col-xs-offset-2"> -->
                    <div class="form-wrap">
                    <h2>Send us a message</h2>
                        <form role="form" action="" method="post" id="login-form" autocomplete="off">

                            <h4 class="text-center"><?php echo $message; ?></h4>

                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Your email address" required>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea name="body" id="body" class="form-control" rows="6" required placeholder="Your message"></textarea>
                            </div>
                    
                            <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Send">
                        </form>
                    
                    </div>
                </div> <!-- /.col-xs-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <hr>

<?php require_once "includes/footer.php";?>
