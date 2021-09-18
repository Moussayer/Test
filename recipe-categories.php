<?php
  require_once 'scripts/init.php';

  $categories = get_table_data('tbl_category');
//var_dump($categories);die();
?>

<!DOCTYPE html>
<html  dir="rtl">

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

</head>

<body style="background-color: #E6E8E9;">

<?php
  include_once 'includes/header.php';
?>

  <!-- Subheader Start -->
  <div class="metro_subheader dark-overlay dark-overlay-2" style="background-image: url(https://www.aklsari3.com/assets/images/ds.jpg)">
    <div class="container">
      <div class="metro_subheader-inner">
        <h1>Recipe Categories</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recipe Categories</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <!-- Categories Start -->
  <div class="section">
    <div class="container">
      <div class="row">

      <?php 
        foreach($categories as $cat){
      ?>
        <!-- Category Start -->
        <div class="col-md-4 col-sm-6">
          <a  href="category.php?id=<?=$cat['cid']?>" class="metro_recipe-category">
            <div class="metro_recipe-category-thumb">
              <img style="height:300px" src="recipes/upload/category/<?=$cat['category_image']?>" alt="Recipe Category">
            </div>
            <div class="metro_recipe-category-content">
              <h5><?=$cat['category_name']?></h5>
              <span class="custom-primary"><?=$cat['category_name']?></span>
            </div>
          </a>
        </div>
        <!-- Category End -->
        <?php } ?>
 
      </div>

      <!-- Pagination Start -->
      <!-- <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#"> <i class="fas fa-arrow-right"></i> </a></li>

        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"> <i class="fas fa-arrow-left"></i> </a></li>

      </ul> -->
      <!-- Pagination End -->

    </div>
  </div>
  <!-- Categories End -->

  <!-- Instagram Start -->
<!--   <div class="row no-gutters">
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
  </div> -->
  <!-- Instagram End -->

<?php
  include_once('includes/footer.php');
?>
</body>

</html>
