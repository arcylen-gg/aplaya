
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
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
</head>
<body>

</body>
</html>


  <!-- NAVBAR -->
      <nav class="navbar navbar-main navbar-default clearfix">
        <div class="container">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo" href="elmarfin/iamabdus/eden/index.php">
            <img src="images/logo.png" alt="Logo">
          </a>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="elmarfin/iamabdus/eden/index.php">Home</a></li>
              <li class="dropdown">
                <a href="elmarfin/iamabdus/eden/about.php">About Us</a>
                <ul class="dropdown-menu">
                </ul>
              </li>
              <li class="dropdown">
                <!-- <a href="../../../../index.php?page=5">Amenities/Event Booking</a> -->
                
                <!-- <a href="../../../../index.php?page=5">Amenities/Event Booking</a> -->
               <!--  <ul class="dropdown-menu">
                  <li>dffdf</li>
                  <li>dffdf</li>
                </ul> -->
                <a href="#">Amenities/Event Booking</button>
                  <div class="dropdown-content">
                    <a href="../../../../view_rooms.php">Room</a>
                    <a href="../../../../view_pavilion.php">Pavilion</a>
                    <a href="../../../../view_pool.php">Pool</a>
                    <a href="elmarfin/iamabdus/eden/search.php">Other Services</a>
                    <a href="/booking">Booking</a>
                  </div>
              </li>
              <li class="dropdown">
                <a href="elmarfin/iamabdus/eden/gallery-4col.php">Gallery</a>
              </li>
              <li class="dropdown">
                <a href="elmarfin/iamabdus/eden/contact.php">Contact Us</a>
              </li>
              <li class="dropdown">
                <a href="elmarfin/iamabdus/eden/faqs.php">FAQs</a>
              </li>

              <!-- <li class="book-online">
                <a class="btn primary-btn" href="../../../../aplaya/index.php?page=5">
                  <span class="icomoon-booking"></span>Reserve Online
                </a>
              </li> -->
             
            </ul>
          </div>
        </div>
      </nav>

    </div>