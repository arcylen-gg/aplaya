<?php 
require_once("../../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';


switch ($action) 
{
	case 'search' :
	doSearch();
	break;

	case 'bookreservation' :
	doBookreservation();
	break;
}

function doSearch()
{
	$arrival = $_GET['check_in'];
	$departure = $_GET['check_out'];

	$event = isset($_GET['event_name']) ? $_GET['event_name'] : null;
	//die(var_dump($event));
	$other_services = isset($_GET['other_services']) ? $_GET['other_services'] : null;
	// echo "<pre>";
	$_SESSION['from'] = $arrival;
	$_SESSION['to'] = $departure;
	// die(var_dump($_SESSION));
	$_SESSION['event'] = $event;
 	if(count($other_services) > 0)
	{
		foreach ($other_services as $key => $value) 
		{

			if($value)
			{
		        $days = dateDiff($arrival,$departure); 
			    $totalprice = $_GET['price'][$key] * $days;
			 	addtocart($value,$days, $totalprice,$arrival,$departure,$event);
			}
		}
	}
	
	$amenity_type = $_GET['amenity_type'];

	if(strtolower($amenity_type) == 'room')
	{
		redirect("/view_rooms.php");
	}
	elseif(strtolower($amenity_type) == 'pavilion')
	{
		redirect("/view_pavilion.php");
	}
	elseif(strtolower($amenity_type) == 'pavilion with pool')
	{
		redirect("/view_pavilion.php");
	}
	elseif(strtolower($amenity_type) == 'pool')
	{
		redirect("/view_pool.php");
	}
}
function doBookreservation()
{
	$arrival = $_GET['checkin'];
	$departure = $_GET['checkout'];
	$roomNo = $_GET['roomNo'];
	$price = $_GET['price'];
	$_SESSION['from'] = $arrival;
	$_SESSION['to'] = $departure;
	$event = $_SESSION['event'];

	$days = dateDiff($arrival,$departure); 
    $totalprice = $price * $days;
 	addtocart($roomNo,$days, $totalprice,$arrival,$departure,$event);

	redirect("/booking/index.php");
}