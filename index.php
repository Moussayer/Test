<?php

require_once 'scripts/init.php';

$categories = get_table_data('tbl_category');

$f_sql = "where `featured` != 0 ORDER BY `recipe_id` DESC limit 0,5";
$f_recipes = get_table_data('tbl_recipes', $col = '*', $f_sql);

$l_sql = "ORDER BY `recipe_id` DESC limit 0,5";
$l_recipes = get_table_data('tbl_recipes', $col = '*', $l_sql);

$b_sql = "ORDER BY `recipe_id` DESC limit 5,4";
$b_recipes = get_table_data('tbl_recipes', $col = '*', $b_sql);

$m_sql = "where `content_type` != 'youtube' ORDER BY `total_views` DESC limit 0,10";
$m_recipes = get_table_data('tbl_recipes', $col = '*', $m_sql);

$y_sql = "where `content_type` = 'youtube' ORDER BY `total_views` DESC limit 0,4";
$y_recipes = get_table_data('tbl_recipes', $col = '*', $y_sql);

$r_sql = "where `content_type` != 'youtube' ORDER BY RAND() limit 0,10";
$r_recipes = get_table_data('tbl_recipes', $col = '*', $r_sql);
//var_dump($y_recipes);die();

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>أكل سريع تحضير</title>

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

<?php
	include_once 'includes/header.php';
?>

  <!-- Banner Start -->
  
  <div id="slider" dir="ltr">
		<figure>
			
		  <?php
			  foreach ($f_recipes as $f_recipe) {
				//var_dump($f_recipes);die();
			?>
			<a href="recipe.php?id=<?=$f_recipe['recipe_id']?>">
			 <img src="recipes/upload/<?=$f_recipe['recipe_image']?>"> 
			</a> 
		 <?php } ?>
			
		</figure>
    
	</div>
      <!-- Banner Item Start -->

    
<!-- 
    <div class="container">
      <div class="metro_banner-footer">
        <div class="metro_recipe-list-sm">
          <img src="https://via.placeholder.com/110" alt="Recipe">
          <div class="metro_recipe-list-sm-content">
            <a href="#"> Burgers </a>
            <h6> <a href="blog-details.html">Tomato Stuffing with Cumin and Radish</a> </h6>
          </div>
        </div>
        <div class="metro_recipe-list-sm">
          <div class="metro_recipe-list-sm-content">
            <a href="#"> Pizzas </a>
            <h6> <a href="blog-details.html">Tomato Stuffing with Cumin and Radish</a> </h6>
          </div>
          <img src="https://via.placeholder.com/110" alt="Recipe">
        </div>
      </div>
    </div>
