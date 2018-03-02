<?php
require_once("../../includes/initialize.php");

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
//die(var_dump($action));
switch ($action) {
	case 'modify' :
	dbMODIFY();
	break;
	
	case 'add' :
	doInsert();
	break;

	case 'delete' :
	dbDELETE();
	break;
	
	case 'deleteOne' :
	dbDELETEONE();
	break;
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	case 'checkin' :
	doCheckin();
	break;
	case 'checkout' :
	doCheckout();
	break;
	}
function doCheckout(){

	$id = $_GET['id'];

	$res = new Reservation();
	$res->status = 'Checkedout';
	$res->update($id); 
					
	message("Reservation Updated successfully!", "success");
	redirect('index.php');

}
function doCheckin(){
$id = $_GET['id'];

$res = new Reservation();
$res->status = 'Checkedin';
$res->update($id); 
}
function createRandomPassword() 
{

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;
    while ($i <= 7) 
    {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;

}

function doInsert()
{
//die(var_dump($_GET));
	$reserved = $_GET['reserved'];
	$reserved_price = $_GET['reserved_price'];
	//die(var_dump($other_services));
	$arrival = $_GET['from'];
	$departure = $_GET['to'];

	$guest = new Guest;
	$guest->firstname = $_GET['fname'];
	$guest->lastname = $_GET['lname'];
	$guest->country = "Philippines";
	$guest->city = "PH City";
	$guest->address = $_GET['address'];
	$guest->zip = "PHzip";
	$guest->phone = $_GET['phone'];
	$guest->email = $_GET['email'];
	$guest->password = $_GET['password'];

	// $mydb->setQuery("INSERT INTO guest (firstname,lastname,country,city,address,zip,phone,email,password)
 //      VALUES (".$_GET['fname'].",".$_GET['lname'].",'Philippines','PH city',".$_GET['address'].",'PHzip',".$_GET['phone'].",".$_GET['email']).")";
 //    $res = $mydb->executeQuery();
 //    $lastguest=mysqli_insert_id();
	$guest_id = $guest->create(true);
	foreach ($reserved as $key => $value) 
	{
		if($value)
		{
	        $days = dateDiff($arrival,$departure); 
		    $totalprice = $reserved_price[$key] * $days;

		    $reserve = new Reservation;
		    $reserve->roomNo = $value;
		    $reserve->guest_id = $guest_id;
		    $reserve->arrival = $arrival;
		    $reserve->departure = $departure;
		    $reserve->adults = $_GET['adults'];
		    $reserve->child = $_GET['child'];
		    $reserve->payable = $totalprice;
		    $reserve->status = $_GET['status'];
		    $reserve->booked = "0000-00-00";
		    $reserve->confirmation = createRandomPassword();
		    $reserve->reason = ".";

		    $reserve->create();
		}
	}
	message("Reservation Created successfully!", "success");
	redirect('index.php');



}


function doCancel(){
$id = $_GET['id'];

$res = new Reservation();
$res->status = 'Cancelled';
$res->update($id); 
				
message("Reservation Updated successfully!", "success");
redirect('index.php');

}
function doConfirm(){
$id = $_GET['res_id'];

$res = new Reservation();
$res->status = 'Confirmed';
$res->update($id); 
 

message("Reservation Updated successfully!", "success");
redirect('index.php');

}	
/*function dbMODIFY(){
$id = $_GET['id'];
$arrival=$_POST['arrival'];
$departure=$_POST['departure'];
$adults=$_POST['adults'];
$child=$_POST['child'];
$sql="UPDATE reservation SET arrival='$arrival', departure='$departure',adults='$adults',child='$child' WHERE reservation_id=".$id;
$result = dbQuery($sql);
if(!$result)
{
  die('Could not modify record: ' . mysql_error());
} else {

header('Location:index_resv.php');}
}
*/
/*function dbDELETEONE(){
	$del_id = $_GET['id'];
	$sql = "DELETE FROM reservation  WHERE reservation_id={$del_id}";
	$result = dbQuery($sql)or die('Could not delete record: ' . mysql_error());
  header('Location:index_resv.php?view=list');
  }*/
?>