
 <?php
    
        $con=mysqli_connect("localhost", "root","water123");
        mysqli_select_db($con, "aplayadb"); 
?>


<br>
<div class="container">
<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
<form  method="post" action="processreservation.php?action=delete">
	<table id="table" class="table table-striped" cellspacing="0">


<thead>
<tr>
<td>No</td>	

<td width="90"><strong>Room List</strong></td>
<!--<td width="10"><strong>Confirmation</strong></td>-->
<td width="80"><strong>Availability</strong></td>
<td width="1330"><strong>Next Check in</strong></td>
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
<td>Room 1</td>
<td>Available in</td>
<td>Next check in</td>

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
  <a href="index.php?view=add" class="btn btn-default">New</a>
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