<?php 
require_once("../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) 
{
	case 'cancel' :
	doCancelReservation();
	break;
	case 'reschedule' : 
	doReschedule();
	break;
	case 'clear' : 
	doClearReservation();
	break;
}
function doClearReservation()
{
	$id = $_GET['guest_id'];
	$res = new Reservation();
	$res->archived = 1;
	$res->update_archive($id); 
					
	message("Reservation Updated successfully!", "success");
	redirect('../index.php?page=7');

}
function doCancelReservation()
{
	$id = $_GET['id'];
	$res = new Reservation();
	$res->status = 'Cancelled';
	$res->reason = $_GET['reason'];
	$res->update($id); 
					
	message("Reservation Updated successfully!", "success");
	redirect('../index.php?page=7');
}
function doReschedule()
{
	$id = $_GET['reservation_id'];
	$res = new Reservation();
	$data = $res->single_reservation($id);

	$res->status = 'pending';
	$res->arrival = $_GET['arrival'];
	$res->departure = $_GET['departure'];
	$night = dateDiff($_GET['arrival'],$_GET['departure']);
	$res->reason = $_GET['reason'];
	$res->payable = $data->price * $night;
	$res->update($id); 
					
	message("Reservation Updated successfully!", "success");
	redirect('../index.php?page=7');
}

?>