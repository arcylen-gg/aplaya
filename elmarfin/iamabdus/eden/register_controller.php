<?php 
require_once("../../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';


switch ($action) 
{
	case 'register' :
	doRegister();
	break;

}

function doRegister()
{
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$country = "Philippines";
	$city = "PhCity";
	$zip = "00000";
	$address = $_GET['address'];
	$phone = $_GET['phone'];
	$email = $_GET['email'];
	$password = $_GET['pass'];
	$con_password = $_GET['con_pass'];

	$msg = null;
	$status = null;

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		$msg .= "Not a valid Email <br>";
		$status = "error";
	}

	$chk_emailgst = new Guest;
	$chk_email = $chk_emailgst->check_email($email);
	if($chk_email)
	{
		$msg .= "Email address already taken";
		$status = "error";
	}
	if($password != $con_password)
	{
		$msg .= "Password not match <br>";
		$status = "error";
	}
	if($fname == '' || $lname == '' || $phone == '' || $address == '' || $email == '' || $password == '')
	{
		$msg .= "Kindly fill up all fields.";
		$status = "error";		
	}

	if(!$msg)
	{
		$nw_guest = new Guest;
		$nw_guest->firstname = $fname;
		$nw_guest->lastname = $lname;
		$nw_guest->country = $country;
		$nw_guest->city = $city;
		$nw_guest->address = $zip;
		$nw_guest->zip = $address;
		$nw_guest->phone = $phone;
		$nw_guest->email = $email;
		$nw_guest->password = $password;

		$nw_guest->create();

        $guest = new Guest();
        $guest->guest_login($email, $password);
		message("Successfully registered","success");
        redirect("../../../booking");
	}

	message($msg,$status);
	redirect("register.php");
}