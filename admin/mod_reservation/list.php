
 <?php
    
        $con=mysqli_connect("localhost", "root","");
        mysqli_select_db($con, "aplayadb"); 
?>


<br>
<div class="container">
<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
<form  method="post" action="processreservation.php?action=delete">
	<table id="table" class="table table-striped" cellspacing="0">

<div class="row">
  	<div class="col-md-3 col-xs-6">
	    <?php $catcher1 = mysqli_query($con, "SELECT * from roomtype "); ?>
		<div class="form-group">
		<select class="form-control select-amenities-type" name="amenity_type" required>
		    <option>Choose Type</option>
		    <?php while($gettype = mysqli_fetch_assoc($catcher1)): ?>
		    <option <?php echo (isset($_GET['type']) ? ($_GET['type'] == $gettype['typename'] ? 'selected' : '') : '')?>  value="<?php echo $gettype['typename']?>"><?php echo $gettype['typename']?></option>
		    <?php endwhile; ?>  
		</select>
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group">
		<select class="form-control select-reservation" name="reservation_status" required>
		    <option>Choose Status</option>
		    <option <?php echo (isset($_GET['status']) ? ($_GET['status'] == 'Checkedin' ? 'selected' : '') : '')?> value="Checkedin">Checkedin</option>
		    <option <?php echo (isset($_GET['status']) ? ($_GET['status'] == 'Checkedout' ? 'selected' : '') : '')?> value="Checkedout">Checkedout</option>
		    <option <?php echo (isset($_GET['status']) ? ($_GET['status'] == 'Pending' ? 'selected' : '') : '')?> value="Pending">Pending</option>
		    <option <?php echo (isset($_GET['status']) ? ($_GET['status'] == 'Cancelled' ? 'selected' : '') : '')?> value="Cancelled">Cancelled</option>
		</select>
		</div>
	</div>

	<div class="col-md-3 col-xs-6">
		<div class="form-group">
			<button onclick="filter_reservation()" type="button" class="btn btn-primary">Filter</button>
		</div>
	</div>
	<div class="col-md-3 col-xs-6">
		<div class="form-group" align="right">
			<a href="admin/mod_room_slot" class="btn btn-primary">View Room Slot</a>
		</div>
	</div>
</div>

<thead>
<tr>
<td>No</td>	

<td width="90"><strong>Name</strong></td>
<!--<td width="10"><strong>Confirmation</strong></td>-->
<td width="80"><strong>Confirmation</strong></td>
<td width="80"><strong>Arrival</strong></td>
<td width="70"><strong>Departure</strong></td>
<td width="80"><strong>Type</strong></td>
<td width="80"><strong>Nights</strong></td>
<td width="80"><strong>Status</strong></td>
<td width="100"><strong>Action</strong></td>
</tr>
</thead>
<tbody>



<?php
//$mydb->setQuery("SELECT *,roomName,firstname, lastname FROM reservation re,room ro,guest gu  WHERE re.roomNo = ro.roomNo AND re.guest_id=gu.guest_id");

$sql_query = "SELECT * FROM reservation LEFT JOIN room ON reservation.roomNo = room.roomNo
LEFT JOIN guest ON reservation.guest_id = guest.guest_id
LEFT JOIN roomtype ON room.typeID = roomtype.typeID";

// $sql_query = "SELECT * , roomName, firstname, lastname
// FROM reservation re, room ro, guest gu, roomtype rt
// WHERE re.roomNo = ro.roomNo
// AND ro.typeID = rt.typeID 
// AND re.guest_id = gu.guest_id";
if(isset($_GET['type']) && isset($_GET['status']))
{
	$sql_query .= " WHERE typename = '".$_GET['type']."' AND status = '".$_GET['status']."'";
}
$sql_query .= " GROUP BY reservation_id ORDER BY status='pending'";

$mydb->setQuery($sql_query);
$cur = $mydb->loadResultList();
//die(var_dump($cur));
		

foreach ($cur as $result) {
?>
<tr>
<td width="5%" align="center"></td>
<td><?php echo $result->firstname." ".$result->lastname; ?></td>
<td><?php echo $result->confirmation; ?></td>
<td><?php echo $result->arrival; ?></td>
<td><?php echo $result->departure; ?></td>
<!--<td><?php echo $result->roomName; ?></td>-->
<td><?php echo $result->typename; ?></td>
<td><?php echo dateDiff($result->arrival,$result->departure); ?></td>
<td><?php echo $result->status; ?></td> 
<!--<td><a class="btn btn-default toggle-modal-reserve" href="#reservationr<?php echo $result->reservation_id; ?>" role="button" >View</a></td>-->
<td >
	<?php 
		if($result->status == 'Confirmed'){ ?>
		<!-- <a class="cls_btn" id="<?php echo $result->reservation_id; ?>" data-toggle='modal' href="#profile" title="Click here to Change Image." ><i class="icon-edit">test</a> -->
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
            <a href="controller.php?action=checkin&id=<?php echo $result->reservation_id; ?>" class="btn btn-success btn-xs" ><i class="icon-edit">Check in</a>
			<a href="controller.php?action=cancel&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">Void</a>
		<?php
		}elseif($result->status == 'Checkedin'){
	?>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=checkout&id=<?php echo $result->reservation_id; ?>" class="btn btn-danger btn-xs" ><i class="icon-edit">Check out</a>
	        <a href="controller.php?action=cancel&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">Void</a>
        
    <?php
		}else{
			?>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-success btn-xs" disabled="disabled"><i class="icon-edit">Check in</a>
	        <a href="controller.php?action=cancel&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">Void</a>
        
    <?php
		}

	?>
	
	
</td>

<?php }
?>
		<div class="modal fade" id="profile" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="alert alert-info">Profile:</div>
					</div>
					<form action="#"  method=
					"post">
						<div class="modal-body">			
							<div id="display">
								<p>ID : <div id="infoid"></div></p><br/>
									Name : <div id="infoname"></div><br/>
									Email Address : <div id="Email"></div><br/>
									Gender : <div id="Gender"></div><br/>
									Birthday : <div id="bday"></div>
								</p>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type=
							"button">Close</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
</table>
<div class="btn-group">
  <a href="index.php?view=add" class="btn btn-default">Walk in</a>
  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
</div>
</form>
</table>

</form>
<!-- </div> -->
</div>
<script type="text/javascript">
	function filter_reservation() 
	{
		var amenity_type = $(".select-amenities-type").val();
		var status = $(".select-reservation").val();
		location.href = "/admin/mod_reservation/index.php?type="+amenity_type+"&status="+status;
	}
</script>