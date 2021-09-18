<!-- php-->
<?php

require_once 'scripts/init.php';

$categories = get_table_data('tbl_category');

$f_sql = "where `featured` != 0 ORDER BY `recipe_id` DESC";
$f_recipes = get_table_data('tbl_recipes', $col = '*', $f_sql);

$m_sql = "where `content_type` != 'youtube' ORDER BY `total_views` DESC limit 0,10";
$m_recipes = get_table_data('tbl_recipes', $col = '*', $m_sql);

$r_sql = "where `content_type` != 'youtube' ORDER BY RAND() limit 0,10";
$r_recipes = get_table_data('tbl_recipes', $col = '*', $r_sql);
//var_dump($r_recipes);die();

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trickly - Food & Recipe HTML Template</title>

  <!-- Vendor Stylesheets -->
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
  <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/plugins/slick.css">
  <link rel="stylesheet" href="assets/css/plugins/slick-theme.css">
  <link rel="stylesheet" href="assets/css/plugins/ion.rangeSlider.min.css">

  <!-- Icon Fonts -->
  <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">

  <!-- Organista Style sheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
  <style type="text/css">

    #slider {
      overflow: hidden;
    }
    #slider figure {
      position: relative;
      width: 500%;
      margin: 0;
      left: 0;
      animation: 20s slider infinite;
      height: 10%;
    }
    #slider figure img {
      width: 20%;
      float: left;
    }
    
    @keyframes slider {
      0% {
        left: 0;
      }
      20% {
        left: 0;
      }
      25% {
        left: -100%;
      }
      45% {
        left: -100%;
      }
      50% {
        left: -200%;
      }
      70% {
        left: -200%;
      }
      75% {
        left: -300%;
      }
      95% {
        left: -300%;
      }
      100% {
        left: -400%;
      }
    }
    
    </style>

</head>


