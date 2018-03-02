
<?php

$_SESSION['id']=$_GET['id'];
$rm = new Faqs();
$result = $rm->faqs($_SESSION['id']);
//die(var_dump($result));
?>
<form class="form-horizontal well span6" action="controller.php?action=edit" method="POST">

	<fieldset>
		<legend>FAQs</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Question:</label>

              <div class="col-md-8">
              		<input name="faqs_id" type="hidden" value="<?php echo $result->faqs_id; ?>">
                 <input class="form-control input-sm" id="name" name="faqs_name" placeholder=
									  "Account Name" type="text" value="<?php echo $result->faqs_name; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "description">Description:</label>

              <div class="col-md-8">
                    <textarea class="form-control" rows="4" cols="50" id="description" name="faqs_desc" placeholder=
                    "Description"><?php echo $result->faqs_desc; ?></textarea>
              </div>
            </div>
          </div>

		 <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" name="save" type="submit" >Save</button>
              </div>
            </div>
          </div>

			
	</fieldset>	


</form>


</div><!--End of container-->
			

