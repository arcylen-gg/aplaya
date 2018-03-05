  
  <?php
  require_once("includes/initialize.php");
        $con=mysqli_connect("localhost", "root","water123");
  mysqli_select_db($con, "aplayadb"); 
?>

<?php
 


        if(isset($_POST["submit"]))
    {
        extract($_POST);
        {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $guest_id = $_POST['guest']; 
            $oldpass = $_POST['oldpass']; 
            $newpass1 = $_POST['newpass1']; 
            $newpass2 = $_POST['newpass2']; 
          
          $catcher=mysqli_query($con, "SELECT * FROM guest where guest_id = '$guest_id'");
          $get = mysqli_fetch_assoc($catcher);
          $check_pass = $get['password']; 
          
         // echo $check_pass;
          //echo $fname;
          //echo $lname;
          //echo $phone;
          //echo $email;
          //echo $guest_id;
          
          if($oldpass != $check_pass)
          {
              message('Wrong Password/Pass did not match.','error' ); 
              header("location: ../../../../index.php?page=7");        
          }
          elseif ($newpass1 != $newpass2)
          {
              message('Password did not match.','error' ); 
              header("location: ../../../../index.php?page=7");        
          }
          else
          {
             $qry = mysqli_query ($con,"UPDATE guest SET 
               firstname= '$fname', 
               lastname= '$lname' ,  
               phone= '$phone' ,  
               email= '$email',
               password = '$newpass1'  
            
               WHERE guest_id = '$guest_id'") or die (mysql_error());

              message('Information updated successfully.','success'); 
              header("location: ../../../../index.php?page=7");       
          }
          
             

        }

    }
?>