<body style="background-color:  #E6E8E9;">
 
  <!-- Aside (Right Panel) -->
  <aside class="metro_aside metro_aside-right">
    <div class="sidebar">
     
      <!-- Sidebar CTA Start -->
      <div class="sidebar-widget sidebar-cta">
        <img src="assets/images/ko.jpeg" alt="Call To Action">
        <div class="sidebar-cta-content">
          <span>طعام جيد</span>
          <h6>افضل نوعيةالطعام</h6>
          <a href="shop.html" class="metro_btn-custom">تسوق الان</a>
        </div>
      </div>
      <!-- Sidebar CTA End -->

      <!-- Recent Recipes Start -->
      <div class="sidebar-widget widget-recent-posts" >
        <h5 class="widget-title" style="text-align: right;"> الوصفات الحديثة</h5>
        <article class="post" style="text-align: right;">
          <a href="blog-details.html"><img src="https://via.placeholder.com/100" alt="post"></a>
          <div class="post-content">
            <a href="#">&nbsp; برغر </a>
            <h6> <a href="blog-details.html">&nbsp; حشوة طماطم بالكامون و  &nbsp;الفجل</a> </h6>
          </div>
        </article>
        <article class="post" style="text-align: right;">
          <a href="blog-details.html"><img src="https://via.placeholder.com/100" alt="post"></a>
          <div class="post-content">
            <a href="#">&nbsp;&nbsp; بيتزا </a>
            <h6> <a href="blog-details.html"> &nbsp;&nbsp;البيتزا مخبوزة بالفرن مع &nbsp; اربعةانواع من الجبن</a> </h6>
          </div>
        </article>
        <article class="post" style="text-align: right;">
          <a href="blog-details.html"><img src="https://via.placeholder.com/100" alt="post"></a>
          <div class="post-content">
            <a href="#"> &nbsp; وجبات سريعة </a>
            <h6> <a href="blog-details.html">&nbsp;&nbsp;البرغر المشوي مع &nbsp;كعجون الطماطم</a> </h6>
          </div>
        </article>
        <article class="post" style="text-align: right;">
          <a href="blog-details.html"><img src="https://via.placeholder.com/100" alt="post"></a>
          <div class="post-content">
            <a href="#">&nbsp; &nbsp;وجبات سريعة  </a>
            <h6> <a href="blog-details.html">&nbsp;&nbsp;مقلاةهوائية  بطاطس مقلية  &nbsp;على الطريقة الامريكية</a> </h6>
          </div>
        </article>
      </div>
      <!-- Recent Recipes End -->

    </div>
  </aside>
  <div class="metro_aside-overlay aside-trigger-right" ></div>

  <!-- Aside (Mobile Navigation) -->
  <aside class="metro_aside metro_aside-left">
  <!--
    <a class="navbar-brand" href="index.html"> <img src="https://via.placeholder.com/200x50" alt="logo"> </a>

  -->  
    <ul style="direction: rtl;">
      <li class="menu-item menu-item-has-children">
        <a href="index.html" class="active">الرئيسية</a>
        
      </li>
      <li class="menu-item menu-item-has-children">
        <a href="#">قائمة الوصفات</a>

      </li>
      <li class="menu-item menu-item-has-children">
      </li>  
      <li class="menu-item menu-item-has-children">
        <a href="recipe-grid.html">الوصفات</a>
      </li>
      <li class="menu-item menu-item-has-children">
        <a href="contact-us.html">تواصل معنا</a>
        
      </li>
      &nbsp;&nbsp;
      <form class="search-from"  >
        <div class="metro_search-adv-input" >
          <button type="submit" name="button" ><i class="fa fa-search" ></i></button>
          <input type="text" class="form-control" placeholder="بحث  , " name="search" value="">
          
        </div>
      </form>
    </ul>

  </aside>
  <div class="metro_aside-overlay aside-trigger-left"></div>

  <!-- Header Start -->
  <header class="metro_header header-1 can-sticky">

    <!-- Middle Header Start -->
     
     <div class="metro_header-middle">
      <div class="container">
  
           <ul class="navbar-nav">
             <!--logo-->
            <a class="navbar-brand" href="index.html"> <img src="https://1.bp.blogspot.com/-7Iast5i-lMY/YQlkQ3paoqI/AAAAAAAAI2E/DEf4QJQwIsYyeWp5U9CY9hQX90cjH1lAgCLcBGAsYHQ/s320/logo.png" alt="logo"> </a>

     </div>

    </div>
    <!-- Middle Header End -->

    <!-- Bottom Header Start -->
    <div class="metro_header-bottom">
      <div class="container">

        <div class="metro_header-bottom-inner">

          <!-- Side navigation toggle -->
          <div class="aside-toggler aside-trigger-right desktop-toggler">
            <span></span>
            <span></span>
            <span></span>
          </div>

          <!-- Menu -->
          <ul class="navbar-nav" style="direction: rtl;">
            <li class="menu-item menu-item-has-children">
              <a href="index.html" class="active" > الرئيسية</a>
            </li>
            <li class="menu-item menu-item-has-children">
              <a href="recipe-categories.html">قائمة الوصفات</a>
            </li>      
            <li class="menu-item menu-item-has-children mega-menu-wrapper">
              <a href="recipe-grid.html">الوصفات</a>
             
            </li>
            <li class="menu-item menu-item-has-children">
              <a href="contact-us.html">تواصل معنا</a>
            </li>
            
            &nbsp;&nbsp;
   
            <form class="search-from"  >
              <div class="metro_search-adv-input" >
             <button type="submit" name="button"  ><i class="fa fa-search" ></i></button>

                <input type="text" class="form-control" placeholder="بحث" name="search" value="">

              </div>
            </form>
          </ul>
          <ul class="metro_header-bottom-sm metro_sm" style="direction: ltr;">
            <li> <a href="https://www.facebook.com/apparabic" target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
            <li> <a href="https://twitter.com/devtechniman"  target="_blank"> <i class="fab fa-twitter"></i> </a> </li>
            <li> <a href="https://www.Instagram.com/devtechniman"  target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
            <li> <a href="https://youtube.com/channel/UC7Ygc2UuevPSnww6R35N8Pw"  target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
          </ul>

        </div>

      </div>
    </div>
    <!-- Bottom Header End -->

  </header>
  <!-- Header End -->

  <body>

