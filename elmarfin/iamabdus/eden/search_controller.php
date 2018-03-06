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
	$from_budget = isset($_GET['from_budget']) ? $_GET['from_budget'] : null ;
	$to_budget = isset($_GET['to_budget']) ? $_GET['to_budget'] : null ;

	$_SESSION['from_budget'] = $from_budget; 
	$_SESSION['to_budget'] = $to_budget; 

	//die(var_dump($from_budget));
	$event = isset($_GET['event_name']) ? $_GET['event_name'] : "No Event";
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
	$lesstime = 0;
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
				$diff_hour = $interval->format('%h');
				

		        $total_diff_hour = ($diff_day * 24) + $diff_hour;
		 
			    $price = $_GET['price'][$key];
			    $price_per_hour = $_GET['priceperhour'][$key];

			    if($diff_day > 0 || $diff_hour > 0)
				{
					$totalprice = ($diff_day * $price) + ($diff_hour * $price_per_hour);
				}
				else
				{
					$totalprice = $diff_hour * $price_per_hour;
				}
			    //die(var_dump($totalprice));
			    if($totalprice != 0)
			    {
			 		addtocart($value, $diff_day,$diff_hour, $totalprice, $arrival, $departure, $arrival_time_in, $departure_time_out, $event);
			    }
			    else
			    {
			    	$lesstime++;
			    }
			}
		}

	}
	if($lesstime != 0 && count($other_services) > 0)
	{
		message("Make sure your checked in date, time & checked out date, time are correct ","error");
	  	redirect("search.php");
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
	echo "<pre>";

	// die(var_dump($_GET));
	$arrival = $_GET['checkin'];
	$departure = $_GET['checkout'];
	$roomNo = $_GET['roomNo'];
	$price = $_GET['price'];
	$price_per_hour = isset($_GET['price_per_hour']) ? $_GET['price_per_hour'] : 0;
	$price_per_12_hour = isset($_GET['price_per_12_hour']) ? $_GET['price_per_12_hour'] : 0;

	//die(var_dump($price_per_12_hour));

	$_SESSION['from'] = $arrival;
	$_SESSION['to'] = $departure;
	$event = isset($_SESSION['event']) != null ? $_SESSION['event'] : 'No Event';

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

	$daydiff = dateDiff($arrival_date, $departure_date);
	  $diff_day = $interval->format('%a');
	  $diff_hour = $interval->format('%h');

	if($diff_hour > 12)
	{
		$new_diff_hr = $diff_hour - 12;
		$diff_12_hour = 1;
	}
	else
	{
		$new_diff_hr = $diff_hour;
		$diff_12_hour = 0;
	}
	//die(var_dump(expression));
	if($daydiff > 0 || $new_diff_hr > 0 || $diff_12_hour > 0)
	{
		$totalprice = ($daydiff * $price) + ($new_diff_hr * $price_per_hour) + ($diff_12_hour * $price_per_12_hour);

	}
	else
	{
		$totalprice = $new_diff_hr * $price_per_hour;

	}
	$total_hr = $new_diff_hr + $diff_12_hour;

	  if($totalprice != 0)
	  {
	  	//die(var_dump($totalprice));
 		addtocart($roomNo,$daydiff,$diff_hour,$new_diff_hr,$diff_12_hour,$totalprice,$arrival,$departure, $arrival_time_in, $departure_time_out, $event);
		redirect("/booking/index.php");
	  }
	  else
	  {
		message("Make sure your checked in date, time & checked out date, time are correct ","error");
	  	redirect("search.php");
	  }


}