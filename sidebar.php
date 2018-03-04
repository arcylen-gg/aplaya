<?php     
    $con=mysqli_connect("localhost", "root","");
    mysqli_select_db($con, "aplayadb"); 
?>

<?php
if(isset($_POST['login'])){
	$email = $_POST['log_email'];
	$pass  = $_POST['log_pword'];
	
	 if ($email == '' OR $pass == '') {

         	message("Invalid Username and Password!", "error");
			redirect("../../../../index.php?page=5");
         
    } else {
	$guest = new Guest();
	$res = $guest->guest_login($email, $pass);
		if($res == true){
			redirect("../../../../index.php?page=7");
		}else{

			message("Username or Password Not Registered! Contact Your administrator.","error");
			redirect("../../../../index.php?page=5");
		}
	}

}  
?>   
 

<!--Side bar-->
<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="sidebar-nav">
		   <div class="panel panel-inverse">
		

			 <div class="panel-heading">Book a Room</div>
			  <div class="panel-body">	
						   <form  method="POST" action="#.php">
								<div class="col-xs-12 col-sm-12">

					            	<div class="form-group">
					            		<div class="row">
					            			<div class="col-xs-12 col-sm-12">
					            				<label class="control-label" for="from">Check In</label>
						     
							                    <input class="form-control" size="11" 
							                    value="<?php echo (isset($_SESSION['from'])) ? $_SESSION['from'] : ''; ?>" 
							                     value=""  name="from" id="from">
							                   
						              		</div>
						            	</div>
						            </div>
						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
					            				<label class="control-label" for="to">Check Out</label>
						              			
								                    <input class="form-control" size="11" type="text" value="<?php echo (isset($_SESSION['to'])) ? $_SESSION['to'] : ''; ?>"  name="to" id="to">
								                   
						              		</div>
						            	</div>
						            </div>

						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						           				 <a href="elmarfin/iamabdus/eden/search.php" class="btn btn-inverse" align="center"name="avail">Check Availability</a>
						           			 </div>
						            	</div>
						            </div>
						        </div>
					        </form>
						</div>
				
			</div>
			
				<div class="panel panel-inverse">
					
					<?php if(!isset($_SESSION['guest_id'])){

				echo ' <div class="panel-heading">Login </div>
					   <div class="panel-body">	
						   <form  method="POST" action="#.php">
								<div class="col-xs-12 col-sm-12">

					            	<div class="form-group">
					            		<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						              			<input type="email" placeholder="Email" class="form-control" name="log_email">
						              		</div>
						            	</div>
						            </div>
						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						              			<input type="password" placeholder="Password" class="form-control" name="log_pword">
						              		</div>
						            	</div>
						            </div>

						            <div class="form-group">
						            	<div class="row">
					            			<div class="col-xs-12 col-sm-12">
						           				 <button type="submit" class="btn btn-inverse" align="right" name="login">Sign in</button>
						           			 </div>
						            	</div>
						            </div>
						        </div>
					        </form>
					       
						</div>';
					}else{
						   
                         ?> 
                         
                         <?php 
                         
                         $iden = $_SESSION['guest_id'];
                         
                            $catcher=mysqli_query($con, "SELECT * FROM guest where guest_id = '$iden'");
                            $get = mysqli_fetch_assoc($catcher);
                        ?>
                         <form method="POST" action="update_guest.php">
                    <div class="panel-heading">Guest Information</div>
                    
                   <center> <a href="index.php?page=7" class="btn btn-primary">View my Reservation/s</a>   </center>
                            <div class="panel-body">    
                                <div class="col-xs-12 col-sm-12">
                                     <span class="glyphicon glyphicon-user"> </span> Your Details:<br/> <p><b><br> First Name : <br><input type="text" id= "fname" name="fname" value="<?php echo $get['firstname']?>" required> <br> Last Name : <input type="text" id="lname" name="lname" value="<?php echo $get['lastname']?>" required></b><br/>
                                     <span class="glyphicon glyphicon-cog"> </span> Email:<br/> <b><input type="text" id= "email" name="email" value="<?php echo $get['email']?>" required></b><br/>
                                              <span class="glyphicon glyphicon-cog"> </span> 
                                              Phone Number:<br/><b> 
                                              <input type="number" id= "phone" name="phone" value="<?php echo $get['phone']?>" required></b>
                                              Old Password:<br/><b> 
                                              <input type="password" id= "oldpass" name="oldpass" value="" placeholder="Enter Old Password" required></b>
                                              New Password:<br/><b> 
                                              <input type="password" id= "newpass1" name="newpass1" value="" placeholder="Enter New Password" required></b>
                                              Confirm New Password:<br/><b> 
                                              <input type="password" id= "newpass2" name="newpass2" value="" placeholder="Confirm New Password" required></b>
                                             
                                             <input type="hidden" id= "guest" name="guest" value="<?php echo $_SESSION['guest_id'];?>">
                                        <input type="submit" name="submit" id="submit" value="Update My Profile" class="btn btn-default"/> 
                                            <br /> 
                                              </form>                               
                                          <br /><a href="logout.php" class="btn btn-default">Logout <span class="glyphicon glyphicon-log-out"></span></a>     
                                    
                                            
                                    </div>    
                                                                                                     
                                </div>
                                  
                         
                      <?php
                    }
                        ?>
				</div>
				
				 <form name="clock">
			                  
					  <input  class="form-control" id="trans" type="label"  name="face" value="">
				</form>
						

		    <hr>
			

	

		
	</div>
			<!--/.well --> 
		</div>
		<!--/span-->
		<!--End of Side bar-->


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