<?php
include_once 'includes/header.php';
?>
  <!-- Banner Start -->

  <div class="metro_banner banner-2 dark-overlay dark-overlay-2" style="background-image: url(assets/images/PT1.jpg)">

<div class="metro_banner-slider" dir="ltr" >

  
  <?php
  foreach ($f_recipes as $f_recipe) {
    //var_dump($recipes);die();
    ?>
    <!-- Banner Item Start -->
    <div class="metro_banner-item">
    <div class="container">
      <div class="metro_banner-text">
      <a href="recipe.php?id=<?=$f_recipe['recipe_id']?>">
        <img src="recipes/upload/<?=$f_recipe['recipe_image']?>">
      </a>
      </div>
    </div>

  </div>
    <?php } ?>


</div>
</div>

  </div>
  <!-- Banner End -->

  <!-- Categories Start -->
  <div class="section section-padding" >
    <div class="container">
      <div class="row" >
       <!--php2-->
        <?php 
        foreach($categories as $cat){
      ?>
        <div class="col-lg-6">
          <a href="category.php?id=<?=$cat['cid']?>" class="metro_recipe-category style-2">
            <img style="height:300px" src="recipes/upload/category/<?=$cat['category_image']?>" alt="category">
            <h4><?=$cat['category_name']?></h4>
          </a>
        </div>
      <?php } ?>  

      </div>
    </div>
  </div>
  <!-- Categories End -->
  <div class="section pt-0">
    <div class="container">
      <div class="row">

        <div class="col-lg-8" dir="ltr">

          <!-- Popular Recipes Start -->
          <div class="section p-0 metro_home-slider-wrapper" >
            <div class="section-title flex-title" style=" direction: rtl;">
              <h4 class="title" >الوصفات الشعبية</h4>
              <div class="metro_arrows">
                <!--update  -->
                                <i class="fa fa-arrow-right slick-arrow slider-next"></i>

                <i class="fa fa-arrow-left slick-arrow slider-prev"></i>

              </div>
            </div>

            <div class="metro_home-slider" >
              <!--php3--> 
              <?php 
              foreach($m_recipes as $m_recipe){
            ?>
            <!-- Recipe Start -->
            <article class="metro_post metro_recipe metro_recipe-2">
              <div class="metro_post-thumb">
                <a href="recipe.php?id= <?=$m_recipe['recipe_id']?>">
                  <img src="recipes/upload/<?=$m_recipe['recipe_image']?>" alt="recipe">
                </a>
              </div>
              <div class="metro_post-body">
                <div class="metro_post-desc">
                  <span class="metro_post-meta"> <a href="#"> <i class="far fa-clock"></i> 45 دقائق </a> <a href="recipe.php?id= <?=$m_recipe['recipe_id']?>"> <i class="far fa-knife-kitchen"></i> Expert</a> </span>
                  <h5> <a href="recipe.php?id= <?=$m_recipe['recipe_id']?>"> <?=$m_recipe['recipe_title']?></a> </h5>
                </div>
              </div>
            </article>
            <!-- Recipe End -->

            <?php } ?>

            </div>

          </div>
          <!-- Popular Recipes End -->

          <!-- Recipes Start -->
          <div class="section metro_home-slider-wrapper-2">

            <div class="section-title flex-title"  style=" direction: rtl;">
              <h4 class="title"> وصفات مميزة </h4>
              <div class="metro_arrows">
                <!--update i-->
                                <i class="fa fa-arrow-right slick-arrow slider-next"></i>

                <i class="fa fa-arrow-left slick-arrow slider-prev"></i>

              </div>
            </div>

            <div class="metro_home-slider-2">

