<?php
include_once 'scripts/init.php';

if (isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    if (!fetch_data_row('tbl_category', 'cid', $id, '*')) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

$limit = 12; // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
}
;

$start_from = ($pn - 1) * $limit;

$sql = "WHERE `cat_id` = $id ORDER BY `recipe_id` DESC LIMIT $start_from, $limit";
$recipes = get_table_data('tbl_recipes', $col = '*', $sql);
//$rs_result = mysqli_query($sql);
//var_dump($recipes);die();
?>
<!DOCTYPE html>
<html  dir="rtl">

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



</head>

<body style="background-color: #e6e8e9;">

<?php
include_once 'includes/header.php';
?>


  <!-- Subheader Start -->
  <div class="metro_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/images/ds.jpg)">
    <div class="container">
      <div class="metro_subheader-inner">
        <h1>Recipe Grid</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">الوصفات</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <!-- Blog Posts Start -->
  <div class="section">
    <div class="container">
      <div class="row">

    <?php
foreach ($recipes as $recipe) {
    ?>
        <!-- Recipe Start -->
        <div class="col-lg-4 col-md-6">
          <article class="metro_post metro_recipe">
            <div class="metro_post-thumb">
              <a href="recipe.php?id=<?=$recipe['recipe_id']?>">
                <img style="height: 230px;" src="recipes/upload/<?=$recipe['recipe_image']?>" alt="recipe">
              </a>
            </div>
            <div class="metro_post-body">
              <div class="metro_post-desc">
                <span class="metro_post-meta">  <i class="far fa-clock">  <?=$recipe['recipe_time']?> Minutes </i>  <i class="far fa-knife-kitchen"></i>   </span>
                <h5> <a href="recipe.php?id=<?=$recipe['recipe_id']?>"><?=$recipe['recipe_title']?></a> </h5>
               <!--  <p> <?=$recipe['recipe_description']?></p> -->
              </div>
              <a class="btn-link" href="recipe.php?id=<?=$recipe['recipe_id']?>"> قراءة المزيد <i class="fas fa-arrow-right"></i> </a>
            </div>
          </article>
        </div>
        <!-- Recipe End -->

        <?php }?>

      </div>

      <!-- Pagination Start -->
      <ul class="pagination mb-0">

      <?php
        $q ='where `cat_id` =' . $id;
        $row = get_table_data('tbl_recipes', 'COUNT(`recipe_time`)', $q);
        //var_dump($row);die('df');
        $total_records = $row[0]["COUNT(`recipe_time`)"];

        // Number of pages required.
        $total_pages = ceil($total_records / $limit);
        $pagLink = "";
        /* for ($i = 1; $i <= $total_pages; $i++) {  
            if ($i == $pn) {
                $pagLink .= "<li class='page-item active'><a class='page-link' href='category.php?page="
                    . $i . "&id=".$id."'>" . $i . "</a></li>";
            } else {
                $pagLink .= "<li  class='page-item'><a class='page-link' href='category.php?page=" . $i . "&id=".$id. "'>
                                            " . $i . "</a></li>";
            }
        }
        ;
        echo $pagLink; */
        ?>
		

          
      
<!--         <li class="page-item"><a class="page-link" href="#"> <i class="fas fa-arrow-right"></i> </a></li>

        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"> <i class="fas fa-arrow-left"></i> </a></li> -->

      </ul>
      <!-- Pagination End -->
	  
	<ul class="pagination" dir="ltr">
        <li class="page-item"><a class='page-link' href="?page=1&id=<?=$id?>">First</a></li>
        <li class="page-item <?php if($pn <= 1){ echo 'disabled'; } ?>">
            <a class='page-link' href="<?php if($pn <= 1){ echo '#'; } else { echo "?page=".($pn - 1) . "&id=".$id; } ?>">Prev</a>
        </li>
		<?php
		 
                echo "<li class='page-item active'><a class='page-link'>" . $pn . "</a></li>";
            
		?>
        <li class="page-item <?php if($pn >= $total_pages){ echo 'disabled'; } ?>">
            <a class='page-link' href="<?php if($pn >= $total_pages){ echo '#'; } else { echo "?page=".($pn + 1) . "&id=".$id; } ?>">Next</a>
        </li>
        <li class="page-item"><a class='page-link' href="?page=<?php echo $total_pages . "&id=".$id; ?>">Last</a></li>
    </ul>

    </div>
  </div>
  <!-- Blog Posts End -->
 

  <?php
  include_once 'includes/footer.php';
  ?>

</body>

</html>
