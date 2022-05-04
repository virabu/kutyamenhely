<?php session_start(); ?>
<?php require_once "admin/functions.php" ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container navContainer">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    
                <!-- <a class="navbar-brand" href="/menhely">Home</a> -->
                <a class="navbar-brand" href="/menhely/index_eng.php">
                    <li class="logo_title_container">
                        <img src="/menhely/images/logo_title3.jpg" alt="logo_title" id="logo_title">
                    </li>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php
                    $aboutus_class = '';
                    $registration_class = '';
                    $contact_class = '';

                    $pageName = basename($_SERVER['PHP_SELF']);
                    $aboutus = 'aboutus.php';
                    $kiemelt = 'kiemelt.php';
                    $kutyatar = 'kutyatar.php';
                    $registration = 'registration.php';
                    $contact = 'contact.php';

                  if($pageName == $registration) {
                      $registration_class = 'active';
                  } else if($pageName == $contact) {
                    $contact_class = 'active';
                  } else if($pageName == $aboutus) {
                    $aboutus_class = 'active';
                  } else if($pageName == $kiemelt) {
                    $kiemelt_class = 'active';
                  } else if($pageName == $kutyatar) {
                    $kutyatar_class = 'active';
                  }
                ?>
                    <li class='<?php echo $kiemelt_class; ?>'>
                        <a href="/menhely/kiemelt_eng.php">Highlighted dogs</a>
                    </li>
                    <li class='<?php echo $kutyatar_class; ?>'>
                        <a href="/menhely/kutyatar_eng.php">Database</a>
                    </li>
                    <li class='<?php echo $aboutus_class; ?>'>
                        <a href="/menhely/aboutus_eng.php">About us</a>
                    </li>

                    <li class='<?php echo $contact_class; ?>'>
                        <a href="/menhely/contact_eng.php">Message</a>
                    </li>
                    <li class="lang">
                        <a href="/menhely/index.php">HUN</a>
                    </li>
                    <!-- Blog Search Well -->
                    <li id="search">
                        <form action="search.php" method="post">
                            <div class="input-group">
                                <input name="search" type="text" class="form-control" placeholder="Keresés">
                                <span class="input-group-btn">
                                    <button name="submit" class="btn btn-default" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>