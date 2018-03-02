<?php
require_once("initialize.php");
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();
 
// 2. Unset all the session variables
unset($_SESSION['guest_id']);	
unset($_SESSION['name']); 		
unset($_SESSION['last']);	
unset($_SESSION['country']);
unset($_SESSION['city']); 		
unset($_SESSION['address']); 	
unset($_SESSION['zip']); 		
unset($_SESSION['phone']); 	
unset($_SESSION['email']); 		
unset($_SESSION['pass']); 	
unset($_SESSION['from']); 
unset($_SESSION['to']); 	
unset($_SESSION['magbanua_cart']); 	

 	
// 4. Destroy the session
session_destroy();
redirect("/elmarfin/iamabdus/eden/index.php");
?>
