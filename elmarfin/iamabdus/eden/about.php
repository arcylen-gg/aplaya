<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
      <?php     
    $con=mysqli_connect("localhost", "root","");
    mysqli_select_db($con, "aplayadb"); ?>
<!-- Mirrored from demo.themefisher.com/iamabdus/eden/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jan 2018 05:17:17 GMT -->
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

<body class="page about-page">

  <div class="main-wrapper">

    <!-- HEADER -->
    <div class="header clearfix">

      <!-- TOPBAR -->
      <div class="container clearfix">
        <div class="topbar">
          <ul class="hidden">
            <li class="phoneNo"><i class="fa fa-phone"></i>
            <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #1' "); ?>
                   <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf22['DESCRIPTION']?>
                   <?php endwhile; ?> 
                        or
               <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #2' "); ?>
                  <?php while($getf222=mysqli_fetch_assoc($catcher)): ?>
                    <?php echo $getf222['DESCRIPTION']?>
                  <?php endwhile; ?> 
            
            </li>
            <li class="dropdown language">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-globe"></i>EN
              <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="active">
                      <a href="#">English </a> 
                </li>
              
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- NAVBAR -->
       <?php include "headernav.php" ?>      

    </div>

    <!-- PAGE BANNER -->
    <section class="page-banner clearfix">
      <img src="images/about/about-banner.jpg" alt="Banner Image" class="img-responsive">
      <div class="overlay"></div>
      <div class="container">
        <div class="banner-inner">
          <h1 class="top-headline">The Hotel</h1>
          <p>El Marfin Pavilion </p>
        </div>
      </div>
    </section>

    <!-- WHITE SECTION -->
    <section class="white-section common-padding clearfix">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-5 col-xs-12">
            <img src="images/about/about-img1.jpg" class="img-responsive"/>
          </div>

          <div class="col-md-6 col-sm-7 col-xs-12">
            <h2 class="top-headline">About Our Hotel</h2>
            <p>
                 <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'About Our Hotel Write Ups' "); ?>
                   <?php while($getf123=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf123['DESCRIPTION']?>
                   <?php endwhile; ?> 
           </p>
          </div>
        </div>
      </div>
    </section>

    <!-- LIGHT SECTION -->
    <section class="light-section common-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 col-xs-12">
            <h2 class="top-headline">Our Experience</h2>
            <p>
                <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Our Experience Write Ups' "); ?>
                   <?php while($getf123=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf123['DESCRIPTION']?>
                   <?php endwhile; ?> 
           </p>
          </div>

          <div class="col-md-6 col-sm-5  col-xs-12">
            <img src="images/about/about-img2.jpg" class="img-responsive"/>
          </div>
        </div>
      </div>
    </section>

    <!-- WHITE SECTION -->
    <section class="white-section common-padding clearfix">
      <div class="container">
        <div class="video-section">
          <h2 class="top-headline">SUCCESSFUL EVENT @ El Marfin Resort.</h2>
          <p>
                    <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Successful Events Write Ups' "); ?>
                   <?php while($getf1234=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf1234['DESCRIPTION']?>
                   <?php endwhile; ?> </p>
          <div class="video-wrapper">
            <iframe width="7050" height="405" 
              src="https://www.youtube.com/embed/kZCUfUjxlUc?autoplay=1" frameborder="0" allowfullscreen>
                   
            
            </iframe>
          </div>
        </div>
      </div>
    </section>


    <section class="white-section common-padding clearfix">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-5 col-xs-12">
            <h2 class="top-headline">Mission</h2>
            <div class="carousal_content">
              <p><?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Mission' "); ?>
                   <?php while($getf12345=mysqli_fetch_assoc($catcher)): ?>
                    <?php echo $getf12345['DESCRIPTION']?>
                   <?php endwhile; ?> </p>
            </div>
          </div>

          <div class="col-md-6 col-sm-7 col-xs-12">
            <h2 class="top-headline">Vision</h2>
           <div class="carousal_content">
              <p><?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Vision' "); ?>
                   <?php while($getf123456=mysqli_fetch_assoc($catcher)): ?>
                    <?php echo $getf123456['DESCRIPTION']?>
                   <?php endwhile; ?> </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- LIGHT SECTION -->
   
        

    <!-- WHITE SECTION -->
    

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


<!-- Mirrored from demo.themefisher.com/iamabdus/eden/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jan 2018 05:17:30 GMT -->
</html>