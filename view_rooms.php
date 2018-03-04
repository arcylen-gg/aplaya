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


  <link rel="stylesheet" href="jquery/jquery-ui.css">

</head>

<body class="page gallery-page">

  <div class="main-wrapper">

    <!-- HEADER -->
    <div class="header clearfix">

      <!-- TOPBAR -->
      <div class="container clearfix">
        <div class="topbar">
          <ul class="hidden">
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
          
        </div>
      </div>
    </section>

        
  <?php     
    $con = mysqli_connect("localhost", "root","");
    mysqli_select_db($con, "aplayadb"); ?>

    
    <div class="main-content clearfix" style="margin-top: 10px !important;">
      <div class="container">
        <div class="row">
            <label>Checked In</label>
            <div class="form-group">
              <div class="col-md-4 col-xs-6">
                
                <input type="text" class="form-control checkin-date" name="" placeholder="Check In" value="<?php echo (isset($_SESSION['from'])) ? $_SESSION['from'] : ''; ?>" id="from"> 
              </div>
              <div class="col-md-2 col-xs-6">
                <select class="form-control check_in_time-date" name="check_in_time">
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '24:00:00' ? 'selected' : '') : '')?> value="24:00:00">12:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '01:00:00' ? 'selected' : '') : '')?> value="01:00:00">01:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '02:00:00' ? 'selected' : '') : '')?> value="02:00:00">02:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '03:00:00' ? 'selected' : '') : '')?> value="03:00:00">03:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '04:00:00' ? 'selected' : '') : '')?> value="04:00:00">04:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '05:00:00' ? 'selected' : '') : '')?> value="05:00:00">05:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '06:00:00' ? 'selected' : '') : '')?> value="06:00:00">06:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '07:00:00' ? 'selected' : '') : '')?> value="07:00:00">07:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '08:00:00' ? 'selected' : '') : '')?> value="08:00:00">08:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '09:00:00' ? 'selected' : '') : '')?> value="09:00:00">09:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '10:00:00' ? 'selected' : '') : '')?> value="10:00:00">10:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '11:00:00' ? 'selected' : '') : '')?> value="11:00:00">11:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '12:00:00' ? 'selected' : '') : '')?> value="12:00:00">12:00 NN</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '13:00:00' ? 'selected' : '') : '')?> value="13:00:00">01:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '14:00:00' ? 'selected' : '') : '')?> value="14:00:00">02:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '15:00:00' ? 'selected' : '') : '')?> value="15:00:00">03:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '16:00:00' ? 'selected' : '') : '')?> value="16:00:00">04:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '17:00:00' ? 'selected' : '') : '')?> value="17:00:00">05:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '18:00:00' ? 'selected' : '') : '')?> value="18:00:00">06:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '19:00:00' ? 'selected' : '') : '')?> value="19:00:00">07:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '20:00:00' ? 'selected' : '') : '')?> value="20:00:00">08:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '21:00:00' ? 'selected' : '') : '')?> value="21:00:00">09:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '22:00:00' ? 'selected' : '') : '')?> value="22:00:00">10:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_in']) ? ($_SESSION['time_in'] == '23:00:00' ? 'selected' : '') : '')?> value="23:00:00">11:00 PM</option>
                </select>
              </div>
            </div>
          </div>   
        </div>
      </div>   
      <div class="container">
        <div class="row">
            <label>Checked Out</label>
            <div class="form-group">
              <div class="col-md-4 col-xs-6">
                 <input type="text" class="form-control checkout-date" name="" placeholder="Check out" value="<?php echo (isset($_SESSION['to'])) ? $_SESSION['to'] : ''; ?>" id="to"> 
              </div>
              <div class="col-md-2 col-xs-6">
                <select class="form-control check_out_time-date" name="check_out_time">
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '24:00:00' ? 'selected' : '') : '')?> value="24:00:00">12:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '01:00:00' ? 'selected' : '') : '')?> value="01:00:00">01:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '02:00:00' ? 'selected' : '') : '')?> value="02:00:00">02:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '03:00:00' ? 'selected' : '') : '')?> value="03:00:00">03:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '04:00:00' ? 'selected' : '') : '')?> value="04:00:00">04:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '05:00:00' ? 'selected' : '') : '')?> value="05:00:00">05:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '06:00:00' ? 'selected' : '') : '')?> value="06:00:00">06:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '07:00:00' ? 'selected' : '') : '')?> value="07:00:00">07:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '08:00:00' ? 'selected' : '') : '')?> value="08:00:00">08:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '09:00:00' ? 'selected' : '') : '')?> value="09:00:00">09:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '10:00:00' ? 'selected' : '') : '')?> value="10:00:00">10:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '11:00:00' ? 'selected' : '') : '')?> value="11:00:00">11:00 AM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '12:00:00' ? 'selected' : '') : '')?> value="12:00:00">12:00 NN</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '13:00:00' ? 'selected' : '') : '')?> value="13:00:00">01:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '14:00:00' ? 'selected' : '') : '')?> value="14:00:00">02:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '15:00:00' ? 'selected' : '') : '')?> value="15:00:00">03:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '16:00:00' ? 'selected' : '') : '')?> value="16:00:00">04:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '17:00:00' ? 'selected' : '') : '')?> value="17:00:00">05:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '18:00:00' ? 'selected' : '') : '')?> value="18:00:00">06:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '19:00:00' ? 'selected' : '') : '')?> value="19:00:00">07:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '20:00:00' ? 'selected' : '') : '')?> value="20:00:00">08:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '21:00:00' ? 'selected' : '') : '')?> value="21:00:00">09:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '22:00:00' ? 'selected' : '') : '')?> value="22:00:00">10:00 PM</option>
                  <option <?php echo (isset($_SESSION['time_out']) ? ($_SESSION['time_out'] == '23:00:00' ? 'selected' : '') : '')?> value="23:00:00">11:00 PM</option>
                </select>
              </div>
            </div>
          </div>   
        </div>
      </div>         
    <!-- MAIN CONTENT -->
    <div class="main-content common-padding grid-four ed-gallery clearfix">
      <div class="container">
        <h3>El Marfin Rooms </h3>
        <div class="eb-border"></div>
        <div class="row featured popup-gallery">
          <?php     
            $con = mysqli_connect("localhost", "root","");
            mysqli_select_db($con, "aplayadb"); ?>
            <?php 

          $select = "SELECT *, typeName FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID  WHERE roomtype.typeName = 'Room'";
          //die(var_dump($catcher));
            if(isset($_SESSION['from_budget']) && isset($_SESSION['to_budget']))
            {
              $select .= " and room.price >= '".$_SESSION['from_budget']."' and room.price <= '".$_SESSION['to_budget']."'";
            }
            else
            {

              $select .= "and roomtype.other_services = '0'";  
            }
            
              $catcher = mysqli_query($con, $select);
               
              ?>

             <?php while($get=mysqli_fetch_assoc($catcher)):?>

              <div class="row col-md-12">
                <div class="col-md-5">
                    <figure class="ed-room ed-room-highlight featured-room">
                      <a href="../../../admin/mod_room/<?php echo $get['roomImage']?>" title="Photo 1">
                        <img src=" ../../../admin/mod_room/<?php echo $get['roomImage']?>" alt="image" class="img-responsive">
                        <figcaption>
                          <h2 class="headline"><?php echo $get['roomName'] ?></h2>
                          <span class="ed-zoom"><i class="fa fa-search"></i></span>
                        </figcaption>
                      </a>     
                    </figure>
                </div>
                <div class="row">
                  <div class="col-md-6 align-center">
                    <p align="justify"><?php echo $get['description']?></p>
                      <a class="btn bordered-btn " onclick="book_reservation(<?php echo $get['roomNo']; ?>,<?php echo $get['price']; ?> ,<?php echo $get['price_per_hour']; ?>)">Book for Reservation</a>
                  </div>
                </div>
              </div>
              <br>
              <?php 
              endwhile; ?>  
        </div>
        <br>      
      </div>
    </div>
    <form action="/elmarfin/iamabdus/eden/search_controller.php" class="reservation-submit" method="GET">
      <input type="hidden" name="action" value="bookreservation">
      <input type="hidden" name="checkin" class="checkin-class">
      <input type="hidden" name="checkout" class="checkout-class">
      <input type="hidden" name="check_in_time" class="check_in_time-class">
      <input type="hidden" name="check_out_time" class="check_out_time-class">
      <input type="hidden" name="roomNo" class="roomno-class">
      <input type="hidden" name="price" class="price-class">
      <input type="hidden" name="price_per_hour" class="price_per_hour-class">
    </form>

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
        include "elmarfin/iamabdus/eden/footernav.php"        
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

  <script type="text/javascript" language="javascript" src="jquery/jquery-1.9.1.js"></script>
  <script type="text/javascript" language="javascript" src="jquery/jquery-ui.js"></script>
