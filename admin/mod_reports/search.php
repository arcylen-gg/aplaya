<br>
<br>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-body">
		     
		<form class="form-inline" action="" method="post">
			<div class="form-group">
				<h4>Category :</h4>
			</div>
			  <div class="form-group">
			  <select name="categ" class="form-control">
			  	<option <?php echo (isset($_POST['categ']) ? (strtolower($_POST['categ']) == 'checkedin' ? "selected" :''): ''); ?> value="Checkedin">Checkedin</option>
			  	<option <?php echo (isset($_POST['categ']) ? (strtolower($_POST['categ']) == 'checkedout' ? "selected" :''): ''); ?> value="Checkedout">Checkedout</option>
			  	<option <?php echo (isset($_POST['categ']) ? (strtolower($_POST['categ']) == 'cancelled' ? "selected" :''): ''); ?> value="Cancelled">Cancelled</option>
			  	<option <?php echo (isset($_POST['categ']) ? (strtolower($_POST['categ']) == 'pending' ? "selected" :''): ''); ?> value="Pending">Pending</option>>
			  </select>
			  </div>
			<div class="form-group">
					<h4>Date Filter : </h4>
			</div>
			  <div class="form-group">
			 <input class="form-control date start " size="20" type="text" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] : ''; ?>" Placeholder="Check In" name="start" id="from" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
			 </div>
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputPassword2">Check Out:</label>
			      <input class="form-control date end " size="20" type="text" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] : ''; ?>"  name="end" id="end" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
			  </div>
		  
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
<form  method="post" action="">
<span id="printout">
<table  class="table table-bordered" style="width:100%" cellspacing="0">
<thead>
<tr bgcolor="#999999">
<td ><strong>Name</strong></td>
<td ><strong>Arrival</strong></td>
<td ><strong>Departure</strong></td>
<td ><strong>Room Name</strong></td>
<td ><strong>Nights</strong></td>
<td ><strong>Status</strong></td>
</tr>
</thead>
<tbody>		
<?php

if(isset($_POST['submit'])){
	$_SESSION['start']=date("Y-m-d", strtotime($_POST['start']));
	$_SESSION['end']=date("Y-m-d", strtotime($_POST['end']));	
	$_SESSION['categ'] = $_POST['categ'];


	// $mydb->setQuery("SELECT * , roomName, firstname, lastname
	// FROM reservation re, room ro, guest gu
	// WHERE arrival BETWEEN  '".$_SESSION['start']."'
	// AND '".$_SESSION['end']."'
	// AND re.roomNo = ro.roomNo
	// AND re.guest_id = gu.guest_id");

	$mydb->setQuery("SELECT * FROM reservation 
		LEFT JOIN room ON room.roomNo = reservation.roomNo 
		LEFT JOIN guest ON guest.guest_id = reservation.guest_id
		WHERE arrival >= '".$_SESSION['start']."' and arrival <= '".$_SESSION['end']."'
		AND status = '".$_POST['categ']."'");
	$res = $mydb->executeQuery();

	
	$row_count = $mydb->num_rows($res);
	$cur = $mydb->loadResultList();
		if($row_count > 0)
		{
			foreach ($cur as $result) {
			?>
				<tr >
				<td><?php echo $result->firstname." ".$result->lastname; ?></td>
				<td><?php echo $result->arrival; ?></td>
				<td><?php echo $result->departure; ?></td>
				<td><?php echo $result->roomName; ?></td>
				<td><?php echo dateDiff($result->arrival,$result->departure); ?></td>
				<td><?php echo $result->status; ?></td>
				</tr>

			<?php }
			
		}
		else
		{

		echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

		}

	}
?>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr class="hidden noted-by"><td></td></tr>
<tr style="text-align: right;" class="hidden noted-by"><td colspan="6"> _________________</td></tr>
<tr style="text-align: right;" class="hidden noted-by"><td colspan="6"> Noted By</td></tr>
</tbody>
</table>
</span>
<input type="button" value="Print Report" onclick="tablePrint();" class="btn btn-primary">
</form>
</div>
</div> 

<script>
function tablePrint(){  
	$('.noted-by').removeClass('hidden');
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
	$('.noted-by').addClass('hidden');
    return false;  
    } 
	$(document).ready(function() {
		oTable = jQuery('#list').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});		
</script>