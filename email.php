<?php 
if(isset($_POST['send_email']))
{
	$to      =$_POST['emailreceipt'];
	$subject = 'TEST';
	$message = $_POST['emailmessage'];
}
?>

<form action="#.php" method="post" accept-charset="utf-8">
	<input type="text" name="emailreceipt"> <br>
	<textarea name="emailmessage"></textarea> <br>
	<button type="submit" name="send_email"> Send </button>
</form>


<p>
Good Day [name], 
<br>
<br>
Your reservation for El Marfin Pavilion has been confirmed.
<br>
<br>
Thank you,
<br>
<strong>Admin</strong>
</p>