<?php 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';
require_once './classes/config.php';
require_once "includes/db.php";
require_once "includes/header.php";
require_once "admin/functions.php";

// to avoid to reach forgot password page from outside, not trough index
  if(
    // !ifItIsMethod('get') || 
    !isset($_GET['forgot'])) {
    redirect('/menhely/index.php');
  }

  if(ifItIsMethod('post')) {
    if(isset($_POST['email'])) {
      $email = $_POST['email'];
      $length = 50;
      $token = bin2hex(openssl_random_pseudo_bytes($length));

      if(email_exists($email)) {
        if($stmt = mysqli_prepare($connection, "UPDATE users SET token='{$token}' WHERE user_email=? ")) {
          mysqli_stmt_bind_param($stmt, "s", $email);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_close($stmt);

          //Server settings
          $mail = new PHPMailer(true);

          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = Config::SMTP_HOST;                     //Set the SMTP server to send through
          $mail->Username   = Config::SMTP_USER;                     //SMTP username
          $mail->Password   = Config::SMTP_PASSWORD;                 //SMTP password
          $mail->Port       = Config::SMTP_PORT;                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->isHTML(true);
          $mail->CharSet = 'UTF-8';

          $mail->setFrom('ranga.viki@gmail.com', 'Ranga Viki');
          $mail->addAddress($email);

          $mail->Subject = 'Test email with mailtrap';
          $mail->Body = '<p>Please click to reset your password
          
          <a href="http://localhost/menhely/reset.php?email='.$email.'&token='.$token.' ">http://localhost/menhely/reset.php?email='.$email.'$token='.$token.'</a>
          
          </p>';

          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          if($mail->send()) {
            $emailSent = true;
          } else {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
        } else {
          echo mysqli_error($connection);
        }
      }
    }
  }

?>



<!-- Page Content -->
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                          <?php if(!isset($emailSent)) : ?>

                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                              <h2 class="text-center">Forgot Password?</h2>
                              <p>You can reset your password here.</p>
                              <div class="panel-body">
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      <input id="email" name="email" placeholder="email address" class="form-control"  type="email" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                  </div>
                                  <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>
                              </div><!-- Body-->

                        <?php else: ?>

                          <h3 class="bg-success">Please check your email</h3>

                        <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <?php require_once "includes/footer.php";?>

</div> <!-- /.container -->
 