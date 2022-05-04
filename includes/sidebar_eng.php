<?php

    if(ifItIsMethod('post')){
        if(isset($_POST['login'])) {
            if(isset($_POST['username']) && isset($_POST['password'])){
                login_user($_POST['username'], $_POST['password']);
            } else {
                redirect('/menhely/index');
            }
        }
    }
?>


<!-- Blog Sidebar Widget Column -->
<div class="col-md-4">
    <?php if(isLoggedIn()) : ?>
        <div class="well loggedin">
            <a href="/menhely/admin" class="btn btn-warning">Admin</a>
            <a href="/menhely/includes/logout.php" class="btn btn-danger">Logout</a>
            <?php
            if(isset($_SESSION['user_role'])) {
                if(isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                    echo "<a href='/menhely/admin/posts.php?source=edit_post&p_id={$the_post_id}' class='btn btn-warning'>Edit Post</a>";
                }
            }
            ?>
        </div>
        <?php else: ?>
        <?php endif; ?>

<!-- Menhely Info Data -->
<div class="well" id="elerhetoseg">
    <table>
        <tr>
            <th class="icons"><h4 class="fas fa-phone-alt"></h4></th>
            <td><h4>+3620/981-05-58</h4></td>
        </tr>
        <tr>
            <th class="icons"><h4 class="fas fa-envelope"></h4></th>
            <td><h4> tmallatvedo@gmail.com</h4></td>
        </tr>
        <tr>
            <th class="icons"><h4 class="fas fa-map-marker-alt"></h4></th>
            <td>
                <h4>
                    <a href="https://www.google.com/maps/place/Szeksz%C3%A1rdi+Kutyamenhely/@46.3536669,18.7245972,17z/data=!3m1!4b1!4m5!3m4!1s0x4742ee169bdb3ae9:0xfc39fc043134fb3!8m2!3d46.3536632!4d18.7267859" target=”_blank”> 7100 Szekszárd, Bogyiszlói út 8.
                    </a>
                </h4>
            </td>
        </tr>

        <tr>
            <th><p>Visiting hours:</p></th>
            <td><p>Saturday 10:00 - 15:30</p></td>
        </tr>
        <tr>
            <th><p>Tax number:</p></th>
            <td><p>18857632-1-17</p></td>
        </tr>
        <tr>
            <th><p>Account number:</p></th>
            <td><p>11746005-20009812</p></td>
        </tr>
        <tr>
            <th><p>Iban:</p></th>
            <td><p>HU3711746005-20009812-00000000</p></td>
        </tr>
        <tr>
            <th><p>SWIFT code:</p></th>
            <td><p>OTPV-HU-HB</p></td>
        </tr>
        <tr>
            <th><p>PayPal:</p></th>
            <td><p>tmallatvedo@gmail.com</p></td>
        </tr>
        <tr class="social">
            <th></th>
            <td>
                <a href="https://www.instagram.com/szekszardikutyamenhely/">
                    <i class="fab fa-instagram"></i>
                </a>
            </td>
            <td>
                <a href="https://www.facebook.com/Szeksz%C3%A1rdi-Kutyamenhely-893196334046025/?ref=page_internal">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </td>
            <td>
                <a href="https://www.tiktok.com/@szekszardikutyamenhely?">
                    <i class="fab fa-tiktok"></i>
                </a>
            </td>
        </tr>
    </table>
</div>


<!-- Blog Categories Well -->

<div class="well">

<?php

$query = "SELECT * FROM categories ";
$select_categories_sidebar = mysqli_query($connection, $query);

?>

    <h4>Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php
              
              while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
              
                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
              }
            
            ?>
                
            </ul>
        </div>

    </div>
    <!-- /.row -->
</div>
<img src="/menhely/images/logo_full.jpg" alt="logo_title" id="logo_full">


<!-- Side Widget Well -->
<!-- <?php include "widget.php"; ?> -->

</div>