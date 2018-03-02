 <!-- PRE FOOTER -->
    <div class="pre-footer common-padding clearfix">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <h3 class="headline">About</h3>
            <p>
                <!-- El Marfin is the ideal venue to host a variety of activities and occasions. Inspired with simple yet modernized event hall, reception area, swimming pool and bedroom that will fit for any momentous event.-->
                  <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'About Our Hotel Write Ups' "); ?>
                   <?php while($getf1=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf1['DESCRIPTION']?>
                   <?php endwhile; ?>
            </p>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 address">
            <h3 class="headline">Address</h3>
          
            <address>
            <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Address' "); ?>
                   <?php while($getf2=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf2['DESCRIPTION']?>
                   <?php endwhile; ?>
            </address>
            <span>Phone: <span>
               <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #1' "); ?>
                   <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf22['DESCRIPTION']?>
                   <?php endwhile; ?> 
                        or
               <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Phone #2' "); ?>
                   <?php while($getf222=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf222['DESCRIPTION']?>
                   <?php endwhile; ?> 
            </span> </span>
            <span>E-mail:<a href="mailto:email@domain.com">
            
             <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Email' "); ?>
                   <?php while($getf22222=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf22222['DESCRIPTION']?>
                   <?php endwhile; ?> 
            
            </a></span>
            <a class="footer-map" href="contact.php"><img src="images/map.png" alt="map"/></a>
          </div>

          
          <div class="col-md-2 col-sm-4 col-xs-12 photos">
            <h3 class="headline">Photos</h3>
            <ul class="bxslider" id="footerSlider"> 
              <?php $catcher=mysqli_query($con, "SELECT * FROM room WHERE gallery_img = '1' "); ?>
              <?php while($get=mysqli_fetch_assoc($catcher)): ?>
                <li><a href="gallery-3col.html"><img src=" ../../../admin/mod_gallery/<?php echo $get['roomImage']?>" alt="image" /></a></li>    
              <?php endwhile; ?>        
             
            
            </ul>
          </div> 

          <div class="col-md-4 col-sm-8 col-xs-12 offers">
            <h3 class="headline">EVENTS INQUIRY</h3>
            <!-- <figure class="ed-room">
              <img src="images/footer/sample-rm1.jpg" alt="image" class="img-responsive">
              <figcaption>
                <p><span></span>
                <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Footer Event 1' "); ?>
                   <?php while($getf31=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf31['DESCRIPTION']?>
                   <?php endwhile; ?> 
                </p>
                <p><span></span>
                <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Footer Event 2' "); ?>
                   <?php while($getf32=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf32['DESCRIPTION']?>
                   <?php endwhile; ?> 
                </p>
                <p><span></span>
                <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Footer Event 3' "); ?>
                   <?php while($getf33=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf33['DESCRIPTION']?>
                   <?php endwhile; ?> 
                </p>
                <a href="#" class="btn primary-btn">Inquire.</a>
              </figcaption>
              <div class="corner-ribbon"><span>Events!</span></div>     
            </figure> -->

            <figure class="ed-room ed-room-highlight">
              <img src="images/footer/sample-rm2.jpg" alt="image" class="img-responsive">
              <figcaption>
                 <p><span></span>
                <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Footer Offer 1' "); ?>
                   <?php while($getf34=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf34['DESCRIPTION']?>
                   <?php endwhile; ?> 
                </p>
                <p><span></span>
                <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Footer Offer 2' "); ?>
                   <?php while($getf35=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf35['DESCRIPTION']?>
                   <?php endwhile; ?> 
                </p>
                                 <p><span></span>
                <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Footer Offer 3' "); ?>
                   <?php while($getf36=mysqli_fetch_assoc($catcher)): ?>
                      <?php echo $getf36['DESCRIPTION']?>
                   <?php endwhile; ?> 
                </p>
                <a href="search.php" class="btn primary-btn secondary-btn">Inquire</a>
              </figcaption>
              <div class="corner-ribbon"><span>Offers</span></div>     
            </figure>
          </div>
        </div>
      </div> 
    </div>

    <!-- FOOTER -->
    <footer class="clearfix">
      <div class="container">
        <div class="row">
          
          <div class="col-md-7 col-xs-12 social-icon pull-right">
            <ul>
              <li>
   
              <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Facebook Link' "); ?>
              <?php while($getf21=mysqli_fetch_assoc($catcher)): ?>
                     
                  <a href=" <?php echo $getf21['DESCRIPTION']?>"><i class="fa fa-facebook"></i>
                  </a></li>
              <?php endwhile; ?>
              
              <li>
              <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Google Link' "); ?>
              <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                  <a href=" <?php echo $getf22['DESCRIPTION']?>"><i class="fa fa-google-plus"></i>
                  </a></li>
              </a></li>
              <?php endwhile; ?>   
              
              <li>
              <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Twitter Link' "); ?>
              <?php while($getf23=mysqli_fetch_assoc($catcher)): ?>
                  <a href=" <?php echo $getf23['DESCRIPTION']?>"><i class="fa fa-twitter"></i>
                  </a></li>
              </a></li>
              <?php endwhile; ?>   
              
                           <li>
              <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Linkedin Link' "); ?>
              <?php while($getf24=mysqli_fetch_assoc($catcher)): ?>
                  <a href=" <?php echo $getf24['DESCRIPTION']?>"><i class="fa fa-linkedin"></i>
                  </a></li>
              </a></li>
              <?php endwhile; ?>
                     <li>       
                <?php $catcher=mysqli_query($con, "SELECT * FROM tblsettings WHERE TYPE = 'Instagram Link' "); ?>
              <?php while($getf25=mysqli_fetch_assoc($catcher)): ?>
                  <a href=" <?php echo $getf25['DESCRIPTION']?>"><i class="fa-instagram"></i>
                  </a></li>
              </a></li>
              <?php endwhile; ?>   
             
            </ul>
          </div>

          <div class="col-md-5 col-xs-12 copyright pull-left">
            <p>© 2018 Copyright El Marfin Hotel </p>
          </div>

        </div>
      </div>
    </footer>