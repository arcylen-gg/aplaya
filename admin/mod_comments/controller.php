<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {

	case 'delete' :
	doDelete();
	break;


	}


function doDelete(){
	 @$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
		
	for($i=0;$i<$key;$i++){
	 
		$faqs = new Comments();
		$faqs->delete($id[$i]);
	}

		message("Comments already Deleted!","info");
		redirect('index.php');

}

?>