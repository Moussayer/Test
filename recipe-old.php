<?php
include_once 'scripts/init.php';

if (isset($_GET['id'])) {
  $id = sanitize($_GET['id']);

  $q = "where `recipe_id` = $id";
  $recipe = get_table_data('tbl_recipes', $col = '*', $q);
  $recipe = $recipe[0];
  $type = $recipe['content_type'];
  $cat_id = $recipe['cat_id'];
  $category_title = get_data_from_id('tbl_category', 'cid', $cat_id, 'category_name');
  //var_dump($recipe);die();
    
    if (!fetch_data_row('tbl_recipes', 'recipe_id', $id, '*')) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}



?>
<!DOCTYPE html>
<html  lang="ar" dir="rtl">

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
<!-- scripte-->
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


</div>
 
</head>

<body>


  <!-- Header Start -->
  <?php
  include_once 'includes/header.php';
  ?>
  <!-- Header End -->

  <!-- Subheader Start -->
  <div class="metro_subheader dark-overlay dark-overlay-2" style="background-image: url(https://via.placeholder.com/1920x550)">
    <div class="container">
      <div class="metro_subheader-inner">
        <h1>Recipe Details</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recipe Details</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <!-- Post Content Start -->
  <div class="section metro_post-single" >
    <div class="container">

      <div class="row">
        <div class="col-lg-12" >

          <!-- Content  -->
          <div class="metro_post-single-wrapper metro_recipe-single-wrapper" >

            <h2 class="entry-title"><?=$recipe['recipe_title']?></h2>
            <!-- <div class="metro_rating-wrapper">
              <div class="metro_rating">
                <i class="fa fa-star active"></i>
                <i class="fa fa-star active"></i>
                <i class="fa fa-star active"></i>
                <i class="fa fa-star active"></i>
                <i class="fa fa-star"></i>
              </div>
              <span>4 Stars</span>
            </div> -->

            <div class="metro_post-single-thumb">
            <?php
                  if($type != 'youtube'){
                ?>
              <img src="dash/upload/<?=$recipe['recipe_image']?>" alt="post">
              <?php } ?>
              <div class="metro_post-date">
                <?php 
                  $time = $recipe['recipe_time'];
                  $month=date("M",$time);
                  $day=date("D",$time);
                ?>
                <span><?=$day?></span>
                <span><?=$month?></span>
                <!-- <span><?=$year?></span> -->
              </div>
            </div>

            <!-- Entry Content Start -->
            <div class="entry-content">
              <span class="metro_post-meta">
                <a href="category.php?id=<?=$cat_id?>"> <?=$category_title?> </a>
                <i class="far fa-clock"></i> <?=$recipe['recipe_time']?> minutes
              </span>

              <p> <?=$recipe['recipe_description']?>  </p>

              <div class="row">
              
                <!-- <div class="col-lg-6">
                  <div class="metro_ingredients">
                    <h4>Ingredients</h4>
                    <ul>
                      <li> Calories <span>329</span> </li>
                      <li> Sugar <span>10.5g</span> </li>
                      <li> Protein <span>22.5g</span> </li>
                      <li> Fat <span>3g</span> </li>
                      <li> Carbs <span>18g</span> </li>
                      <li> Food Far <span>0.1</span> </li>
                    </ul>
                  </div>
                </div> -->
              </div>

              <div class="row">
                <?php
                  if($type == 'youtube'){
                ?>
                  <div class="col-md-12">
                  <iframe src="https://www.youtube.com/embed/<?=$recipe['video_id']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                <?php } ?>
               <!--  <div class="col-sm-6">
                  <img class="w-100" src="https://via.placeholder.com/370x270" alt="Recipe">
                </div>
                <div class="col-sm-6">
                  <img class="w-100" src="https://via.placeholder.com/370x270" alt="Recipe">
                </div> -->
              </div>
 
            </div>
            <!-- Entry Content End -->

          </div>

          <!-- Related Posts -->
          <div class="metro_related-posts">

            <h4>Related Recipes</h4>

            <div class="metro_related-posts-slider">

              <!-- Recipe Start -->
              <article class="metro_post metro_recipe">
                <div class="metro_post-thumb">
                  <a href="recipe-details.html">
                    <img src="https://via.placeholder.com/370x270" alt="recipe">
                  </a>
                </div>
                <div class="metro_post-body">
                  <div class="metro_post-desc">
                    <span class="metro_post-meta"> <a href="#"> <i class="far fa-clock"></i> 45 Minutes </a> <a href="recipe-details.html"> <i class="far fa-knife-kitchen"></i> Expert</a> </span>
                    <h5> <a href="recipe-details.html">Cheese Burger With a Touch of Curry and Cumin</a> </h5>
                    <p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                  </div>
                  <a class="btn-link" href="recipe-details.html"> قراءة المزيد <i class="fas fa-arrow-right"></i> </a>
                </div>
              </article>
              <!-- Recipe End -->

              <!-- Recipe Start -->
              <article class="metro_post metro_recipe">
                <div class="metro_post-thumb">
                  <a href="recipe-details.html">
                    <img src="https://via.placeholder.com/370x270" alt="recipe">
                  </a>
                </div>
                <div class="metro_post-body">
                  <div class="metro_post-desc">
                    <span class="metro_post-meta"> <a href="#"> <i class="far fa-clock"></i> 45 Minutes </a> <a href="recipe-details.html"> <i class="far fa-knife-kitchen"></i> Expert</a> </span>
                    <h5> <a href="recipe-details.html">Cheese Burger With a Touch of Curry and Cumin</a> </h5>
                    <p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                  </div>
                  <a class="btn-link" href="recipe-details.html">قراءة المزيد<i class="fas fa-arrow-right"></i> </a>
                </div>
              </article>
              <!-- Recipe End -->

              <!-- Recipe Start -->
              <article class="metro_post metro_recipe">
                <div class="metro_post-thumb">
                  <a href="recipe-details.html">
                    <img src="https://via.placeholder.com/370x270" alt="recipe">
                  </a>
                </div>
                <div class="metro_post-body">
                  <div class="metro_post-desc">
                    <span class="metro_post-meta"> <a href="#"> <i class="far fa-clock"></i> 45 Minutes </a> <a href="recipe-details.html"> <i class="far fa-knife-kitchen"></i> Expert</a> </span>
                    <h5> <a href="recipe-details.html">Cheese Burger With a Touch of Curry and Cumin</a> </h5>
                    <p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                  </div>
                  <a class="btn-link" href="recipe-details.html"> قراءة المزيد<i class="fas fa-arrow-right"></i> </a>
                </div>
              </article>
              <!-- Recipe End -->

              <!-- Recipe Start -->
              <article class="metro_post metro_recipe">
                <div class="metro_post-thumb">
                  <a href="recipe-details.html">
                    <img src="https://via.placeholder.com/370x270" alt="recipe">
                  </a>
                </div>
                <div class="metro_post-body">
                  <div class="metro_post-desc">
                    <span class="metro_post-meta"> <a href="#"> <i class="far fa-clock"></i> 45 Minutes </a> <a href="recipe-details.html"> <i class="far fa-knife-kitchen"></i> Expert</a> </span>
                    <h5> <a href="recipe-details.html">Cheese Burger With a Touch of Curry and Cumin</a> </h5>
                    <p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                  </div>
                  <a class="btn-link" href="recipe-details.html"> قراءة المزيد <i class="fas fa-arrow-right"></i> </a>
                </div>
              </article>
              <!-- Recipe End -->

            </div>

          </div>
 

        </div>


      </div>

    </div>
  </div>
  <!-- Product Content End -->
 
  <?php
  include_once 'includes/footer.php';
  ?>

  <script>
    $(document).ready(function(){
		if($(window).width()<= 480){
       //$("iframe").height($(window).height());
       $("iframe").width($(window).width());
       
		}});
		
		$(document).ready(function(){
			if($(window).width()>= 1023){
		   $("iframe").height($(window).height()-($(window).height()*0.5));
		   $("iframe").width($(window).width()-($(window).height()*0.5));
       
		}});
  </script>
</body>

</html>