-->
  </div>
  <!-- Banner End -->

  <!-- Categories Start -->
  <div class="section section-padding" >
    <div class="container">
      <div class="row" >
		  <?php 
			foreach($categories as $cat){
		  ?>
        <div class="col-lg-6">
          <a href="category.php?id=<?=$cat['cid']?>" class="metro_recipe-category style-2" style="border-radius: 20px;">
            <img style="height:300px" src="recipes/upload/category/<?=$cat['category_image']?>" alt="category" >
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
			
			<?php 
              foreach($m_recipes as $m_recipe){
            ?>
			
              <!-- Recipe Start -->
              <article class="metro_post metro_recipe metro_recipe-2" >
                <div class="metro_post-thumb">
                  <a href="recipe.php?id=<?=$m_recipe['recipe_id']?>">
                    <img src="recipes/upload/<?=$m_recipe['recipe_image']?>" alt="recipe">
                  </a>
                </div>
                <div class="metro_post-body">
                  <div class="metro_post-desc">
                    <span class="metro_post-meta" dir="rtl"> <a > <i class="far fa-clock"></i> &nbsp;<?=$m_recipe['recipe_time']?> دقائق </a> &nbsp;&nbsp;<a > <i class="fa fa-eye" aria-hidden="true"></i >&nbsp; <?=$m_recipe['total_views']?> </a> </span>
                      <h5> <a href="recipe.php?id=<?=$m_recipe['recipe_id']?>"> <?=$m_recipe['recipe_title']?></a> </h5>
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
			<?php 
				foreach($r_recipes as $r_recipe){
			?>


              <!-- Recipe Start -->
              <article class="metro_post metro_recipe metro_recipe-3">
                <div class="metro_post-thumb">
                 <a href="recipe.php?id=<?=$r_recipe['recipe_id']?>">
   <!--i  style="position:absolute ; margin-top: 60%; left: 0;"> وجبة الافطار &nbsp; </i--> 
   <img src="recipes/upload/<?=$r_recipe['recipe_image']?>" alt="recipe">				

                  </a>
                </div>
                <div class="metro_post-body"  style="text-align: right;">
                  <div class="metro_post-desc">
                  <!-- 
                    <div class="metro_rating" >
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  -->
                      <h5> <a href="recipe.php?id= <?=$r_recipe['recipe_id']?>"> <?=$m_recipe['recipe_title']?></a> </h5>
                  </div>
               <!--  <a class="btn-link" href="recipe-details.html"> قراءةالمزيد <i class="fas fa-arrow-left"></i>  &nbsp;</a> --> 
                </div>
              </article>
              <!-- Recipe End -->
			  
			  <?php } ?>

            </div>

          </div>
          <!-- Recipes End -->
		  
		  

          <!-- Video Start -->
          <div class="section section-padding pt-0">

            <div class="section-title flex-title" style=" direction: rtl;">
              <h4 class="title">وصفات بالفيديو </h4>
              <!--<a href="recipe-grid.html" class="btn-link" style=" direction: ltr;"> <i class="fas fa-arrow-left"></i> &nbsp عرض  كل الوصفات  </a> -->
            </div>

            <div class="row" >
			<?php foreach($y_recipes as $y_recipe){
			?>
              <!-- Recipe Start -->
              <div class="col-md-6">
                <article class="metro_post metro_recipe" style="box-shadow: 0px 0px 10px rgb(124, 122, 122);  ">
                  <div class="metro_post-thumb" >
                    <a href="recipe-details.html" >
	                  <iframe width="350" height="350" src="https://www.youtube.com/embed/<?=$y_recipe['video_id']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </a>
                  </div>
                  <div class="metro_post-body">
                    <div class="metro_post-desc">
                      <span class="metro_post-meta" dir="rtl"> <a > <i class="far fa-clock"></i> &nbsp;<?=$y_recipe['recipe_time']?> دقائق </a> &nbsp;&nbsp;<a > <i class="fa fa-eye" aria-hidden="true"></i >&nbsp; <?=$y_recipe['total_views']?> </a> </span>
                      <h5> <a href="recipe.php?id=<?=$y_recipe['recipe_id']?>"><?=$y_recipe['recipe_title']?></a> </h5>
              <!--       <p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>-->
                    </div>
                    <!-- 
                    <div class="metro_rating mb-0">
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  -->
                  </div>
                </article>
              </div>
              <!-- Recipe End -->
			  
			<?php } ?>

             
            </div>

          </div>
          <!-- Recipes End -->

          <!-- Video Recipes Start -->
         <!-- <div class="section section-padding pt-0">

            <div class="section-title flex-title" style=" direction: rtl;">
              <h4 class="title">مشاهدة  فيديوهات الوصفات</h4>
              <a href="recipe-grid.html" class="btn-link" style=" direction: rtl;">  عرض  كل الوصفات &nbsp<i class="fas fa-arrow-left"></i> </a>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="metro_recipe metro_recipe-video metro_recipe-video-main">
    <img src="assets/img/recipes/video/1.jpg" alt="Recipe"></a>  
              <a href="https://www.youtube.com/watch?v=TKnufs85hXk" class="popup-youtube"> <i class="far fa-play"></i>
               <div class="metro_recipe-video-content" style="text-align:right ;">
                    <span class="metro_post-meta" > <a href="#"> <i class="far fa-clock"></i> 45 دقائق </a> 
                      <a href="recipe-details.html" > <i class="far fa-knife-kitchen" style="text-align:right ;"></i> خبير</a> </span>
                    <h6 > طماطم محشوة بفوا و شانتيريل ميراج js</h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="metro_recipe metro_recipe-video">
                  <img src="assets/img/recipes/video/2.jpg" alt="Recipe">
                  <a href="https://www.youtube.com/watch?v=TKnufs85hXk" class="popup-youtube"> <i class="far fa-play"></i> </a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="metro_recipe metro_recipe-video">
                  <img src="assets/img/recipes/video/3.jpg" alt="Recipe">
                  <a href="https://www.youtube.com/watch?v=TKnufs85hXk" class="popup-youtube"> <i class="far fa-play"></i> </a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="metro_recipe metro_recipe-video">
                  <img src="assets/img/recipes/video/4.jpg" alt="Recipe">
                  <a href="https://www.youtube.com/watch?v=TKnufs85hXk" class="popup-youtube"> <i class="far fa-play"></i> </a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="metro_recipe metro_recipe-video">
                  <img src="assets/img/recipes/video/5.jpg" alt="Recipe">
                  <a href="https://www.youtube.com/watch?v=TKnufs85hXk" class="popup-youtube"> <i class="far fa-play"></i> </a>
                </div>
              </div>
            </div>

          </div>
          -->
          <!-- Video Recipes End -->

          <!-- Recipes Start -->
          <div class="section section-padding p-0">

            <div class="section-title flex-title" style=" direction: rtl;">
              <h4 class="title"> وصفات رائجة</h4>
              <!--<a href="recipe-grid.html" class="btn-link" style=" direction: rtl;"> عرض  كل الوصفات &nbsp<i class="fas fa-arrow-left"></i></a> -->
            </div>

            <div class="row">
			<?php foreach($b_recipes as $b_recipe){
			?>
			
              <!-- Recipe Start -->
              <div class="col-md-6">
                <article class="metro_post metro_recipe">
                  <div class="metro_post-thumb">
                    <a href="recipe.php?id=<?=$b_recipe['recipe_id']?>">
                      <img src="recipes/upload/<?=$b_recipe['recipe_image']?>" alt="recipe">
                    </a>
                  </div>
                  <div class="metro_post-body">
                    <div class="metro_post-desc">
                      <span class="metro_post-meta" dir="rtl"> <a href="#"> <i class="far fa-clock"></i> &nbsp;<?=$b_recipe['recipe_time']?> دقائق </a> &nbsp;&nbsp;<a > <i class="fa fa-eye" aria-hidden="true"></i >&nbsp; ا<?=$b_recipe['total_views']?> </a> </span>
                        <h5> <a href="recipe.php?id=<?=$b_recipe['recipe_id']?>">تشيز برغر  مع لمسة من الكاري و الكمون</a> </h5>
              <!--       <p>Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>-->
					</div>
                    <!-- 
                    <div class="metro_rating mb-0">
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                      -->
                  
                </article>
              </div>
              <!-- Recipe End -->

			<?php } ?>


            </div>

            <!-- Pagination Start -->
            <!-- 
            <ul class="pagination mb-0">
              <li class="page-item">
                <a class="page-link" href="#">
            
                <i class="fas fa-arrow-left"></i> </a>   </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#"> 
                <i class="fas fa-arrow-right"></i>     
                 </a></li>
            </ul>
          -->
            <!-- Pagination End -->

          </div>
          <!-- Recipes End -->

        </div>

        <!-- sidebar Start -->
        <div class="col-lg-4">
          <div class="sidebar">

            <!-- Sidebar CTA Start -->
            <div class="sidebar-widget sidebar-cta">
              <img src="https://via.placeholder.com/320x600" alt="Call To Action">
              <div class="sidebar-cta-content">
                <span> طعام جيد </span>
                <h6>  افضل نوعية الطعام</h6>
                <a href="shop.html" class="metro_btn-custom"> تسوق الان</a>
              </div>
            </div>
            <!-- Sidebar CTA End -->

            <!-- About author Start -->
        <!-- <div class="sidebar-widget widget-about-author">
              <div class="widget-about-author-inner">
                <img src="https://via.placeholder.com/225" alt="author">
                <h5>Micheal</h5>
                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Mauris blandit aliquet elit</p>
              </div>
              <ul class="metro_sm">
                <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-intagram-in"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-youtube"></i> </a> </li>
              </ul>
            </div> -->    
            <!-- about Author End -->

            <!-- Recent Posts Start -->
            <div class="sidebar-widget widget-recent-posts" style="background-color: white;">
              <h5 class="widget-title" style="text-align: right;"> المشاركات الاخيرة</h5>
			  
				<?php 
					foreach($l_recipes as $l_recipe){
						$l_cid = $l_recipe['cat_id'];
						$l_cat = get_data_from_id('tbl_category', 'cid', $l_cid, 'category_name');
				?>
				
              <article class="post" style="text-align: right;">
                <a href="recipe.php?id= <?=$l_recipe['recipe_id']?>"><img src="recipes/upload/<?=$l_recipe['recipe_image']?>"  alt="recent recipe"></a>
                <div class="post-content" >
                  <a href="category.php?id=<?=$l_cid?>">&nbsp; <?=$l_cat?></a>
                  <h6> <a href="recipe.php?id= <?=$l_recipe['recipe_id']?>"> <?=$l_recipe['recipe_title']?></a> </h6>
                </div>
              </article>
			  
			  <?php } ?>
			 
            </div>
            <!-- Recent Posts End -->

            <!-- Categories Start -->
            <div class="sidebar-widget" style="background-color: white;">
              <h3 class="widget-title" style="text-align: right;"> قائمة الوصفات </h3>
              <ul style="text-align: right;>
			   <?php 
					foreach($categories as $cat){
				?>
                <li> <a href="category.php?id=<?=$cat['cid']?>"> <?=$cat['category_name']?></a> </li>
				
				<?php } ?>  

              </ul>
            </div>
            <!-- Categories End -->

            <!-- Testimonials Start -->
       <!--      <div class="sidebar-widget">
              <h5 class="widget-title">People are Saying</h5>
              <div class="metro_testimonials">

                <div class="metro_testimonial-item">
                  <div class="metro_testimonials-inner">
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada</p>
                    <div class="metro_testimonial-footer">
                      <img src="https://via.placeholder.com/100" alt="author">
                      <div class="metro_testimonial-content">
                        <h5>Thomas E. Daniels</h5>
                        <span class="custom-primary">CEO & Founder</span>
                      </div>
                    </div>
                  </div>
                </div>
-->
          <!--    <div class="metro_testimonial-item">
                  <div class="metro_testimonials-inner">
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada</p>
                    <div class="metro_testimonial-footer">
                      <img src="https://via.placeholder.com/100" alt="author">
                      <div class="metro_testimonial-content">
                        <h5>Thomas E. Daniels</h5>
                        <span class="custom-primary">CEO & Founder</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="metro_testimonial-item">
                  <div class="metro_testimonials-inner">
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada</p>
                    <div class="metro_testimonial-footer">
                      <img src="https://via.placeholder.com/100" alt="author">
                      <div class="metro_testimonial-content">
                        <h5>Thomas E. Daniels</h5>
                        <span class="custom-primary">CEO & Founder</span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>-->   
            <!-- Testimonials End -->

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
   <!-- Popular Tags Start -->
           <!--  <div class="sidebar-widget">
              <h5 class="widget-title">Popular Tags</h5>
              <div class="tagcloud">
                <a href="#">Health</a>
                <a href="#">Food</a>
                <a href="#">Ingredients</a>
                <a href="#">Organic</a>
                <a href="#">Farms</a>
                <a href="#">Green</a>
                <a href="#">Fiber</a>
                <a href="#">Supplements</a>
                <a href="#">Gain</a>
                <a href="#">Live Stock</a>
                <a href="#">Harvest</a>
              </div>
            </div>  -->
            
            <!-- Popular Tags End -->

            <!-- Social Links Start -->
            <div class="sidebar-widget" style="background-color: white;">
              <h5 class="widget-title" style="text-align: right;"> روابط اجتماعية</h5>
              <ul class="metro_sm" style="direction: ltr;"> 
                <li> <a href="https://www.facebook.com/aklsari3/"  target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
                <!--li> <a href="https://twitter.com/devtechniman"  target="_blank"> <i class="fab fa-twitter"></i> </a> </li-->
                <li> <a href="https://www.instagram.com/aklsari3/"  target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
                <!--li> <a href="https://youtube.com/channel/UC7Ygc2UuevPSnww6R35N8Pw"  target="_blank"> <i class="fab fa-youtube"></i> </a> </li-->
              </ul>
            </div>
            <!-- Social Links End -->

          </div>
        </div>
        <!-- Sidebar End -->

      </div>
    </div>
  </div>
  
  
<?php
	include_once 'includes/footer.php';
?>
</body>

</html>
