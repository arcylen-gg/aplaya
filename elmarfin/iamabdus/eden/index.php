<!DOCTYPE html>
<html lang="en">
        
  <?php     
    $con=mysqli_connect("localhost", "root","");
    mysqli_select_db($con, "aplayadb"); ?>
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

<body>

  <div class="main-wrapper">

    <!-- HEADER -->
    <div class="header clearfix">

      <!-- TOPBAR -->
      <div class="container clearfix">
        <div class="topbar">
          <ul>
            <li><a href="../../../index.php?page=8">Login</a></li>
            <li class="phoneNo"><i class="fa fa-phone"></i> <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #1' "); ?>
                   <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf22['DESCRIPTION']?>
                   <?php endwhile; ?> 
                        or
               <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #2' "); ?>
                   <?php while($getf222=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf222['DESCRIPTION']?>
                   <?php endwhile; ?> </li>
           
          </ul>
        </div>
      </div>

    <?php include "headernav.php" ?>
    <!-- BANNER -->
    <div class="bannercontainer">
      <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
          <ul>
            <li class="rs-slider1" data-transition="fade" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
              <img src="images/home/slider-img4.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
              <div class="slider-caption container">

                <div class="tp-caption rs-caption-rating sft"
                  data-x="center"
                  data-hoffset="0"
                  data-y="150"
                  data-speed="1300"
                  data-start="500"
                  data-easing="Power4.easeOut"
                  data-endspeed="300"
                  data-endeasing="Power1.easeIn"
                  data-captionhidden="off"
                  style="z-index: 6">
                  <span class="ed-rating">
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                  </span>
                </div>

                
                
                <div class="tp-caption rs-caption-1 sft start"
                  data-x="center"
                  data-hoffset="0"
                  data-y="230"
                  data-speed="1500"
                  data-start="500"
                  data-easing="Back.easeInOut"
                  data-endeasing="Power1.easeIn"
                  data-endspeed="300">
                   <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Home Slider Message 1' "); ?>
                   <?php while($geth1=mysqli_fetch_assoc($catcher)): ?>
                 <!-- The Most Amazing<br> Hotel Template    -->
                      <?php echo $geth1['DESCRIPTION']?>
                  
                   <?php endwhile; ?>   
                </div>

                <div class="tp-caption rs-caption-2 sft start"
                  data-x="center"
                  data-hoffset="0"
                  data-y="400"
                  data-speed="2000"
                  data-start="1000"
                  data-easing="Back.easeInOut"
                  data-endeasing="Power1.easeIn"
                  data-endspeed="300">
                 <!-- A Complete HTML Template For Hotel Room Reservation -->
                </div>

              </div>
            </li>
            <li class="rs-slider2" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
              <img src="images/home/slider-img5.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
              <div class="slider-caption container">

                <div class="tp-caption rs-caption-rating sft"
                  data-hoffset="0"
                  data-y="150"
                  data-speed="1300"
                  data-start="500"
                  data-easing="Power4.easeOut"
                  data-endspeed="300"
                  data-endeasing="Power1.easeIn"
                  data-captionhidden="off"
                  style="z-index: 6">
                  <span class="ed-rating">
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                  </span>
                </div>

                <div class="tp-caption rs-caption-1 sft start"
                  data-hoffset="0"
                  data-y="230"
                  data-speed="1500"
                  data-start="500"
                  data-easing="Back.easeInOut"
                  data-endeasing="Power1.easeIn"
                  data-endspeed="300">
                   <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Home Slider Message 2' "); ?>
                   <?php while($geth2=mysqli_fetch_assoc($catcher)): ?>
                 <!-- The Most Amazing<br> Hotel Template    -->
                      <?php echo $geth2['DESCRIPTION']?>
                  
                   <?php endwhile; ?>
                </div>

                <div class="tp-caption rs-caption-2 sft start"
                  data-hoffset="0"
                  data-y="400"
                  data-speed="2000"
                  data-start="1000"
                  data-easing="Back.easeInOut"
                  data-endeasing="Power1.easeIn"
                  data-endspeed="300">



                 <!-- A Complete HTML Template For Hotel Room Reservation  -->
                </div>

              </div>
            </li>
            <li class="rs-slider3" data-transition="fade" data-slotamount="5" data-masterspeed="700"  data-title="Slide 3">
              <img src="images/home/slider-img6.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
              <div class="slider-caption container">

                <div class="tp-caption rs-caption-rating sft"
                  data-hoffset="0"
                  data-y="150"
                  data-speed="1300"
                  data-start="500"
                  data-easing="Power4.easeOut"
                  data-endspeed="300"
                  data-endeasing="Power1.easeIn"
                  data-captionhidden="ON"
                  style="z-index: 6">
                  <span class="ed-rating">
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                  </span>
                </div>

                <div class="tp-caption rs-caption-1 sft start"
                  data-hoffset="0"
                  data-y="230"
                  data-speed="1500"
                  data-start="500"
                  data-easing="Back.easeInOut"
                  data-endeasing="Power1.easeIn"
                  data-endspeed="300">
                  <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Home Slider Message 3' "); ?>
                   <?php while($geth3=mysqli_fetch_assoc($catcher)): ?>
                 <!-- The Most Amazing<br> Hotel Template    -->
                      <?php echo $geth3['DESCRIPTION']?>
                  
                   <?php endwhile; ?>
                </div>
          
                <div class="tp-caption rs-caption-2 sft start"
                  data-hoffset="0"
                  data-y="400"
                  data-speed="2000"
                  data-start="1000"
                  data-easing="Back.easeInOut"
                  data-endeasing="Power1.easeIn"
                  data-endspeed="300">
                 <!-- A Complete HTML Template For Hotel Room Reservation-->
                </div>

              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- CHECK AREA -->
    <section class="check-area clearfix">
      <div class="container">
        <div class="row">
            <marquee>  

            <h3><?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'About Our Hotel Write Ups' "); ?>
                   <?php while($getf1111=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf1111['DESCRIPTION']?>
                   <?php endwhile; ?> 
              </h3>     
            </marquee>
        </div>
      </div>
    </section>

    <!-- WHITE SECTION -->

    <section class="white-section common-padding clearfix">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <a href="search.php"><h2 class="top-headline text-center" >WHAT ARE YOU LOOKING FOR ?</h2></a>
          </div>
        </div>
      </div>
    </section>


    <section class="white-section common-padding clearfix">
      <div class="container">
        <h2 class="top-headline">Amenities Available</h2>
        <div class="underLine">
          <img src="images/home/underline.png" alt="underline" class="img-responsive"/>
        </div>

        <div class="row featured">

      <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Room Reservation Write Ups' "); ?>
      <?php while($get=mysqli_fetch_assoc($catcher)): ?>
          <div class="col-sm-4 col-xs-12">
            <figure class="ed-room ed-room-highlight featured-room">
                <img src="images/home/sample-rm3.jpg" alt="Image" class="img-responsive">
                <div class="corner-ribbon"><span>Inquire Now!</span></div>
                <figcaption>
                  <h3 class="headline">Room Reservation</h3>
                  <p>
                    <!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. Lorem Ips -->
                   <?php echo $get['DESCRIPTION']?>
                  </p> 
                </figcaption>
          <?php endwhile; ?>   
            </figure>
            <div class="row">
              <div class="col-xs-6 align-center left-btn">
                <a href="../../../../view_rooms.php" class="btn bordered-btn">View Room Rates.</a>
              </div>
            </div>
          </div>
      <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Pavilion Reservation Write Ups' "); ?>
      <?php while($get1=mysqli_fetch_assoc($catcher)): ?>
          <div class="col-sm-4 col-xs-12">
            <figure class="ed-room ed-room-highlight featured-room">
              <a href="#slider-container2" class="popup-modal">
                <img src="/images/home/pavilion-img.jpg" alt="Image" style="width:360px;height: 248px;object-fit: contain;">
                <div class="corner-ribbon"><span>Inquire Now!</span></div>
                <figcaption>
                  <h3 class="headline">Pavilion Reservation</h3>
                  <!--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. Lorem Ips</p>-->
                   <p><?php echo $get1['DESCRIPTION']?>  </p>
                </figcaption>
              </a>
            </figure>
            <div class="row">
              <div class="col-xs-6 align-center left-btn">
                <a href="../../../../view_pavilion.php" class="btn bordered-btn">View Pavilion Rates</a>
              </div>

            </div>
               <?php endwhile; ?> 
          </div>
      <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Pool Reservation Write Ups' "); ?>
      <?php while($get11=mysqli_fetch_assoc($catcher)): ?>        
          <div class="col-sm-4 col-xs-12">
            <figure class="ed-room ed-room-highlight featured-room">
              <a href="#slider-container3" class="popup-modal">
                <img src="/images/home/pool-img.jpg" alt="Image" style="width:360px;height: 248px;object-fit: contain;">
                <div class="corner-ribbon"><span>Inquire Now!</span></div>
                <figcaption>
                  <h3 class="headline">POOL RESERVATION</h3>
                  <p>
                    <!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard. Lorem Ips  -->
                     <p><?php echo $get11['DESCRIPTION']?>  </p>   
                  </p>
                
                </figcaption>
              </a>
            </figure>
            <div class="row align-center">
              <div class="col-xs-6 align-center left-btn">
                <a href="../../../../view_pool.php" class="btn bordered-btn">View Pool Rates</a>
              </div>
            </div>
             <?php endwhile; ?>       
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


<!-- Mirrored from demo.themefisher.com/iamabdus/eden/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jan 2018 05:15:20 GMT -->
</html>