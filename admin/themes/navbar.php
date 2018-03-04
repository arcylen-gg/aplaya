<?php 
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$current_page = isset($uri_segments[2]) ? $uri_segments[2] : '';
?>
<div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="<?php echo ($current_page == 'index.php' ? 'active' : '') ?>"><a href="<?php echo WEB_ROOT; ?>admin/index.php" >Home</a></li>
                <li class=" <?php echo ($current_page == 'mod_room' ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_room/index.php">Amenities</a></li>
                <li class="<?php echo ($current_page == 'mod_roomtype' ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_roomtype/index.php">Amenities Types</a></li>
                <!-- <li class="<?php echo (currentpage() == 'booking') ? "active" : false;?>"><a href="<?php echo WEB_ROOT; ?>booking/index.php">Book</a></li> -->
                <li class="<?php echo ($current_page == 'mod_reservation' || $current_page == 'mod_room_slot'  ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_reservation/index.php">Reservation</a></li>
                <li class="<?php echo ($current_page == 'mod_gallery' ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_gallery/index.php">Gallery</a></li>
                
                <li class="<?php echo ($current_page == 'mod_comments' ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_comments/index.php">Inquiries</a></li> 
                <li class="<?php echo ($current_page == 'mod_reports' ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_reports/index.php">Reports</a></li>
                <?php if($_SESSION['admin_ACCOUNT_TYPE']=="Administrator"){ ?>
                 <li class="<?php echo ($current_page == 'mod_users' ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_users/index.php" >Users</a></li>
                 <li class="<?php echo ($current_page == 'mod_settings' ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_settings/index.php" >Settings</a></li>
                <?php } ?>
                <li class="<?php echo ($current_page == 'mod_faqs' ? 'active' : '')?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_faqs/index.php" >FAQs</a></li>
                <?php  ?>
                <li class="<?php echo ($current_page == 'logout.php' ? 'active' : '')?>"><a class="toggle-modal" href="#logout">Logout</a></li>
              </ul>
       
            </div><!-- /.nav-collapse -->