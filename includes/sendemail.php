<?php
/**
* Description:	This is a class for member.
* Author:		Joken Villanueva
* Date Created:	Nov. 2, 2013
* Revised By:		
*/
require_once(LIB_PATH.DS.'database.php');
class Sendemail
{
	function send($to = '', $message = '')
	{
		$return = null;
		$subject = "Successfull Reservation";
		if($to && $message)
		{
			mail($to, $subject, $message);
			return 1;
		}
	}
}