<?php
$con=mysqli_connect("localhost", "root","water123");
mysqli_select_db($con, "aplayadb");
?>
<!--End of Header-->
<div class="container">
  <div class="col-xs-12 col-sm-12">
    <!--<div class="jumbotron">-->
    <div class="">
      <!--    <div class="panel panel-default">
        <div class="panel-body">   -->
          <p class="bg-warning">
            
            <!-- <?php
            echo '<div class="alert alert-info" ><strong>From:'.$arrival. ' To: ' .$departure.'</strong>  </div>';
          ?> --></p>
          <legend><h2 class="text-left">Check In</h2></legend>
          
          <form class="" method="GET" action="controller.php">
            <div class="main-content common-padding clearfix">
              <div class="container">
                <div class="col-xs-12 col-sm-12" role="navigation">
                  <div class="panel panel-inverse">
                    <div class="row">
                      <input type="hidden" name="action" value="add">
                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "name">Firstname:</label>
                            <div class="col-md-8">
                              <input name="" type="hidden" value="">
                              <input name="fname" type="text" class="form-control input-sm" id="name" required="required" placeholder="First Name"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "last">Lastname:</label>
                            <div class="col-md-8">
                              <input name="lname" type="text" class="form-control input-sm" id="last" required="required" placeholder="Last Name"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "address">Address:</label>
                            <div class="col-md-8">
                              <input name="address" type="text" class="form-control input-sm" id="address" required="required" placeholder="Address"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "phone">Phone:</label>
                            <div class="col-md-8">
                              <input name="phone" type="number" class="form-control input-sm" id="phone" required="required" placeholder="Phone #"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        
                        
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "email">Email Address:</label>
                            <div class="col-md-8">
                              <input name="email" type="text" class="form-control input-sm" id="email" required="required" placeholder="Valid Email Address"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "password">Password:</label>
                            <div class="col-md-8">
                              <input name="password" type="password" class="form-control input-sm" id="password" required="required" value="123456" placeholder="Password"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "password">Status:</label>
                            <div class="col-md-8">
                              <select name="status" class="input-sm form-control">
                                <option value="Checkedin">Check In</option>
                                <option value="Reserved">Reserved</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "password">Pax:</label>
                            <div class="col-md-8">
                              <input type="number" class="input-sm form-control" name="adults" value="1">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                      <!-- <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "password">Child:</label>
                            <div class="col-md-8">
                              <input type="number" class="input-sm form-control" name="child" value="1">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br> -->

                      <div>
                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label">Check In:</label>
                            <div class="col-md-6">
                              <input class="input-sm form-control" name="from" id="from" placeholder="date">
                            </div>
                            <div class="col-md-2">
                              <input type="text" class="input-sm form-control" name="time_in" id="time_in" placeholder="time">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div>
                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label">Check Out:</label>
                            <div class="col-md-6">
                              <input class="input-sm form-control" name="to" id="to" placeholder="date">
                            </div>
                            <div class="col-md-2">
                              <input type="text" class="input-sm form-control" name="time_out" id="time_out" placeholder="time">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>


                      <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12">
                          <div class="form-group">
                              <div class="col-md-4">
                                <label class="control-label" for="from">Check In</label>
                                <input class="form-control" size="11"
                                value=""  name="from" id="from">
                              </div>
                              <div class="col-md-2">
                                <label class="control-label" for="from">Check In</label>
                                <input class="form-control" size="11"
                                value=""  name="from" id="from">
                              </div>
                              <div class="col-md-4">
                                <label class="control-label" for="to">Check Out</label>
                                <input class="form-control" size="11" type="text" name="to" id="to">
                              </div>
                              <div class="col-md-2">
                                <label class="control-label" for="to">Check Out</label>
                                <input class="form-control" size="11" type="text" name="to" id="to">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br> -->
                      <div class=" col-sm-2 col-xs-12 contact-content"></div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-3" role="navigation">
                  <div class="panel panel-inverse">
                    <div class="row">
                      <div class=" col-sm-2 col-xs-12 contact-content"></div>
                      <div class=" col-sm-8 col-xs-12 contact-content">
                        <div class="comment-form">
                          <div class="row text-center">
                            <h3 class="headline">Rooms</h3>
                            <div class="col-md-12 col-xs-12">
                              <div class="form-group"  align="center">
                                <?php $catcher=mysqli_query($con, "SELECT * FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID WHERE roomtype.typeName = 'Room' "); ?>
                                <table>
                                  <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                                  <tr>
                                    <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" value="<?php echo $getf22['roomNo']?>" name="reserved[<?php echo $getf22['roomNo']?>]"><?php echo $getf22['roomName']?> </label>
                                        <input type="hidden" name="reserved_price[<?php echo $getf22['roomNo']?>]" value="<?php echo $getf22['price'] ?>">
                                      </div>
                                    </td>
                                  </tr>
                                  <?php endwhile; ?>
                                </table>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="col-xs-12 col-sm-3" role="navigation">
                  <div class="panel panel-inverse">
                    <div class="row">
                      <div class=" col-sm-2 col-xs-12 contact-content"></div>
                      <div class=" col-sm-8 col-xs-12 contact-content">
                        <div class="comment-form">
                          <div class="row text-center">
                            <h3 class="headline">Pavilion</h3>
                            <div class="col-md-12 col-xs-12">
                              <div class="form-group"  align="center">
                                <?php $catcher=mysqli_query($con, "SELECT *, typeName FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID WHERE roomtype.typeName IN ('Pavilion', 'Pavilion with Pool')");
                                ?>
                                <table>
                                  <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                                  <tr>
                                    <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" value="<?php echo $getf22['roomNo']?>" name="reserved[<?php echo $getf22['roomNo']?>]"><?php echo $getf22['roomName']?> </label>
                                        <input type="hidden" name="reserved_price[<?php echo $getf22['roomNo']?>]" value="<?php echo $getf22['price'] ?>">
                                      </div>
                                    </td>
                                  </tr>
                                  <?php endwhile; ?>
                                </table>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-3" role="navigation">
                  <div class="panel panel-inverse">
                    <div class="row">
                      <div class=" col-sm-2 col-xs-12 contact-content"></div>
                      <div class=" col-sm-8 col-xs-12 contact-content">
                        <div class="comment-form">
                          <div class="row text-center">
                            <h3 class="headline">Pool</h3>
                            <div class="col-md-12 col-xs-12">
                              <div class="form-group"  align="center">
                                <?php $catcher=mysqli_query($con, "SELECT *, typeName FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID WHERE roomtype.typeName ='Pool'");
                                ?>
                                <table>
                                  <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                                  <tr>
                                    <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" value="<?php echo $getf22['roomNo']?>" name="reserved[<?php echo $getf22['roomNo']?>]"><?php echo $getf22['roomName']?> </label>
                                        <input type="hidden" name="reserved_price[<?php echo $getf22['roomNo']?>]" value="<?php echo $getf22['price'] ?>">
                                      </div>
                                    </td>
                                  </tr>
                                  <?php endwhile; ?>
                                </table>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-3" role="navigation">
                  <div class="panel panel-inverse">
                    <div class="row">
                      <div class=" col-sm-2 col-xs-12 contact-content"></div>
                      <div class=" col-sm-8 col-xs-12 contact-content">
                        <div class="comment-form">
                          <div class="row text-center">
                            <h3 class="headline">Other Services</h3>
                            <div class="col-md-12 col-xs-12">
                              <div class="form-group"  align="center">
                                <?php $catcher=mysqli_query($con, "SELECT * FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID WHERE other_services = 1 "); ?>
                                <table>
                                  <?php while($getf22=mysqli_fetch_assoc($catcher)): ?>
                                  <tr>
                                    <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" value="<?php echo $getf22['roomNo']?>" name="reserved[<?php echo $getf22['roomNo']?>]"><?php echo $getf22['roomName']?> </label>
                                        <input type="hidden" name="reserved_price[<?php echo $getf22['roomNo']?>]" value="<?php echo $getf22['price'] ?>">
                                      </div>
                                    </td>
                                  </tr>
                                  <?php endwhile; ?>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row text-center">
                <div class="col-xs-12">
                  <button type="submit" name="submit" id="submit" value="ADD" class="btn primary-btn">PROCEED </button>
                </div>
              </div>
              <!--/span-->
              <!--Sidebar-->
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/row-->
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