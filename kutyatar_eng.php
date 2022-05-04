<?php require_once "includes/db.php"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "admin/functions.php"; ?>

    <!-- Navigation -->
    
    <?php  require_once "includes/navigation_eng.php"; ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-8 ">
            <div class="dogdbMainCont">
                <h4>Search in the database of állatok.info:</h4>
                <p>1) Find the right breed for you!</p>
                <i class="fas fa-paw fa-rotate-180"></i>
                <p>2) Bitch or male?</p>
                <i class="fas fa-paw fa-rotate-180"></i>
                <p>3) Size? Age? Child friendly?</p>
                <i class="fas fa-paw fa-rotate-180"></i>
                <p>4) Start your search & find your favorite!</p>
                <a href="http://allatok.info/search.php?species=kutya&shelter_id=27996" class="btn btn-primary" target=”_blank”><i class="glyphicon glyphicon-search"></i>
                    Search
                </a>
            </div>
        </div>
        <?php require_once 'includes/sidebar_eng.php'?>

        </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
