<?php
/*$guestid =$_GET['guestid'];
$guest = new Guest();
$result=$guest->single_guest($guestid);*/

  $name = $_SESSION['name']; 
  $last = $_SESSION['last'];
  $country =$_SESSION['country'];
  $city = $_SESSION['city'] ;
  $address = $_SESSION['address'];
  $zip =  $_SESSION['zip'] ;
  $phone = $_SESSION['phone'];
  $email = $_SESSION['email'];
  $password =$_SESSION['pass'];
  $stat = $_SESSION['pending'];

?>

<div class="container">
  <?php include 'sidebar.php';?>

    <div class="col-xs-12 col-sm-9">
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body">  
             
                 <?php // include'navigator.php';?>


          <td valign="top" class="body" style="padding-bottom:10px;">

           <form action="index.php?view=payment" method="post"  name="" >
            <span id="printout">
           <fieldset >
           <legend><h2>Reservation Details</h2></legend>
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Sir/Madam <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <?php echo $email;?><br/><br/>
           Dear Sir/Madam. <?php echo $last;?>,<br/><br/>
           Greetings from El Marfin Pavilion!<br/><br/>
           Please check the details of your reservation:<br/><br/>
           <strong>GUEST NAME(S):</strong> <?php echo $name.' '.$last;?>


          </p>

        <table class="table table-hover">
                  <thead>
              <tr  bgcolor="#999999">
              <th width="10">#</th>
              <th align="center" width="120">Amenities Type</th>
               <th align="center" width="120">Check In</th>
                <th align="center" width="120">Check Out</th>
                 <th align="center" width="120">Nights</th>
              <th  width="120">Price(day)</th>
              <th align="center" width="120">Hours</th>
              <th  width="120">Price(hour)</th>
               <th align="center" width="120">Amenities</th>
              <th align="center" width="90">Amount</th>
           
              
         
            </tr> 
          </thead>
          <tbody>
          
            <?php


            $totalamount =0;

             $arival   = $_SESSION['from']; 
              $departure = $_SESSION['to']; 
              $days = dateDiff($arival,$departure);
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
              echo '<td> &#8369 '. number_format($result->price).'</td>';
                echo '<td>'.$_SESSION['magbanua_cart'][$i]['magbanuahour'].'</td>';
              echo '<td >  &#8369  '. number_format($result->price_per_hour).'</td>';
               echo '<td >1</td>';
                echo '<td >'. $_SESSION['magbanua_cart'][$i]['magbanuaroomprice'].'</td>';
        

              
              echo '</tr>';
               $totalamount += $_SESSION['magbanua_cart'][$i]['magbanuaroomprice'];
            } 


          }
           /*$payable= $result->price *$days;
           $_SESSION['pay']= $payable;*/
          
            ?>
          </tbody>
          <tfoot>
               <tr>
                   <td colspan="6"></td><td align="right"><h5><b>Order Total: </b></h5>
                   <td align="left">
                  <h5><b> <?php echo ' &#8369 ' .  $totalamount;?></b></h5>
                                   
                  </td>
          </tr>
         <tr>
                  <!--  <td colspan="4"></td><td colspan="5">
                            <div class="col-xs-12 col-sm-12" align="right">
                                <button type="submit" class="btn btn-primary" align="right" name="btnlogin">Payout</button>
                            </div>
                   
                     </td> -->
          </tr>
         
          </tfoot>  
        </table>

    <?php    unset($_SESSION['pay']);
        unset($_SESSION['magbanua_cart']);
        ?>
<p>We are eagerly anticipating your arrival and would like to advise you of the following in order to help you with your trip planning.Your reservation number is <b><?php echo $_SESSION['confirmation']?>:</b><br/><br/>Should there be a concern with your reservation, a customer service representative will contact you. Otherwise, consider your reservation confirmed.</p>
<ul>
 <li>Function Room rate is Php 500.00 for first four hours and Php 100.00 for each succeeding hours.</li>
 <li>No pets allowed.</li>
 <li>Outside foods are allowed inside the guest house.</li>
 <li>Check in time is 1pm and Check out time is 12 noon.</li>
 <li>Guest arriving before 1 pm shall be accommodated if rooms are vacant and ready.</li>
 <li>Free WIFI access.</li>
 <li>Room rates inclusive of government tax and service charge.</li>
 <li>Rates are subject to change without prior notice.</li>
 <li>Cancellation notification must be made at least 10 days prior to arrival for refund of deposits. Cancellation received within the 10 days period will result to forfeiture of full deposits.</li>
 <li>We serve Breakfast, Lunch and Dinner upon request with 2 hours notice.</li><br>
<strong>I have agreed that I will present the following documents upon check in:</strong><br/>
 <li>Copy of BDO Payment. BPI: 589559 – 0659 – 1402 – 45
BDO: 4748 – 4401 – 0003 - 6448</li>
 <li>Authorization letter issued by BDO payer for guest/s whose transactions were paid for in his/ her behalf.</li>
 </ul>
For Cancellation Purposes: This must be done 5 days before the event. Regarding to the payment, the client will also receive the whole down payment. And if the client failed to cancel the 5 days deadline before the event, the client would only receive 50% of the down payment.

For Rooms: the customer can pay at least 20% down payment and for the remainder, the client can pay it on hand when he/she are ready to use the room they reserved.

For Pool and Pavilion: The client needs to pay 50% of the package price for reservation fee which is deducted to the total payment. If the client failed to confirm or pay within 24 hours, the reservation will expired.






If you have any questions, please email at info@elmarfin.com or call 0922-872-8842 or 0922-872-8837
<br/><br/>
Thank you for choosing El Marfin Pavilion
<br/><br/>
Respectfully your,<br/><br/>
El Marfin Pavilion  
<br/><br/><br/>
</span>
<div id="divButtons" name="divButtons">
<input type="button" value="Print" onclick="tablePrint();" class="btn btn-inverse">
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
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>