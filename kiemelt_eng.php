<?php require_once "includes/db.php"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "admin/functions.php"; ?>

    <!-- Navigation -->
    
    <?php  require_once "includes/navigation_eng.php"; ?>
    
    <!-- Page Content -->
    <div class="container kiemeltContainer">
        <div class="col-md-9">

            <!-- Full-width images with number text -->
            <div class="mySlidesGallery">
                <div class="numbertext">1 / 12</div>
                <img src="images/kiemelt2/087.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">2 / 12</div>
                <img src="images/kiemelt2/097.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">3 / 12</div>
                <img src="images/kiemelt2/091.png" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">4 / 12</div>
                <img src="images/kiemelt2/090.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">5 / 12</div>
                <img src="images/kiemelt2/053.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">6 / 12</div>
                <img src="images/kiemelt2/090_1.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">7 / 12</div>
                <img src="images/kiemelt2/100.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">8 / 12</div>
                <img src="images/kiemelt2/101.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">9 / 12</div>
                <img src="images/kiemelt2/032-1.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">10 / 12</div>
                <img src="images/kiemelt2/102.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">11 / 12</div>
                <img src="images/kiemelt2/027.jpg" style="width:100%">
            </div>

            <div class="mySlidesGallery">
                <div class="numbertext">12 / 12</div>
                <img src="images/kiemelt2/089.jpg" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- Image text -->
            <div class="caption-container">
                <p id="caption"></p>
            </div>
        </div>

            <!-- Thumbnail images -->
        <div class="col-md-3">
            <div class="row thumbnails">
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/087.jpg" style="width:100%" onclick="currentSlide(1)" alt="- Hetti -<br> puszioszt??, j??t??kos, fiatal l??ny kutya">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/097.jpg" style="width:100%" onclick="currentSlide(2)" alt="- Samu -<br> ??benfekete, 2 ??ves, gy??ny??r?? fi??">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/091.png" style="width:100%" onclick="currentSlide(3)" alt="- Liza -<br> t??nd??ri, csal??dbar??t Golden Retriever">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/090.jpg" style="width:100%" onclick="currentSlide(4)" alt="- Kesu -<br> k??l??nleges sz??n??, bar??ts??gos, fiatal fi??">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/053.jpg" style="width:100%" onclick="currentSlide(5)" alt="- Csoki & Di?? -<br> szeretetre ??hes, kedves kis energiabomb??k, ide??lis j??tsz??t??rsak">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/090_1.jpg" style="width:100%" onclick="currentSlide(6)" alt="- Zs??mi -<br> lehengerl??, vid??m tacsk?? & labrador? mix, im??dja a fot??z??st ??s a figyelmet">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/100.jpg" style="width:100%" onclick="currentSlide(7)" alt="- Zokni -<br> aranybarna szem??, k??zepes/nagytest??, bar??ts??gos ??r">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/101.jpg" style="width:100%" onclick="currentSlide(8)" alt="- Berci -<br> nagytest??, f??l ??ves, b??k??s fi??, nagyon v??rja gondoskod?? gazd??j??t">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/032-1.jpg" style="width:100%" onclick="currentSlide(9)" alt="- Marcip??n - <br> akt??v, okos fi??, sportos & fiatalos ??r??kbefogad??t szeretne">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/102.jpg" style="width:100%" onclick="currentSlide(10)" alt="- Br??n?? - <br> lelkes, vid??m, 2 ??v k??r??li kan, mindenkit felvid??t">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/027.jpg" style="width:100%" onclick="currentSlide(11)" alt="- Indi??n - <br>nyugodt, ??rtelmes szuka, v??rja gondoskod?? gazd??j??t">
                </div>
                <div class="column">
                    <img class="demo cursor" src="images/kiemelt2/089.jpg" style="width:100%" onclick="currentSlide(12)" alt="- Fec?? -<br> b??j??s csal??dbar??t kis barika, 2 ??ves">
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    var slideIndexGallery = 0;
    showSlidesGallery(slideIndexGallery);

    // Next/previous controls
    function plusSlides(n) {
        showSlidesGallery(slideIndexGallery += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlidesGallery(slideIndexGallery = n);
    }

    function showSlidesGallery(n) {
        var j;
        var slidesGallery = document.getElementsByClassName("mySlidesGallery");
        var dotsGallery = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");

        if (n > slidesGallery.length) {slideIndexGallery = 1}
        if (n < 1) {slideIndexGallery = slidesGallery.length}
        for (j = 0; j < slidesGallery.length; j++) {
        slidesGallery[j].style.display = "none";
        }
        for (j = 0; j < dotsGallery.length; j++) {
        dotsGallery[j].className = dotsGallery[j].className.replace(" active", "");
        }
        slidesGallery[slideIndexGallery-1].style.display = "block";
        dotsGallery[slideIndexGallery-1].className += " active";
        captionText.innerHTML = dotsGallery[slideIndexGallery-1].alt;
    }
    </script>

</body>

</html>
