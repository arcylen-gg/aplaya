<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) 
{
	case 'extend' :
	doExtend();
	break;
}

function doExtend()
{
	$reservation_id = $_GET['reservation_id'];
	$outdate = $_GET['checkoutdate'];
	$outtime = $_GET['checkouttime'];

	$getreserve = new Reservation;
	$data = $getreserve->single_reservation($reservation_id);

	if($data)
	{
		$outdatetime = $outdate." ".$outtime;
	    $datetime1 = new DateTime($data->departure." ".$data->time_out);
	    $datetime2 = new DateTime($outdatetime);
	    $interval = dateDiff($data->departure, $outdate);
	    $hourdiff = round((strtotime($outdatetime) - strtotime($data->departure." ".$data->time_out))/3600, 1);
	    if($interval >= 0 && $hourdiff > 0)
	    {
	    	$newprice = ($data->price_per_hour * $hourdiff) + ($data->price * $interval);
	    	$new = new Reservation;
	    	$new->departure  = $outdate;
	    	$new->time_out  = $outtime;
	    	$new->payable  = $data->payable + $newprice;

	    	$new->update($reservation_id);
			message("Reservation extended successfully!<br> Another P ".number_format($newprice)." has been adden to payables", "success");
			redirect('index.php?view=list');	    	
	    }
	    else
	    {
			message("Cannot select past date!", "error");
			redirect('index.php?view=list');	    	
	    }
	}
	else
	{
		message("Reservation Not Found!", "error");
			redirect('index.php?view=list');
	}
}