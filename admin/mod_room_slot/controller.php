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
	die(var_dump(123));
}