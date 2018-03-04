
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>El Marfin Resort</title>  
  
  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="plugins/bx-slider/jquery.bxslider.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="plugins/rs-plugin/css/settings.css" media="screen">
  <link href="plugins/select-box/select.css" type="text/css" rel="stylesheet" />
  <link href="plugins/bootstrap-datepicker-master/bootstrap-datepicker3.min.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
  <link href="plugins/icomoon/style.css" rel="stylesheet">
  <link href="plugins/flexslider/flexslider.css" rel="stylesheet">
  <link rel="stylesheet" href="plugins/dropdown/css/navbar.css">
  <link href="plugins/star-Rating/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="plugins/animate.css">

  <!-- GOOGLE FONT -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Limelight' rel='stylesheet' type='text/css'>
  
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/colors/default.css" id="option_color">



</head>

<body class="page gallery-page">

  <div class="main-wrapper">

    <!-- HEADER -->
    <div class="header clearfix">

      <!-- TOPBAR -->
      <div class="container clearfix">
        <div class="topbar">
          <ul>
            <li class="phoneNo"><i class="fa fa-phone"></i>0123 45678910</li>
            <li class="dropdown language">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-globe"></i>EN
              <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="active">
                      <a href="#">English </a> 
                </li>
                <li><a href="#">Spanish</a></li>
                <li><a href="#">Russian</a></li>
                <li><a href="#">German</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <?php 

    $con=mysqli_connect("localhost", "root","");
    mysqli_select_db($con, "aplayadb"); 
    ?>

      <!-- NAVBAR -->
      <?php include "headernav.php" ?>      

    </div>

    <!-- PAGE BANNER -->
    <section class="page-banner clearfix">
      <img src="images/room/banner-room3.jpg" alt="Banner Image" class="img-responsive">
      <div class="overlay"></div>
      <div class="container">
        <div class="banner-inner">
          <h1 class="top-headline">Image gallery</h1>
          
        </div>
      </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="main-content common-padding grid-four ed-gallery clearfix">
      <div class="container">
        <h3>El Marfin Pavilion</h3>
        <div class="eb-border"></div>
        <div class="row featured popup-gallery">

        
  <?php     
    $con=mysqli_connect("localhost", "root","water123");
    mysqli_select_db($con, "aplayadb"); ?>

      <?php $catcher=mysqli_query($con, "SELECT *, typeName FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID WHERE room.gallery_img = 1"); ?>
      <?php while($get=mysqli_fetch_assoc($catcher)): ?>

        <div class="col-md-3 col-sm-4 col-xs-12">
            <figure class="ed-room ed-room-highlight featured-room">
              <a href="../../../admin/mod_gallery/<?php echo $get['roomImage']?>" title="Photo 1">
                <img src=" ../../../admin/mod_gallery/<?php echo $get['roomImage']?>" alt="image" class="img-responsive">
                <figcaption>
                  <h2 class="headline">IMAGE NAME</h2>
                  <span class="ed-zoom"><i class="fa fa-search"></i></span>
                </figcaption>
              </a>     
            </figure>
        </div>
        
        <?php endwhile; ?>  
          
        </div>
        
      </div>
    </div>

    <!-- DARK SECTION -->
    <section class="dark-section common-padding clearfix">
      <div class="weather-newsletter">
        <div class="container">
          <div class="row">
           
            <div class="col-sm-8 col-xs-12">
              <div class="newsletter">
               
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

     <?php
        include "footernav.php"        
    ?>

  </div>

  <script src="../../../ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/bx-slider/jquery.bxslider.min.js"></script><!-- bx-slider js -->
  <script src="plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  <script src="plugins/select-box/select.js"></script>
  <script src="plugins/bootstrap-datepicker-master/bootstrap-datepicker.min.js"></script>
  <script src="plugins/mixitup-master/jquery.mixitup.min.js"></script>
  <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="plugins/flexslider/jquery.flexslider-min.js"></script>
  <script src="plugins/countdown/jquery.syotimer.js"></script>
  <script src="plugins/dropdown/js/navbar.js"></script>
  <script src="plugins/star-Rating/js/star-rating.min.js" type="text/javascript"></script>
  <script src="js/custom.js"></script>

</body>


<!-- Mirrored from demo.themefisher.com/iamabdus/eden/gallery-4col.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jan 2018 05:18:06 GMT -->
</html>