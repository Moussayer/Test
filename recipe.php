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

<body style="background-color: #e6e8e9;">

  <?php
  include_once 'includes/header.php';
  ?>

  <!-- Subheader Start -->
<!--   <div class="metro_subheader dark-overlay dark-overlay-2" style="background-image: url(https://via.placeholder.com/1920x550)">
    <div class="container">
      <div class="metro_subheader-inner">
        <h1>تفاصيل الوصفة </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page"> تفاصيل الوصفة</li>
          </ol>
        </nav>
      </div>
    </div>
  </div> -->
  <!-- Subheader End -->

  <!-- Post Content Start -->
  <div class="section metro_post-single" >
    <div class="container">

      <div class="row">
        <div class="col-lg-8" >

          <!-- Content  -->
          <div class="metro_post-single-wrapper metro_recipe-single-wrapper" style=" direction: rtl;" >

            <h2 class="entry-title" style="  float: right;" ><?=$recipe['recipe_title']?></h2>
          </br></br> &nbsp;&nbsp;&nbsp;

            <div class="metro_post-single-thumb" >
              <?php
                  if($type != 'youtube'){
                ?>
              <img  src="recipes/upload/<?=$recipe['recipe_image']?>" alt="post">
              <?php } ?>
              <div class="metro_post-date">
              <?php 
                  $time = $recipe['recipe_time'];
                  $month=date("M",$time);
                  $day=date("D",$time);
                ?>
              <span><?=$day?></span>
                <span><?=$month?></span>
              </div>
            </div>

            <!-- Entry Content Start -->
            <div class="entry-content"  >
              <span class="metro_post-meta">
                <a href="category.php?id=<?=$cat_id?>"> <?=$category_title?> </a>
                <i class="far fa-clock"></i> <?=$recipe['recipe_time']?> minutes
              </span>

              <p> <?=$recipe['recipe_description']?>  </p>

              
               
 
            </div>
            <!-- Entry Content End -->

          </div>

          <div class="row">
                <?php
                  if($type == 'youtube'){
                    //var_dump($recipe['video_id']);
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

          <!-- Related Posts -->
          <div class="metro_related-posts">

            <h4 style=" text-align: right;"> الوصفات ذات صلة</h4>

            <div class="metro_related-posts-slider" dir="ltr">

            <?php
                $r = "where `cat_id` = $cat_id AND `content_type` != 'youtube'";
                $rels = get_table_data('tbl_recipes', $col = '*', $r);
                //$rel = $rel[0];
                foreach($rels as $rel){
            ?>

              <!-- Recipe Start -->
              <article class="metro_post metro_recipe">
                <div class="metro_post-thumb">
                  <a href="recipe.php?id=<?=$rel['recipe_id']?>">
                    <img src="recipes/upload/<?=$rel['recipe_image']?>" alt="recipe">
                  </a>
                </div>
                <div class="metro_post-body">
                  <div class="metro_post-desc">
                    <h5> <a href="recipe.php?id=<?=$rel['recipe_id']?>"><?=$rel['recipe_title']?></a> </h5>
                    <p>تم حجزه غدًا ، لكن الباب كان رائعًا. أخبرني أنه لا يوجد الكثير من اللاعبين الذين يمكنهم</p>
                  </div>
                  <a class="btn-link" href="recipe.php?id=<?=$rel['recipe_id']?>"> قراءة المزيد <i class="fas fa-arrow-right"></i> </a>
                </div>
              </article>
              <!-- Recipe End -->

            <?php } ?>
 

            </div>

          </div>

        </div>

        <?php
           if($type != 'youtube'){
         ?>
        <!-- Sidebar Start -->
        <div class="col-lg-4">
          <div class="sidebar">
              </br>
                </br>
              </br>
            </br>

            <!-- Sidebar CTA Start -->
            <div class="sidebar-widget sidebar-cta">
              <img src="https://via.placeholder.com/370x400" alt="Call To Action">
              <div class="sidebar-cta-content">
                <span>طعام جيد</span>
                <h6>أفضل نوعية طعام</h6>
                <a href="shop.html" class="metro_btn-custom">تسوق الآن</a>
              </div>
            </div>
            <!-- Sidebar CTA End -->

            <!-- Recent Posts Start -->
            <div class="sidebar-widget widget-recent-posts" style="direction: rtl;">
              <h5 class="widget-title" style="text-align: right;"> المشاركات الاخيرة</h5>
<?php
$sql_side = "ORDER BY `recipe_id` DESC LIMIT 0,4";
$ss = get_table_data('tbl_recipes', $col = '*', $sql_side);
//var_dump($ss);
foreach($ss as $s){
?>
              <article class="post">
                <a style="text-align: right;"href="recipe.php?id=<?=$s['recipe_id']?>"><img src="recipes/upload/<?=$s['recipe_image']?>" alt="post"></a>
                &nbsp;&nbsp;
                <div class="post-content" style="text-align: right;">
                  <a href="recipe.php?id=<?=$s['recipe_id']?>" > <?=$s['recipe_title']?> </a>
                  <h6> <a href="recipe.php?id=<?=$s['recipe_id']?>" >قراءة المزيد</a> </h6>
                </div>
              </article>

              <?php } ?>
              
            </div>
            <!-- Recent Posts End -->


          </div>
        </div>
        <!-- Sidebar End -->

        <?php } ?>

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
