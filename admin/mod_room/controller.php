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

	case 'editimage' :
	editImg();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=add");
		    	}else{
				$file=$_FILES['image']['tmp_name'];
				$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name= addslashes($_FILES['image']['name']);
				$image_size= getimagesize($_FILES['image']['tmp_name']);
				if ($image_size==FALSE) {
					message("That's not an image!", "error");
					redirect("index.php?view=add");
				}else{
			$location="rooms/".$_FILES["image"]["name"];
			if(file_exists($location)){
			
		    	message("There is such an image. Please select another one!", "error");
				redirect("index.php?view=add");	
			}
			else{
			move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
			
			if ($_POST['name'] == "" OR $_POST['rmtype'] == "" OR $_POST['price'] == "" OR $_POST['price_per_hour'] == "" OR $_POST['price_per_12_hour'] == ""){
				$messageStats = false;
					message("All fields required!", "error");
					redirect("index.php?view=add");
				
			}else{
				$room = new Room();
				       
				$rm_name		= $_POST['name'];
				$rm_type	    = $_POST['rmtype'];
				$rm_price 		= $_POST['price'];
				$rm_price_per_hour = $_POST['price_per_hour'];

				$rm_price_per_12_hour = $_POST['price_per_12_hour'];
				$rm_children 	= 0;
				
				if($_POST['adult'] == 0)
				{
					$rm_adult 	= 0;
				}else
				{
					$rm_adult 	= $_POST['adult'];
				}
				
				$rm_description 	= $_POST['description'];
				$rm_image 		= $location;
				$gallery_img     =  0 ; 

				$res = $room->find_all_room($rm_name);
				
				
				if ($res >=1) {
					message("Room name already exist!", "error");
					//die(var_dump(123));
					redirect("index.php?view=add");
				}else{
				
					$room->typeID = $rm_type;
					$room->roomName = $rm_name;
					$room->price = $rm_price;
					$room->price_per_hour = $rm_price_per_hour;

					$room->price_per_12_hour = $rm_price_per_12_hour;

					$room->Adults = $rm_adult;
					$room->Children = $rm_children;
					$room->roomImage = $rm_image;
					$room->description = $rm_description;
	                $room->gallery_img = $gallery_img;
					//die(var_dump($room));
					 $istrue = $room->create(); 
					 if ($istrue == 1){
					 	message("New [". $rm_name ."] created successfully!", "success");
					//die(var_dump(456));
					 	redirect('index.php');
					 	
					 }
				}	 

		
			}	



		}
	}
  }
}
//function to modify rooms

 function doEdit(){
           $room = new Room();
          		$rm_no			= $_POST['rmNo'];
				$rm_name		= $_POST['name'];
				$rm_type	    = $_POST['rmtype'];
				$rm_price 		= $_POST['price'];
				$rm_price_per_hour = $_POST['price_per_hour'];
				$rm_price_per_12_hour = $_POST['price_per_12_hour'];
				//die(var_dump($rm_price_per_12_hour));
				$rm_adult 		= $_POST['adult'];
				$rm_children 	= $_POST['children'];
				$rm_description 	= $_POST['description'];
				$room->typeID = $rm_type;
				$room->roomName = $rm_name;
				$room->price = $rm_price;
				$room->price_per_hour = $rm_price_per_hour;
				$room->price_per_12_hour = $rm_price_per_12_hour;
				$room->Adults = $rm_adult;
				$room->Children = 0;
				$room->description = $rm_description;
				
				$room->update($rm_no); 
				//die(var_dump($room));
			 	message("New [". $rm_name ."] Upadated successfully!", "success");
			 	unset($_SESSION['id']);
			 	redirect('index.php');
				 
}

function doDelete(){
@$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
		
	for($i=0;$i<$key;$i++){
	 
		$rm = new Room();
		$rm->delete($id[$i]);
	}

		message("Room already Deleted!","info");
		redirect('index.php');
 }
 
 //function to modify picture
 
function editImg (){
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=list");
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE) {
				message("That's not an image!");
				redirect("index.php?view=list");
		   }else{
			
		
				$location="rooms/".$_FILES["image"]["name"];
				

	 				$rm = new Room();
	          		$rm_id		= $_POST['id'];
				
			    	move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
					
					$rm->roomImage = $location;
					$rm->update($rm_id); 
					
				 	message("Room Image Upadated successfully!", "success");
				 	unset($_SESSION['id']);
				 	 redirect("index.php");
 			}
 		}
 }			 

function _deleteImage($catId)
{
    // we will return the status
    // whether the image deleted successfully
    $deleted = false;

	// get the image(s)
    $sql = "SELECT * 
            FROM room
            WHERE roomNo ";
	
	if (is_array($catId)) {
		$sql .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql .= " = {$catId}";
	}	

    $result = dbQuery($sql);
    
    if (dbNumRows($result)) {
        while ($row = dbFetchAssoc($result)) {
		extract($row);
	        // delete the image file
    	    $deleted = @unlink($roomImage);
		}	
    }
    
return $deleted;
}



?>
