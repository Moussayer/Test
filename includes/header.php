<?php
include_once 'scripts/init.php';


$sql_h = "where `content_type` != 'youtube' ORDER BY RAND() limit 0,4";
$recipes_h = get_table_data('tbl_recipes', $col = '*', $sql_h);
//$rs_result = mysqli_query($sql);
//var_dump($recipes_h);die();
?>
  <!-- Aside (Right Panel) -->
  <aside class="metro_aside metro_aside-right">
    <div class="sidebar">

      <!-- Sidebar CTA Start -->
      <!--div class="sidebar-widget sidebar-cta">
        <img src="assets/images/ko.jpeg" alt="Call To Action">
        <div class="sidebar-cta-content">
          <span>طعام جيد</span>
          <h6>افضل نوعيةالطعام</h6>
          <a href="shop.html" class="metro_btn-custom">تسوق الان</a>
        </div>
      </div-->
      <!-- Sidebar CTA End -->

      <!-- Recent Recipes Start -->
      <div class="sidebar-widget widget-recent-posts" >
        <h5 class="widget-title" style="text-align: right;"> الوصفات الحديثة</h5>
		
		<?php foreach($recipes_h as $recipe_h){
			$header_cid = $recipe_h['cat_id'];
            $header_cat = get_data_from_id('tbl_category', 'cid', $header_cid, 'category_name');
		?>
		
        <article class="post" style="text-align: right;">
          <a href="recipe.php?id=<?=$recipe_h['recipe_id']?>"><img  src="recipes/upload/<?=$recipe_h['recipe_image']?>" alt="post"></a>
          <div class="post-content">
            <a  href="category.php?id=<?=$header_cid?>">&nbsp; <?=$header_cat?> </a>
            <h6> <a href="recipe.php?id=<?=$recipe_h['recipe_id']?>">&nbsp;<?=$recipe_h['recipe_title']?></a> </h6>
          </div>
        </article>
		
		<?php } ?>
		
      </div>
      <!-- Recent Recipes End -->

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
      </div>-->
      <!-- Popular Tags End -->

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
        <a href="index.php" class="active">الرئيسية</a>
         <!--  <ul class="sub-menu">
        <li class="menu-item"> <a href="index.html">الرئيسية</a> </li>
        </ul>-->
      </li>
      <li class="menu-item menu-item-has-children">
        <a href="recipe-categories.php">قائمة الوصفات</a>
      <!--   <ul class="sub-menu">
        <li class="menu-item"> <a href="blog-grid.html">Blog Archive</a> </li> 
          <li class="menu-item"> <a href="blog-details.html">Blog Details</a> </li> 
        </ul>
      -->
      </li>
      <li class="menu-item menu-item-has-children">
   <!--    <a href="#">الوصفات المقترحة</a>
        <ul class="sub-menu">
          <li class="menu-item"> <a href="shop.html">Shop Catalog</a> </li>
          <li class="menu-item"> <a href="cart.html">Cart</a> </li>
          <li class="menu-item"> <a href="checkout.html">Checkout</a> </li>
          <li class="menu-item"> <a href="product-details.html">Product Details</a> </li>
        </ul>
      --> 
      </li>  
      <li class="menu-item menu-item-has-children">
        <a href="recipe-all.php">الوصفات</a>
        <!--   <ul class="sub-menu">
          <li class="menu-item"> <a href="recipe-grid.html">Recipe Archive</a></li>
          <li class="menu-item"> <a href="recipe-details.html">Recipe Details</a></li>
          <li class="menu-item"> <a href="recipe-categories.html">Recipe Categories</a></li>
        <li class="menu-item"> <a href="recipe-authors.html">Recipe Authors</a></li>--> 
   <!-- <li class="menu-item"> <a href="recipe-submit.html">Submit Recipe</a></li> -->  
    <!--   <li class="menu-item"> <a href="recipe-submit.html">Submit Recipe</a></li> 
        </ul>-->  
      </li>
      <li class="menu-item menu-item-has-children">
        <a href="contact-us.php">تواصل معنا</a>
        <!--     <ul class="sub-menu">
        <li class="menu-item"> <a href="contact-us.html">تواصل معنا</a> </li>

 <li class="menu-item"> <a href="team.html">Team</a> </li>     
        </ul>-->  
      </li>
      &nbsp;&nbsp;
      <form class="search-from" method="GET" action="search.php" >
            <div class="metro_search-adv-input" >
              <button type="submit" ><i class="fa fa-search" ></i></button>
              <input type="text" class="form-control" placeholder="ابحث عن الفواكه والخضروات" name="q" value="">
              
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
            

          <!--  <li class="menu-item"> <a href="team.html">Team</a> </li> 

         <li class="menu-item"> <a href="contact-us.html"> <h4> تواصل معنا</h4></a> </li>
          </ul>-->

          <!-- Call to Action -->
            <!--  <div class="metro_header-controls">

     <a href="recipe-submit.html" class="metro_btn-custom">Submit Recipe</a>   

            <div class="aside-toggler aside-trigger-left">
              <span></span>
              <span></span>
              <span></span>
            </div> 
          </div>-->
    
     </div>

    </div>
    <!-- Middle Header End -->

    <!-- Bottom Header Start -->
    <div class="metro_header-bottom">
      <div class="container">

        <div id="menu" class="metro_header-bottom-inner">

          <!-- Side navigation toggle -->
          <div class="aside-toggler aside-trigger-right desktop-toggler">
            <span></span>
            <span></span>
            <span></span>
          </div>
		   <!-- Menu -->
          <ul class="navbar-nav" style="direction: rtl;">
		  <a href="index.php"> <img src="https://1.bp.blogspot.com/-7Iast5i-lMY/YQlkQ3paoqI/AAAAAAAAI2E/DEf4QJQwIsYyeWp5U9CY9hQX90cjH1lAgCLcBGAsYHQ/s320/logo.png" alt="logo" style="width:px;height:72px;"> </a>
        
            <li class="menu-item menu-item-has-children">
              <a href="index.php" class="active" > الرئيسية</a>
          <!--     <ul class="sub-menu">
                <li class="menu-item"> <a href="index.html">الرئيسية </a> </li>
              </ul>-->
            </li>
            <li class="menu-item menu-item-has-children">
              <a href="recipe-categories.php">الوصفات</a>
        <!--      <ul class="sub-menu">
         <li class="menu-item"> <a href="blog-grid.html">Blog Archive</a> </li>        
                <li class="menu-item"> <a href="blog-details.html">Blog Details</a> </li>
              </ul> -->
            </li> 
     <!-- <li class="menu-item menu-item-has-children">
              <a href="#">الوصفات المقترحة</a>
              <ul class="sub-menu">
                <li class="menu-item"> <a href="shop.html">Shop Catalog</a> </li>
                <li class="menu-item"> <a href="cart.html">Cart</a> </li>
                <li class="menu-item"> <a href="checkout.html">Checkout</a> </li>
                <li class="menu-item"> <a href="product-details.html">Product Details</a> </li>
              </ul>
            </li>-->       
            <li class="menu-item menu-item-has-children mega-menu-wrapper">
              <a href="recipe-all.php" >اخر الوصفات</a>
             <!--  <ul class="sub-menu">
                <li>
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="mega-menu-item">
                          <h6>Recipe Pages</h6>
                          <a href="recipe-grid.html">Recipe Archive</a>
                          <a href="recipe-details.html">Recipe Details</a>
                          <a href="recipe-categories.html">Recipe Categories</a>
                          <a href="recipe-authors.html">Recipe Authors</a> 
                         <a href="recipe-submit.html">Submit Recipe</a> 
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mega-menu-item">
                          <a href="recipe-grid.html" class="metro_recipe-category">
                            <div class="metro_recipe-category-thumb">
                              <img src="https://via.placeholder.com/370" alt="Recipe Category">
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mega-menu-item">
                          <a href="recipe-grid.html" class="metro_recipe-category">
                            <div class="metro_recipe-category-thumb">
                              <img src="https://via.placeholder.com/370" alt="Recipe Category">
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                </li>
              </ul>-->
            </li>
            <li class="menu-item menu-item-has-children">
              <a href="contact-us.php" >تواصل معنا</a>
            <!--   <ul class="sub-menu">
               <li class="menu-item"> <a href="contact-us.html">تواصل معنا</a> </li>

                  <li class="menu-item"> <a href="team.html">Team</a> </li>   
              </ul> --> 
            </li>
            
            &nbsp;&nbsp;
   
           <form class="search-from" method="GET" action="search.php" >
            <div class="metro_search-adv-input" >
              <button type="submit" ><i class="fa fa-search" ></i></button>
              <input type="text" class="form-control" placeholder="ابحث عن الفواكه والخضروات" name="q" value="">
              
            </div>
          </form>
  
</ul>
          <ul class="metro_header-bottom-sm metro_sm" style="direction: ltr;">
            <li> <a href="https://www.facebook.com/aklsari3/" target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
            <!--li> <a href="https://twitter.com/devtechniman"  target="_blank"> <i class="fab fa-twitter"></i> </a> </li-->
            <li> <a href="https://www.instagram.com/aklsari3/"  target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
            <!--li> <a href="https://youtube.com/channel/UC7Ygc2UuevPSnww6R35N8Pw"  target="_blank"> <i class="fab fa-youtube"></i> </a> </li-->
          </ul>

        </div>

      </div>
    </div>
    <!-- Bottom Header End -->
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script type="text/javascript">
    $(function(){
        $('.menu-item a').filter(function(){
            return this.href==location.href}).parent().addClass('active').siblings().removeClass('active');

        $('.menu-item a').click(function(){
            $(this).parent().addClass('active').siblings().removeClass('active')    
            });
        });
</script>
  </header>
  <!-- Header End -->