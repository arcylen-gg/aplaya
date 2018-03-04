<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
   <?php
    
        $con=mysqli_connect("localhost", "root","water123");
        mysqli_select_db($con, "aplayadb"); 
?>
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

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="page">

  <div class="main-wrapper">

    <!-- HEADER -->
    <div class="header clearfix">

      <!-- TOPBAR -->
      <div class="container clearfix">
        <div class="topbar">
          <ul class="hidden">
            <li class="phoneNo"><i class="fa fa-phone"></i> <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #1' "); ?>
                   <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf22['DESCRIPTION']?>
                   <?php endwhile; ?> 
                        or
               <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #2' "); ?>
                   <?php while($getf222=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf222['DESCRIPTION']?>
                   <?php endwhile; ?> </li>
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
      <img src="images/room/banner-room3.jpg" alt="Banner Image" class="img-responsive">
      <div class="overlay"></div>
      <div class="container">
        <div class="banner-inner">
          <h1 class="top-headline"></h1>
          <p>Feel free to reach us!</p>
        </div>
      </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="main-content common-padding clearfix">
      <div class="container">
        <div class="row">
          <div class=" col-sm-8 col-xs-12 contact-content">
            <div class="comment-form">
              <h3 class="headline">Send Us a Message</h3>
<?php
      
        
       if(isset($_POST["submit"]))           
    {
            $from = $_POST['email']; 
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
          
            extract($_POST);
            $qry = mysqli_query($con,"INSERT INTO comments(email,firstname,lastname,phone,comment) VALUES('$from','$first_name','$last_name','$phone','$message')")or die (mysqli_error($con));
            
            
            echo "Inquiry Sent. Thank you " . $first_name . ", we will contact you shortly."; 
              
        }
    ?>

              <form method="post">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name">
                    </div>
                    <div class="form-group">
                      <input type="phone" class="form-control" placeholder="Phone No" id="phone" name="phone">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="E-mail" id="email" name="email">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <textarea class="form-control" placeholder="Message" rows="5" id="message" name="message"></textarea>
                    <button type="submit" name="submit" id="submit" value="ADD" class="btn primary-btn">Submit </button>
                    
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 contact-address sidebar">
          <h3 class="headline">Address 1</h3>
          <address>
            <strong>Our Place</strong><br>
               <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Address' "); ?>
                   <?php while($getf2=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf2['DESCRIPTION']?>
                      <br>
                   <?php endwhile; ?>
            <strong>Phone:</strong> <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #1' "); ?>
                   <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf22['DESCRIPTION']?>
                   <?php endwhile; ?> 
                        or
               <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #2' "); ?>
                   <?php while($getf222=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf222['DESCRIPTION']?>
                   <?php endwhile; ?> </li>
          </address>
          <h3 class="headline">Email Address</h3>
        
          <a class="ed-email-address" href="mailto:email@domain.com"><strong>E-mail:</strong>     <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Email' "); ?>
                   <?php while($getf22222=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf22222['DESCRIPTION']?>
                   <?php endwhile; ?> </a>
          </div>
        </div>

      </div>
    </div>

    <!-- GOOGLE MAP -->
    <div class="contact_map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3857.2929778284206!2d120.99393631443736!3d14.808806175911384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ae7ba721f8ff%3A0xd37ec2d6877a1c50!2sEl+Marfin+Hotel+and+Pavilion!5e0!3m2!1sen!2sph!4v1517327301840" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen=""></iframe>
    </div>

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


<!-- Mirrored from demo.themefisher.com/iamabdus/eden/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jan 2018 05:18:16 GMT -->
</html>
