
 <?php
    
        $con=mysqli_connect("localhost", "root","water123");
        mysqli_select_db($con, "aplayadb");  
?>


<br>
<?php
		check_message();
			
		?>
<div class="container">
<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
	<table id="example" class="table table-striped" cellspacing="0" width="100%">

<thead>
<tr>
<td>No</td>	

<td width="90"><strong>Room List</strong></td>
<!--<td width="10"><strong>Confirmation</strong></td>-->
<td width="80"><strong>Availability</strong></td>
<td width="100"><strong>Next Check in</strong></td>
<td width="80"><strong>Action</strong></td>
</tr>
</thead>
<tbody>



<?php
//$mydb->setQuery("SELECT *,roomName,firstname, lastname FROM reservation re,room ro,guest gu  WHERE re.roomNo = ro.roomNo AND re.guest_id=gu.guest_id");

$sql_query = "SELECT * FROM reservation LEFT JOIN room ON reservation.roomNo = room.roomNo
LEFT JOIN guest ON reservation.guest_id = guest.guest_id
LEFT JOIN roomtype ON room.typeID = roomtype.typeID";
$sql_query = "SELECT * FROM room";

// $sql_query = "SELECT * , roomName, firstname, lastname
// FROM reservation re, room ro, guest gu, roomtype rt
// WHERE re.roomNo = ro.roomNo
// AND ro.typeID = rt.typeID 
// AND re.guest_id = gu.guest_id";
$mydb->setQuery($sql_query);

$cur = $mydb->loadResultList();
foreach ($cur as $result) 
{
?>
<tr>
<td width="5%" align="center"></td>
<td class="" width="20%"><?php echo $result->roomName; ?></td>
<td class="" width="20%">
<?php
$mydb->setQuery("SELECT * FROM reservation WHERE roomNo =".$result->roomNo ." AND status='Checkedin' ORDER BY reservation_id DESC LIMIT 1");

$stats = $mydb->executeQuery();
$rows = mysqli_fetch_assoc($stats);
if($rows)
{
	$status = $rows['status'];

	$dep = $rows['departure']." ". $rows["time_out"];
	// die(var_dump(strtotime($dep)));
	echo nicetime($dep);
}
else
{
	echo "Vacant";
}

 ?>
</td>
<td class="" width="20%">
	
<?php
$mydb->setQuery("SELECT * FROM reservation WHERE roomNo =".$result->roomNo ." AND status='pending' ORDER BY reservation_id ASC LIMIT 1");

$statspending = $mydb->executeQuery();
$rowspending = mysqli_fetch_assoc($statspending);
// echo "<pre>";
// die(var_dump($rowspending));
if($rowspending)
{
	$arr = $rowspending['arrival']." ". $rowspending["time_in"];
	echo nicetime($arr);
}
else
{
	echo "none";
}
 ?>

</td>
<td class="" width="20%">
	<?php if($rows)
	{ ?>
	<button class="btn btn-warning"  onclick="extend_reservation(<?php echo $rows['reservation_id']; ?>)">Extend</button>
	<?php }  ?>
</td>

<?php }

function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();

    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++)
    {
        $difference /= $lengths[$j];
    }
    // die(var_dump($difference));
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}
?>
	
</table>
</form>
<!-- </div> -->
<div class="modal fade" id="extend-reservation" tabindex="-1" role="dialog" aria-labelledby="modal_share">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="controller.php" method="get">
        <input type="hidden" name="action" value="extend">
        <input type="hidden" name="reservation_id" class="reservation-id">
        <div class="modal-header">
          Extend Reservation
        </div>
        <div class="modal-body">
          
          <div class="form-group">
          	<label>Check Out Date</label>
                <input class="form-control" size="11" value="" required name="checkoutdate" id="to_1">
          </div>
          <div class="form-group">
          	<label>Check Out Time</label>
                <select class="form-control" required name="checkouttime">
	                <option value="" disabled selected>Select Time out</option>
	                <option value="00:00:00">12:00 AM</option>
	                <option value="01:00:00">01:00 AM</option>
	                <option value="02:00:00">02:00 AM</option>
	                <option value="03:00:00">03:00 AM</option>
	                <option value="04:00:00">04:00 AM</option>
	                <option value="05:00:00">05:00 AM</option>
	                <option value="06:00:00">06:00 AM</option>
	                <option value="07:00:00">07:00 AM</option>
	                <option value="08:00:00">08:00 AM</option>
	                <option value="09:00:00">09:00 AM</option>
	                <option value="10:00:00">10:00 AM</option>
	                <option value="11:00:00">11:00 AM</option>
	                <option value="12:00:00">12:00 NN</option>
	                <option value="13:00:00">01:00 PM</option>
	                <option value="14:00:00">02:00 PM</option>
	                <option value="15:00:00">03:00 PM</option>
	                <option value="16:00:00">04:00 PM</option>
	                <option value="17:00:00">05:00 PM</option>
	                <option value="18:00:00">06:00 PM</option>
	                <option value="19:00:00">07:00 PM</option>
	                <option value="20:00:00">08:00 PM</option>
	                <option value="21:00:00">09:00 PM</option>
	                <option value="22:00:00">10:00 PM</option>
	                <option value="23:00:00">11:00 PM</option>
	            </select>
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
</div>
<script type="text/javascript">
	function extend_reservation(reservation_id)
	{
	    $(".reservation-id").val(reservation_id);
	    $("#extend-reservation").modal("show");
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