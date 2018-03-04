
 <?php
    
        $con=mysqli_connect("localhost", "root","water123");
        mysqli_select_db($con, "aplayadb"); 
?>


<br>
<div class="container">
<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
<form  method="post" action="processreservation.php?action=delete">
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
	<button class="btn btn-warning">Extend</button>
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
<div class="btn-group">
  <a href="index.php?view=add" class="btn btn-default">New</a>
  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
</div>
</form>
</table>

</form>
<!-- </div> -->
</div>