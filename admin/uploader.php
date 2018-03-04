<?php     
    $con=mysqli_connect("localhost", "root","");
    mysqli_select_db("aplayadb", $con);

        $path = $_FILES['uploadedfile']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        
        $randnum = mt_rand() ;
        $target_paths = "uploads/";
        $target_path = $target_paths . $randnum .".".  $ext  ; 
        $catcher=mysqli_query($con, "SELECT image_path FROM gallery_path");
        $get=mysqli_fetch_assoc($catcher);
         
        if
        (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
        {       
                $qry = mysqli_query("INSERT INTO gallery_path (image_path) VALUES('$target_path')")or die (mysql_error());  
                header("location: bp-gallery-upload-success.php");
        } 
        else
        {
                header("location: bp-gallery-upload-fail.php");
        } 
?>

<html>
<head>
    <title></title>
</head>
<body>
   

</body>
</html>