<!-- php5-->

<?php 
foreach($r_recipes as $r_recipe){
?>

<!-- Recipe Start -->
<article class="metro_post metro_recipe metro_recipe-2">
<div class="metro_post-thumb">
  <a href="recipe.php?id= <?=$r_recipe['recipe_id']?>">
    <img src="recipes/upload/<?=$r_recipe['recipe_image']?>" alt="recipe">
  </a>
</div>
<div class="metro_post-body">
  <div class="metro_post-desc">
    <h5> <a href="recipe.php?id= <?=$r_recipe['recipe_id']?>"> <?=$m_recipe['recipe_title']?></a> </h5>
  </div>
</div>
</article>
<!-- Recipe End -->
<?php } ?>


</div>

</div>


            <!-- Newsletter Start -->
            <div class="sidebar-widget" style="text-align: right; background-color: white;" >
              <div class="metro_newsletter-form" >
                <h5>النشرة الاخبارية</h5>
                <p>احصل على وصفات اسبوعية  حصرية من خلال  اشتراكك في النشرة الاخبارية</p>
                <form method="post" class="metro_comments-form p-0 border-0">
                  <div class="form-group">
                    <input type="email" class="form-control" name="newsletter_email" placeholder="البريد الالكتروني" value="">
                    <i class="far fa-envelope"></i>
                  </div>
                  <button type="submit" class="metro_btn-custom" name="button"> اشترك الان</button>
                </form>
              </div>
            </div>
            <!-- Newsletter End -->

            <!-- Social Links Start -->
            <div class="sidebar-widget" style="background-color: white;">
              <h5 class="widget-title" style="text-align: right;"> روابط اجتماعية</h5>
              <ul class="metro_sm" style="direction: ltr;"> 
                <li> <a href="https://www.facebook.com/apparabic"  target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
                <li> <a href="https://twitter.com/devtechniman"  target="_blank"> <i class="fab fa-twitter"></i> </a> </li>
                <li> <a href="https://www.Instagram.com/devtechniman"  target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
                <li> <a href="https://youtube.com/channel/UC7Ygc2UuevPSnww6R35N8Pw"  target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
              </ul>
            </div>
            <!-- Social Links End -->

          </div>
        </div>
        <!-- Sidebar End -->

      </div>
    </div>
  </div>

  <!-- Instagram Start -->
  <div class="row no-gutters">
    <div class="col-lg-2 col-md-4 col-sm-4 col-6 p-0">
      <a href="https://via.placeholder.com/320x350" class="gallery-thumb metro_ig-item">
        <img src="https://via.placeholder.com/320x350" alt="ig">
      </a>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4 col-6 p-0">
      <a href="https://via.placeholder.com/320x350" class="gallery-thumb metro_ig-item">
        <img src="https://via.placeholder.com/320x350" alt="ig">
      </a>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4 col-6 p-0">
      <a href="https://via.placeholder.com/320x350" class="gallery-thumb metro_ig-item">
        <img src="https://via.placeholder.com/320x350" alt="ig">
      </a>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4 col-6 p-0">
      <a href="https://via.placeholder.com/320x350" class="gallery-thumb metro_ig-item">
        <img src="https://via.placeholder.com/320x350" alt="ig">
      </a>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4 col-6 p-0">
      <a href="https://via.placeholder.com/320x350" class="gallery-thumb metro_ig-item">
        <img src="https://via.placeholder.com/320x350" alt="ig">
      </a>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4 col-6 p-0">
      <a href="https://via.placeholder.com/320x350" class="gallery-thumb metro_ig-item">
        <img src="https://via.placeholder.com/320x350" alt="ig">
      </a>
    </div>
  </div>

       
      </div>
    </div>

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
  <!-- php-->
  <?php
  include_once 'includes/footer.php';
  ?>
</body>

</html>
