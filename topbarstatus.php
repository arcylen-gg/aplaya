<div class="container clearfix">
          <div class="topbar">
            <ul>

<?php
    $con=mysqli_connect("localhost", "root","water123");
    mysqli_select_db($con, "aplayadb"); 
?>
<?php 
  if(!isset($_SESSION['guest_id']))
  {
    echo ' <li><a href="../../../index.php?page=8">Login </a></li>';
   
  }
  else
  {
     $iden = $_SESSION['guest_id'];
    $catcher=mysqli_query($con, "SELECT * FROM guest where guest_id = '$iden'");
    $get = mysqli_fetch_assoc($catcher);
    echo '<li><?php echo $get["firstname"];?></li>';

  }
?>
</ul>
</div>
</div>