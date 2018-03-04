<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
   <?php
    
        $con=mysqli_connect("localhost", "root","");
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
  <!-- <link href="plugins/bootstrap-datepicker-master/bootstrap-datepicker3.min.css" type="text/css" rel="stylesheet" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="../jquery/bootstrap-datetimepicker-standalone.min.css"> -->
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

  <link rel="stylesheet" href="../../../jquery/jquery-ui.css">
<!-- 

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
   -->
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
        <div class="banner-inner" style="margin-top: 50px !important;">
          <h1 class="top-headline"></h1>
          <p style="font-size: 30px" class="">
             What are you looking for ? 
            
          </p>
        </div>
      </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="main-content common-padding clearfix">
      <div class="container">
        <form class="" method="GET" action="search_controller.php?">
          <input type="hidden" name="action" value="search">
        <div class="row">
          <div class=" col-sm-2 col-xs-12 contact-content"></div>
          <div class=" col-sm-8 col-xs-12 contact-content">
            <div class="comment-form">
              <h3 class="headline">Let us know by filling up below.</h3>
                <div class="row">
                  <label>Event Type</label>
                  <div class="col-md-12 col-xs-12">
                    <?php $catcher1 = mysqli_query($con, "SELECT * from roomtype WHERE other_services = 0 "); ?>
                    <div class="form-group">
                      <select class="form-control select-amenities" name="event_name" placeholder="Select Event" required>
                        <option></option>
                        <option value="Convention">Conventions</option>
                        <option value="Seminars">Seminars</option>
                        <option value="Conferences">Conferences</option>
                        <option value="Team Building">Team Building</option>
                        <option value="Meetings">Meetings</option>
                        <option value="Bonquets">Bonquets</option>
                        <option value="Anniversaries">Anniversaries</option>
                        <option value="Birthdays">Birthdays</option>
                        <option value="Weddings">Weddings</option>
                        <option value="Baptismal">Baptismal</option>
                        <option value="Debuts">Debuts</option>
                        <option value="Reunions">Reunions</option>
                        <option value="Pictorials">Pictorials</option>
                      </select>
                    </div>
                    <div class="row">
                        <label>Amenity Type</label>
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <select class="form-control select-amenities" name="amenity_type" placeholder="Select Amenity" required>
                            <option></option>
                            <?php while($gettype = mysqli_fetch_assoc($catcher1)): ?>
                            <option value="<?php echo $gettype['typename']?>"><?php echo $gettype['typename']?></option>
                            <?php endwhile; ?>  
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label>Estimated Budget Range</label>
                      <div class="form-group">
                        <div class="col-md-6 col-xs-12">
                          <input type="text" class="form-control" id="from_budget" placeholder="from" name="from_budget">
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <input type="text" class="form-control" id="to_budget" placeholder="to" name="to_budget">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label>Number of persons</label>
                      <div class="form-group">
                        <div class="col-md-6 col-xs-12">
                          <input type="text" class="form-control" id="number_person" required placeholder="number of persons" name="number_person">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label>Checked In</label>
                      <div class="form-group">
                        <div class="col-md-8 col-xs-12">
                          <input type="text" class="form-control" id="from" required placeholder="Date" name="check_in">
                        </div>
                        <div class="col-md-4 col-xs-12">
                          <select class="form-control" name="check_in_time">
                            <option value="" disabled selected>Select Time in</option>
                            <option value="24:00">12:00 AM</option>
                            <option value="01:00">01:00 AM</option>
                            <option value="02:00">02:00 AM</option>
                            <option value="03:00">03:00 AM</option>
                            <option value="04:00">04:00 AM</option>
                            <option value="05:00">05:00 AM</option>
                            <option value="06:00">06:00 AM</option>
                            <option value="07:00">07:00 AM</option>
                            <option value="08:00">08:00 AM</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 NN</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                            <option value="17:00">05:00 PM</option>
                            <option value="18:00">06:00 PM</option>
                            <option value="19:00">07:00 PM</option>
                            <option value="20:00">08:00 PM</option>
                            <option value="21:00">09:00 PM</option>
                            <option value="22:00">10:00 PM</option>
                            <option value="23:00">11:00 PM</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label>Checked Out</label>
                      <div class="form-group">
                        <div class="col-md-8 col-xs-12">
                          <input type="text" class="form-control" id="to" required placeholder="Date" name="check_out">
                        </div>
                        <div class="col-md-4 col-xs-12">
                          <select class="form-control" name="check_out_time">
                            <option value="" disabled selected>Select Time out</option>
                            <option value="24:00">12:00 AM</option>
                            <option value="01:00">01:00 AM</option>
                            <option value="02:00">02:00 AM</option>
                            <option value="03:00">03:00 AM</option>
                            <option value="04:00">04:00 AM</option>
                            <option value="05:00">05:00 AM</option>
                            <option value="06:00">06:00 AM</option>
                            <option value="07:00">07:00 AM</option>
                            <option value="08:00">08:00 AM</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 NN</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                            <option value="17:00">05:00 PM</option>
                            <option value="18:00">06:00 PM</option>
                            <option value="19:00">07:00 PM</option>
                            <option value="20:00">08:00 PM</option>
                            <option value="21:00">09:00 PM</option>
                            <option value="22:00">10:00 PM</option>
                            <option value="23:00">11:00 PM</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="other-services" style="display: block">
              <h4 class="text-center headline" style="font-size:17px">We also have rentable materials for your events. You can check more than one.</h4>
              <h4 class="text-center headline" style="font-size:15px">You can check more than one.</h4>
                <div class="row text-center">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group"  align="center">
                        <?php $catcher=mysqli_query($con, "SELECT * FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID WHERE other_services = 1 "); ?>
                      <table>
                        <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>  
                        <tr>
                          <td>
                            <div class="checkbox">
                              <label><input type="checkbox" value="<?php echo $getf22['roomNo']?>" name="other_services[<?php echo $getf22['roomNo']?>]"><?php echo $getf22['roomName']?> </label>
                              <input type="hidden" name="price[<?php echo $getf22['roomNo']?>]" value="<?php echo $getf22['price'] ?>">
                            </div>
                          </td>
                        </tr>
                        <?php endwhile; ?>   
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row text-center">
                   <div class="col-xs-12">
                    <button type="submit" name="submit" id="submit" value="ADD" class="btn primary-btn">PROCEED </button>                    
                  </div>
                </div>
            </div>
          </div>
        </div> 
        </form>
      </div>
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
  <!-- <script src="plugins/bootstrap-datepicker-master/bootstrap-datepicker.min.js"></script> -->
  <script src="plugins/mixitup-master/jquery.mixitup.min.js"></script>
  <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="plugins/flexslider/jquery.flexslider-min.js"></script>
  <script src="plugins/countdown/jquery.syotimer.js"></script>
  <script src="plugins/dropdown/js/navbar.js"></script>
  <script src="plugins/star-Rating/js/star-rating.min.js" type="text/javascript"></script>
  <script src="js/custom.js"></script>


  <script type="text/javascript" language="javascript" src="../../../jquery/jquery-1.9.1.js"></script>
  <script type="text/javascript" language="javascript" src="../../../jquery/jquery-ui.js"></script>

  <script type="text/javascript">
    $("body").on("change",'.select-amenities', function()
    {
      if($(this).val() == 'Room')
      {
        $(".other-services").slideUp();
      }
      else
      {
        $(".other-services").slideDown();        
      }
    });
  </script>
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
</body>


<!-- Mirrored from demo.themefisher.com/iamabdus/eden/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jan 2018 05:18:16 GMT -->
</html>
