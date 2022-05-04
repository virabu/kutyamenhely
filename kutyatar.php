<?php require_once "includes/db.php"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "admin/functions.php"; ?>

    <!-- Navigation -->
    
    <?php  require_once "includes/navigation.php"; ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="col-md-8 ">
            <div class="dogdbMainCont">
                <h4>Keress az állatok.info adatbázisában:</h4>
                <p>1) Keresd ki a hozzád illő fajtát!</p>
                <i class="fas fa-paw fa-rotate-180"></i>
                <p>2) Szuka vagy hím?</p>
                <i class="fas fa-paw fa-rotate-180"></i>
                <p>3) Méret? Életkor? Gyerekbarát?</p>
                <i class="fas fa-paw fa-rotate-180"></i>
                <p>4) Indítsd a keresést & találd meg kedvencedet!</p>
                <a href="http://allatok.info/search.php?species=kutya&shelter_id=27996" class="btn btn-primary" target=”_blank”><i class="glyphicon glyphicon-search"></i>
                    Keresés
                </a>
            </div>
        </div>
        <?php require_once 'includes/sidebar.php'?>

        </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
