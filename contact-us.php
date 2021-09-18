<!DOCTYPE html>
<html  lang="ar" dir="rtl">

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
  <div class="metro_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/images/cn.jpg)">
    <div class="container">
      <div class="metro_subheader-inner">
        <h1>اتصل بنا</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page"> تواصل معنا</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <!-- Icons Start -->
  <div class="section section-padding">
    <div class="container">
      <div class="row">
<!-- 
        <div class="col-lg-3 col-md-6">
          <div class="metro_icon-block">
            <a href="tel:+123456789">
              <i class="flaticon-email"></i>
              <h5>مركز الاتصال</h5>
              <p>+212 645632 789</p>
            </a>
          </div>
        </div>
-->
        <div class="col-lg-3 col-md-6">
          <div class="metro_icon-block">
            <a href="mailto:example@example.com">
              <i class="flaticon-email"></i>
              <h5>بريدنا الالكتروني</h5>
              <p>info@example.com</p>
            </a>
          </div>
        </div>
<!-- 
        <div class="col-lg-3 col-md-6">
          <div class="metro_icon-block">
            <div>
              <i class="flaticon-location"></i>
              <h5>اقرب فرع</h5>
              <p>25 Main Road, New York</p>
            </div>
          </div>
        </div>
-->
        <div class="col-lg-3 col-md-6">
          <div class="metro_icon-block">
            <div>
              <i class="flaticon-tag"></i>
              <h5>تابعنا</h5>
              <ul class="metro_header-bottom-sm metro_sm" style="direction: ltr;">
                <li> <a href="https://www.facebook.com/apparabic" target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
                <li> <a href="https://twitter.com/devtechniman" target="_blank"> <i class="fab fa-twitter"></i> </a> </li>
                <li> <a href="https://www.Instagram.com/devtechniman" target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
                <li> <a href="https://youtube.com/channel/UC7Ygc2UuevPSnww6R35N8Pw" target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Icons End -->

  <!-- Map & Contact Form Start -->
  <div class="section pt-0">
    <div class="container">
      <div class="row" dir="rtl">

        <div class="col-lg-6" >

          <div class="metro_comments-form p-0 border-0" style="text-align: right;">
            <h4>ارسل لنا رسالة</h4>

            <form method="post" style="direction: rtl;" id="contactForm">
              <div class="form-group">
                <input type="text" placeholder="اسم المستخدم" class="form-control" name="name" value="">
                <i class="far fa-user"></i>
              </div>
              <div class="form-group">
                <input type="email" placeholder="البريد الالكتروني " class="form-control" name="email" value="">
                <i class="far fa-envelope"></i>
              </div>
              <div class="form-group">
                <input type="text" placeholder="الموضوع" class="form-control" name="subject" value="">
                <i class="far fa-sticky-note"></i>
              </div>
              <div class="form-group">
                <textarea name="message" class="form-control" placeholder="اكتب رسالتك" rows="8"></textarea>
                <i class="far fa-envelope"></i>
              </div>
            </form>
            <button id="submit-button" class="metro_btn-custom primary" name="button">ارسال الرسالة</button>

          </div>
			
			<div id="msg"></div> 

        </div>

      </div>
    </div>
  </div>
  <!-- Map & Contact Form End -->

<?php
  include_once('includes/footer.php');
?>

  <script>
        $( '#submit-button' ).click( function(){
            var data = new FormData( $( 'form#contactForm' )[ 0 ] );
            $.ajax( {
              processData: false,
              contentType: false,
              cache: false,
              data: data,
              dataType: 'json',
              type: 'POST',
              url: 'mail-contact.php',
              success: function( feedback ){
                 if(feedback.success){
                     var html = '<div class="alert alert-success alert-dismissible" role="alert"><strong>Success!</strong> '+feedback.msg+'</div>';
					 $('#msg').html(html);
					 //setTimeout(function(){ window.location.replace("update-location.php"); }, 1000);
                 }else if(feedback.error){
                     var html = '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error!</strong> '+feedback.msg+'</div>';
                     $('#msg').html(html);
					 //$("#msg").fadeToggle(2000);
                 }
              }
            });
        });

    </script>
</body>

</html>