</body>

<script type="text/javascript">
  function book_reservation(room_id, price, price_per_hour)
  {
    $checkin = $(".checkin-date").val();
    $checkout = $(".checkout-date").val();
    $check_in_time = $(".check_in_time-date").val();
    $check_out_time = $(".check_out_time-date").val();
    if($checkin && $checkout)
    {
      $(".checkin-class").val($checkin);
      $(".checkout-class").val($checkout);
       $(".check_in_time-class").val($check_in_time);
      $(".check_out_time-class").val($check_out_time);
      $(".roomno-class").val(room_id);
      $(".price-class").val(price);
      $(".price_per_hour-class").val(price_per_hour);

      $(".reservation-submit").submit();
    }
    else
    {
      alert("Kindly fill up checkin & checkout date.")
    }
  }
</script>

<!-- Mirrored from demo.themefisher.com/iamabdus/eden/gallery-4col.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jan 2018 05:18:06 GMT -->
</html>

  <script type="text/javascript">
      var dateToday = new Date();
      var dates = $("#from, #to").datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          minDate: dateToday,
          onSelect: function(selectedDate) {
              var option = this.id == "from" ? "minDate" : "maxDate",
                  instance = $(this).data("datepicker"),
                  date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
              dates.not(this).datepicker("option", option, date);
          }
      });
     </script>