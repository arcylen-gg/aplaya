<?php 
        $con=mysqli_connect("localhost", "root","water123");
        mysqli_select_db($con, "aplayadb");  

$arival    = $_SESSION['from']; 
$departure = $_SESSION['to'];
$name      = $_SESSION['name']; 
$last      = $_SESSION['last'];
$country   = $_SESSION['country'];
$city      = $_SESSION['city'] ;
$address   = $_SESSION['address'];
$zip       = $_SESSION['zip'] ;
$phone     = $_SESSION['phone'];
$email     = $_SESSION['email'];
$password  = $_SESSION['pass'];
// $roomid   = $_SESSION['roomid'];
$_SESSION['pending'] = 'pending';
$stat     = $_SESSION['pending'];
$days     = dateDiff($arival,$departure);

if(isset($_POST['btnsubmitbooking']))
{
    $message = $_POST['message'];
    function createRandomPassword() 
    {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;
    while ($i <= 7) 
    {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;

}

  $confirmation = createRandomPassword();
  $_SESSION['confirmation'] = $confirmation;
//    $count_cart = count($_SESSION['magbanua_cart']);

//   for ($i=0; $i < $count_cart  ; $i++) {     
//   $mydb->setQuery("SELECT * FROM room where roomNo=". $_SESSION['magbanua_cart'][$i]['magbanuaroomid']);
//   $rmprice = $mydb->executeQuery();
//   while($row = mysqli_fetch_assoc($rmprice)){
//     $rate = $row['price']; 
//   }  
// }
//   $payable= $rate*$days;
//   $_SESSION['pay']= $payable;

  //check guest

  $mydb->setQuery("SELECT * 
                FROM  guest 
                WHERE  `phone` ='{$phone}' OR email='{$email}'");
  $cur = $mydb->executeQuery();
  $row_count = $mydb->num_rows($cur);
  if ($row_count >=1 ) 
  {

    $rows = $mydb->fetch_array($cur);
    $lastguest= $rows['guest_id'];
          
    $mydb->setQuery("UPDATE guest SET firstname='$name',lastname='$last',
                          country='$country',city='$city',address='$address',
                          zip='$zip',phone='$phone',email='$email',password='$password' 
                      WHERE guest_id='$lastguest'");
    $res = $mydb->executeQuery();  

  }
  else
  {
   
    $mydb->setQuery("INSERT INTO guest (firstname,lastname,country,city,address,zip,phone,email,password)
      VALUES ('$name','$last','$country','$city','$address','$zip','$phone','$email','$password')");
    $res = $mydb->executeQuery();
    $lastguest=mysqli_insert_id(); 
    
   }
   //echo "<pre>";
    //die(var_dump($_SESSION));
    $count_cart = count($_SESSION['magbanua_cart']);
    for ($i=0; $i < $count_cart  ; $i++) 
    {
      $insdata['room_id'] = $_SESSION['magbanua_cart'][$i]['magbanuaroomid'];

      $insdata['guest_id'] = $lastguest;
      $insdata['arrival'] = date("Y-m-d", strtotime($_SESSION['magbanua_cart'][$i]['magbanuacheckin']));
      $insdata['departure'] = date("Y-m-d", strtotime($_SESSION['magbanua_cart'][$i]['magbanuacheckout']));
      $insdata['adults'] = 1;
      $insdata['child'] = 0;
      $insdata['payable'] = $_SESSION['magbanua_cart'][$i]['magbanuaroomprice'];
      $insdata['status'] = $stat;
      $insdata['booked'] = $_SESSION['magbanua_cart'][$i]['magbanuacheckin'];
      $insdata['confirmation'] = $confirmation;
      $insdata['reason'] = ".";
      $insdata['event_name'] = $_SESSION['magbanua_cart'][$i]['magbanuaevent'];
      $insdata['time_in'] = date("Y-m-d", strtotime($_SESSION['magbanua_cart'][$i]['magbanuacheckintime']));
      $insdata['time_out'] = date("Y-m-d", strtotime($_SESSION['magbanua_cart'][$i]['magbanuacheckouttime']));

      //die(var_dump($insdata['event_name']));
      $mydb->setQuery("INSERT INTO reservation (roomNo,guest_id,arrival,departure,adults,child,payable,status,booked,confirmation,reason,event_name,time_in, time_out)
              VALUES (".$insdata['room_id'].",".$insdata['guest_id'].",'".$insdata['arrival']."','".$insdata['departure']."',".$insdata['adults'].",".$insdata['child'].",'".$insdata['payable']."','".$insdata['status']."','".$insdata['booked']."','".$insdata['confirmation']."','".$insdata['reason']."','".$insdata['event_name']."','".$insdata['time_in']."','".$insdata['time_out']."')");
      //die(var_dump($mydb));
      $res = $mydb->executeQuery();
    }

    $msg = "<p>
            Good Day <?php echo $name.' '.$last;?>, 
            <br>
            <br>
            Your reservation for El Marfin Pavilion has been confirmed.
            <br>
            <br>
            Thank you,
            <br>
            <strong>Admin</strong>
            </p>";
    $emailsender = new Sendemail();
    $emailsender->send($email, $msg);

      $mydb->setQuery("INSERT INTO `comments` (`firstname`, `lastname`, `email`, `comment`) VALUES('$name','$last','$email','$message')");
      $msg = $mydb->executeQuery();
      message("New [". $name ."] created successfully!", "success");

  //  unsetSessions();

     
    redirect("index.php?view=detail");
}
?>

<div class="container">
  <?php include'../sidebar.php';?>

    <div class="col-xs-12 col-sm-9">
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body">  
             
                 <?php // include'navigator.php';?>


          <td valign="top" class="body" style="padding-bottom:10px;">
       <form action="index.php?view=payment" method="post"  name="personal" >
           <fieldset >
           <legend><h2>Billing Details</h2></legend>
           <p>

            <strong>FIRST NAME:</strong> <?php echo $name;?> <br/>
            <strong>LAST NAME:</strong> <?php echo $last;?><br/>
            <strong>COUNTRY:</strong> <?php echo $country;?><br/>
            <strong>CITY:</strong> <?php  echo $city;?><br/>
            <strong>ADDRESS:</strong> <?php echo $address;?><br/>
            <strong>ZIP CODE:</strong> <?php echo $zip; ?><br/>
            <strong>PHONE:</strong> <?php echo $phone;?><br/>
            <strong>E-MAIL:</strong> <?php echo $email;?><br/>
          </p>

        <table class="table table-hover">
                  <thead>
              <tr  bgcolor="#999999">
              <th width="10">#</th>
              <th align="center" width="120">Room Type</th>
              <th align="center" width="120">Check In</th>
              <th align="center" width="120">Check Out</th>
              <th align="center" width="120">Day/Night</th>
              <th  width="120">Price(day)</th>
              <th align="center" width="120">Hours</th>
              <th  width="120">Price(hour)</th>
              <th align="center" width="120">Room</th>
              <th align="center" width="90">Amount</th>
           
              
         
            </tr> 
          </thead>
          <tbody>
              
            <?php
            $totalamount = 0;
               $count_cart = count($_SESSION['magbanua_cart']);
                for ($i=0; $i < $count_cart  ; $i++) {     
              $mydb->setQuery("SELECT *,typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID and roomNo =". $_SESSION['magbanua_cart'][$i]['magbanuaroomid']);
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<tr>'; 
              echo '<td></td>';
              echo '<td>'. $result->typeName.'</td>';
                echo '<td>'.$_SESSION['magbanua_cart'][$i]['magbanuacheckin'].'</td>';
                echo '<td>'.$_SESSION['magbanua_cart'][$i]['magbanuacheckout'].'</td>';
                echo '<td>'.$_SESSION['magbanua_cart'][$i]['magbanuaday'].'</td>';
              echo '<td >  &#8369  '. number_format($result->price).'</td>';
                echo '<td>'.$_SESSION['magbanua_cart'][$i]['magbanuahour'].'</td>';
              echo '<td >  &#8369  '. number_format($result->price_per_hour).'</td>';
               echo '<td >1</td>';
                /*echo '<td > &#8369'. $_SESSION['magbanua_cart'][$i]['magbanuaroomprice'].'</td>';*/
                echo '<td > &#8369 '. number_format($_SESSION['magbanua_cart'][$i]['magbanuaroomprice']).'</td>';
        

              
              echo '</tr>';

               $totalamount += $_SESSION['magbanua_cart'][$i]['magbanuaroomprice'];
             //   @$payable +=  $result->price   ;
     
             // $_SESSION['pay'] = $payable * $days ;
            } 
            
         }
            ?>
          </tbody>
          <tfoot>
           <tr>
                   <td colspan="6"></td><td align="right"><h5><b>Order Total:  </b></h5>
                   <td align="left">
                  <h5><b> <?php echo ' &#8369 '.  $totalamount; ?></b></h5>
                                   
                  </td>
          </tr>
         <tr>
                  <!--  <td colspan="4"></td><td colspan="5">
                            <div class="col-xs-12 col-sm-12" align="right">
                                <button type="submit" class="btn btn-inverse" align="right" name="btnlogin">Payout</button>
                            </div>
                   
                     </td> -->
          </tr>
         
          </tfoot>  
        </table>
              <div class="form-group">
                  <div class="col-md-12">
                    

                    <div class="col-md-10">
                      <b>Special Request</b>
                 <textarea class="form-control input-sm" name="message" placeholder="What's on your mind?">
                </textarea>
                Some request might have corresponding charges and subject to availability. <br/>
                <br/>
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                  <div class="col-md-12">
                    

                    <div class="col-md-10">
                   <button type="submit" class="btn btn-inverse" align="right" name="btnsubmitbooking">Submit Booking</button>
                    </div>
                  </div>
                </div>



              </form>

            </div>
          </div>  
          
        </div>
    <!--  </div>-->
    </div>
    <!--/span--> 
    <!--Sidebar-->

  </div>
  <!--/row-->



