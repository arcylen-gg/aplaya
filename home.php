<?php
require_once("initialize.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>El Marfin Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>

<?php 
if (isset($_POST['btnlogin'])) {
    //form has been submitted1
    
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    
    $h_upass = sha1($pass);
    //check if the email and password is equal to nothing or null then it will show message box
    if ($email == '' OR $pass == '') {
?>    <script type="text/javascript">
                alert("Invalid Username and Password!");
                </script>
            <?php
        
    } else 
    {
        $guest = new Guest();
    $res = $guest->guest_login($email, $pass);
        if($res == true){
            /*redirect("../../../../aplaya/index.php?page=7");*/
            redirect("/elmarfin/iamabdus/eden/search.php");
        }else{
              ?>
                   <script type="text/javascript">
                    alert("Username or Password not Registered!");
                    window.location = "index.php";
                    </script>
                <?php
        } 
    }
} else {
    
    $email = "";
    $pass = "";
    
}

?>
    <div class="container">
  <form class="form-signin" method="POST">
   <center> <h5> <font color="red">The email you are using to use already exists. Please login first. </font></h5></center> 
      
        <h2 class="form-signin-heading">Sign in as guest.</h2>
         <input type="text" class="form-control" placeholder="Email address" name="email" autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnlogin">Sign in</button>
      </form>

    </div> <!-- /container -->
    
  </body>
</html>