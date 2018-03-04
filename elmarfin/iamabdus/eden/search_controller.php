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
	$event = isset($_GET['event_name']) ? $_GET['event_name'] : null;
	$other_services = isset($_GET['other_services']) ? $_GET['other_services'] : null;

	$arrival = $_GET['check_in'];
	$departure = $_GET['check_out'];

	$arrival_time_in = $_GET['check_in_time'];
	$departure_time_out = $_GET['check_out_time'];
	// echo "<pre>";
	$_SESSION['from'] = $arrival;
	$_SESSION['to'] = $departure;

	$_SESSION['time_in'] = $arrival_time_in;
	$_SESSION['time_out'] = $departure_time_out;
	
	$arrival_date = date("Y-m-d", strtotime($arrival));
	$departure_date = date("Y-m-d", strtotime($departure));

	$arr = $arrival_date."T". $arrival_time_in;
	$dep = $departure_date."T". $departure_time_out;

	//die(var_dump($diff_hour = $interval->format('%h')));
	$_SESSION['event'] = $event;
 	if(count($other_services) > 0)
	{
		foreach ($other_services as $key => $value) 
		{

			if($value)
			{
				$datetime1 = new DateTime($dep);
				$datetime2 = new DateTime($arr);
				$interval = $datetime1->diff($datetime2);

				$diff_day =	$interval->format('%a');
				

		        $total_diff_hour = ($diff_day * 24) + $diff_hour;
		 
			    $totalprice = $_GET['price'][$key] * $total_diff_hour;
			    //die(var_dump($totalprice));
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
	$price_per_hour = $_GET['price_per_hour'];

	$_SESSION['from'] = $arrival;
	$_SESSION['to'] = $departure;
	$event = $_SESSION['event'];

	$arrival_time_in = $_GET['check_in_time'];
	$departure_time_out = $_GET['check_out_time'];

	$_SESSION['time_in'] = $arrival_time_in;
	$_SESSION['time_out'] = $departure_time_out;
	$arrival_date = date("Y-m-d", strtotime($arrival));
	$departure_date = date("Y-m-d", strtotime($departure));

	$arr = $arrival_date."T". $arrival_time_in;
	$dep = $departure_date."T". $departure_time_out;


	$datetime1 = new DateTime($dep);
	$datetime2 = new DateTime($arr);
	$interval = $datetime1->diff($datetime2);


	$diff_day =	$interval->format('%a');
	$diff_hour = $interval->format('%h');


	if($diff_day >= 1 and $diff_hour >= 1)
	{
		$totalprice = ($diff_day * $price) + ($diff_hour * $price_per_hour);
	}
	else
	{
		$totalprice = $diff_hour * $price_per_hour;
	}
 	addtocart($roomNo,$diff_day,$diff_hour, $totalprice,$arrival,$departure, $arrival_time_in, $departure_time_out, $event);

	redirect("/booking/index.php");
}