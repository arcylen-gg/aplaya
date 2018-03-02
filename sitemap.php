<!--End of Header-->
<div class="container">
  <?php include'sidebar.php';?>
  <div class="col-xs-12 col-sm-9">
    <!--<div class="jumbotron">-->
    <div class="">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-right"><button onclick="clear_reservation(<?php echo $_SESSION['guest_id']; ?>)" class="btn btn-primary">Clear Reservation List</button></div>
          <fieldset>
            <legend><h2 class="text-left">My Reservations</h2></legend>
            <table class="table table-condensed" border="0" style="width:95%">
              <tr>
                <th class="text-center" scope="col" bgcolor="9eb2bb">Reservation ID </th>
                <th class="text-center" scope="col" bgcolor="9eb2bb">Amenities</th>
                <th class="text-center" scope="col" bgcolor="9eb2bb">Arrival Date</th>
                <th class="text-center" scope="col" bgcolor="9eb2bb">Departure Date</th>
                <th class="text-center hidden" scope="col" bgcolor="9eb2bb">Adult/s</th>
                <th class="text-center hidden" scope="col" bgcolor="9eb2bb">Child</th>
                <th class="text-center" scope="col" bgcolor="9eb2bb">Amount</th>
                <th class="text-center" scope="col" bgcolor="9eb2bb">Reservation Status</th>
                <th class="text-center" scope="col" bgcolor="9eb2bb">Reservation Code</th>
                <th class="text-center" scope="col" bgcolor="9eb2bb"></th>
                <th class="text-center" scope="col" bgcolor="9eb2bb"></th>
                
              </tr>
              
              <?php
              $iden = $_SESSION['guest_id'];
              $catcher=mysqli_query($con, "SELECT * FROM reservation LEFT JOIN room ON room.roomNo = reservation.roomNo where guest_id = '$iden' and archived = 0");
              while($get=mysqli_fetch_assoc($catcher)):
              ?>
              
              <tr>
                <td class="text-center"><?php echo $get['reservation_id']?>   </td>
                <td class="text-center"><?php echo $get['roomName']?>   </td>
                <td><?php echo date('m/d/Y',strtotime($get['arrival']))?> </td>
                <td><?php echo date('m/d/Y',strtotime($get['departure']))?></td>
                <td class="text-center hidden"><?php echo $get['adults']?>   </td>
                <td class="text-center hidden"><?php echo $get['child']?></td>
                <td>&#8369;<?php echo number_format($get['payable'])?>  </td>
                <td><?php echo $get['status']?> </td>
                <td><?php echo $get['confirmation']?>  </td>
                <td>
                  <?php
                  if(strtotime(date('m/d/y')) < strtotime($get['arrival'] .' - 3 days') && $get['status'] == 'pending')
                  {
                  echo '<button class="btn btn-default input-sm" onclick="reschedule_reservation('.$get['reservation_id'].')">Reschedule</button> ';
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if(strtotime(date('m/d/y')) < strtotime($get['arrival'] .' - 3 days') && $get['status'] == 'pending' )
                  {
                  echo '<button class="btn btn-default input-sm" onclick="cancel_reservation('.$get['reservation_id'].')">Cancel</button>';
                  }
                  elseif($get['status'] == 'Cancelled')
                  {
                  echo $get['reason'];
                  }
                  ?>
                </td>
                
                <?php endwhile; ?>
              </tr>
              
            </table>
            
            
            
          </div>
        </div>
        
      </div>
      <!--  </div>-->
    </div>
    <!--/span-->
    <!--Sidebar-->
    <div class="modal fade" id="reschedule_reservation" tabindex="-1" role="dialog" aria-labelledby="modal_share">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="booking/cancel_reservation.php" method="get">
            <input type="hidden" name="action" value="reschedule">
            <input type="hidden" name="reservation_id" class="reservation-id">
            <div class="modal-header">
              Reschedule Reservation
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Check In</label>
                <input class="form-control" size="11"
                value="<?php echo (isset($_SESSION['from'])) ? $_SESSION['from'] : ''; ?>" required name="arrival" id="from_1">
              </div>
              <div class="form-group">
                <label>Check Out</label>
                <input class="form-control" required size="11" type="text" value="<?php echo (isset($_SESSION['to'])) ? $_SESSION['to'] : ''; ?>"  name="departure" id="to_1">
              </div>
              <div class="form-group">
                <label>Reason</label>
                <textarea name="reason" class="form-control"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-defualt" data-dismiss="modal">Cancel</button>
              <button class="btn btn-success" type="submit" data-url="">Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/row-->
    <script type="text/javascript">
    function clear_reservation(guest_id)
    {
      var check = confirm("Are you sure you want to clear reservation list?");
      if(check)
      {
        location.href = "booking/cancel_reservation.php?action=clear&guest_id="+guest_id;
      }
    }
    function cancel_reservation(reservation_id)
    {
      var txt;
      var r = prompt("Are you sure you wan't to cancel your reservation? Please state your reason.");
      if (r)
      {
        location.href = "booking/cancel_reservation.php?action=cancel&id="+reservation_id+"&reason="+r;
      }
    }
    function reschedule_reservation(reservation_id)
    {
      $(".reservation-id").val(reservation_id);
      $("#reschedule_reservation").modal("show");
    }
    </script>
    <script type="text/javascript">
    var dateToday = new Date();
    var dates = $("#from_1, #to_1").datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
    var option = this.id == "from_1" ? "minDate" : "maxDate",
    instance = $(this).data("datepicker"),
    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
    dates.not(this).datepicker("option", option, date);
    }
    });
    </script>