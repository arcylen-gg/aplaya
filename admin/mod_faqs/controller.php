<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
		
	if ($_POST['name'] == "" OR $_POST['description'] == "") {
			message("All fields required!", "error");
			redirect("index.php?view=add");
		
	}else{

		$faqs = new Faqs();
		$faqs_name	= $_POST['name'];
		$faqs_desc    = $_POST['description'];
	
		$res = $faqs->find_all_active($faqs_name);
		
		
		if ($res >=1) {
			message("FAQs name already exist!", "error");
			redirect("index.php?view=add");
		}else{
			
			$faqs->faqs_name = $faqs_name;
			$faqs->faqs_desc = $faqs_desc;
			$faqs->archive = 0;
			
			
			 $istrue = $faqs->create(); 
			 if ($istrue == 1){
			 	message("New [". $faqs_name ."] created successfully!", "success");
			 	redirect('index.php');
			 	
			 }
		}	 

		
	}	
}
function doEdit(){
	//die(var_dump($_POST));
	if ($_POST['faqs_name'] == "" && $_POST['faqs_desc'] == "") {
			message("All fields required!", "error");
			//die(var_dump(message));
			redirect("index.php?view=add");
		
	}else{

		$rm = new Faqs();
		$rm_id		= $_POST['faqs_id'];
		$rm_name	= $_POST['faqs_name'];
		$rm_desc    = $_POST['faqs_desc'];
	
		$res = $rm->find_all_active($rm_name);
		
		
		
			$rm->faqs_name = $rm_name;
			$rm->faqs_desc = $rm_desc;
			
			
			$rm->update($rm_id); 
			
		 	message("New [". $rm_name ."] Updated successfully!", "success");
		 	redirect('index.php');
	}	
		
}

function doDelete(){
	 @$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
		
	for($i=0;$i<$key;$i++){
	 
		$faqs = new Faqs();
		$faqs->delete($id[$i]);
	}

		message("Faqs already Deleted!","info");
		redirect('index.php');

}

?>