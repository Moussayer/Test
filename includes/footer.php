<?php

$footer_sql = "where `content_type` != 'youtube' ORDER BY `recipe_id` DESC limit 0,2";
$footer_recipes = get_table_data('tbl_recipes', $col = '*', $footer_sql);
//var_dump($footer_recipes);die();

?>
  <!-- Footer Start -->
  <footer class="metro_footer metro_footer-dark">

    <span class="metro_footer-watermark" style="color:#d32e2e21 !important;">aklsari3</span>


    <!-- Middle Footer -->
    <div class="metro_footer-middle" style="text-align:right">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12 col-sm-12 footer-widget" >
            <h5 class="widget-title">من نحن</h5>
            <p>أكل سريع تحضير</p>
            <ul class="social-media">
              <!--li> <a href="#" class="facebook"> <i class="fab fa-facebook-f"></i> </a> </li-->
              <li> <a href="https://www.facebook.com/aklsari3/" class="facebook"> <i class="fab fa-facebook-f"></i> </a> </li>
              <!--li> <a href="#" class="google"> <i class="fab fa-google"></i> </a> </li-->
              <li> <a href="https://www.instagram.com/aklsari3/" class="instagram"> <i class="fab fa-instagram"></i> </a> </li>
            </ul>
          </div>
          <div class="offset-lg-2 col-lg-3 col-md-12 col-sm-12 footer-widget">
            <h5 class="widget-title">روابط سريعة</h5>
            <ul>
          <!--<li> <a href="blog-grid.html">Latest New</a> </li> -->    
              <li> <a href="index.php">الرئيسية</a> </li>
              <li> <a href="recipe-categories.php">الوصفات</a> </li>
              <li> <a href="recipe-all.php">اخر الوصفات</a> </li>
              <li> <a href="contact-us.php">تواصل معنا</a> </li>
            </ul>
          </div>
          <div class="offset-lg-1 col-lg-3 col-md-12 col-sm-12 footer-widget widget-recent-posts">
            <h5 class="widget-title">اخر الوصفات</h5>
            <?php
              foreach($footer_recipes as $footer_recipe){
                $footer_cid = $footer_recipe['cat_id'];
                $footer_cat = get_data_from_id('tbl_category', 'cid', $footer_cid, 'category_name');
            ?>
              <a href="recipe.php?id=<?=$footer_recipe['recipe_id']?>"><img src="recipes/upload/<?=$footer_recipe['recipe_image']?>" alt="post" width="100px"></a>
              <div class="post-content">
                <a href="category.php?id=<?=$footer_cid?>"> <?=$footer_cat?> </a>
                <h6 style="color:#fff !important;"> <a href="recipe.php?id=<?=$footer_recipe['recipe_id']?>"><?=$footer_recipe['recipe_title']?></a> </h6>
              </div>
            </article>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="metro_footer-bottom">
      <div class="container">
        <div class="metro_footer-copyright">
          <p> Copyright © 2021 <a href="#">aklsari3.com</a> All Rights Reserved. </p>
        </div>
      </div>
    </div>

  </footer>
  <!-- Footer End -->
  <!-- Vendor Scripts -->
  <script src="assets/js/plugins/jquery-3.4.1.min.js"></script>
  <script src="assets/js/plugins/popper.min.js"></script>
  <script src="assets/js/plugins/waypoint.js"></script>
  <script src="assets/js/plugins/bootstrap.min.js"></script>
  <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/plugins/jquery.slimScroll.min.js"></script>
  <script src="assets/js/plugins/imagesloaded.min.js"></script>
  <script src="assets/js/plugins/jquery.steps.min.js"></script>
  <script src="assets/js/plugins/jquery.countdown.min.js"></script>
  <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
  <script src="assets/js/plugins/slick.min.js"></script>
  <script src="assets/js/plugins/ion.rangeSlider.min.js"></script>
  <script src="assets/js/plugins/jquery.zoom.min.js"></script>


  <!-- Organista Scripts -->
  <script src="assets/js/main.js"></script>