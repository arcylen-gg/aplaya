
<?php

$_SESSION['id']=$_GET['id'];
$rm = new Room();
$result = $rm->single_room($_SESSION['id']);
?>
<form class="form-horizontal well span6" action="controller.php?action=edit" enctype="multipart/form-data" method="POST">

	<fieldset>
		<legend>Edit Service</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Name:</label>

              <div class="col-md-8">
              	<input name="rmNo" type="hidden" value="<?php echo $result->roomNo; ?>">
                 <input class="form-control input-sm" id="name" name="name" placeholder=
									  "Room Name" type="text" value="<?php echo $result->roomName; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "rmtype">Room Type:</label>

              <div class="col-md-8">
              <select class="form-control input-sm" name="rmtype" id="rmtype"> 
                  	<option value="None">None</option>
                  	<?php
                  	$rm = new Roomtype();
                  	$cur= $rm->listOfroomtype();
                  	foreach ($cur  as $rmtype) {
                  		echo '<option '.($rmtype->typeID == $result->typeID ? 'selected' : '').' value='.$rmtype->typeID.'>'.$rmtype->typename.'</OPTION>';
                  	}

                  	?>
                  </select>	
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "price">Price:</label>

              <div class="col-md-8"> 
                <input class="form-control input-sm" id="price" name="price" placeholder=
									  "Price" type="text" value="<?php echo $result->price; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "adult">Pax:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="adult" name="adult" placeholder=
									  "Adult" type="text" value="<?php echo $result->Adults; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>

          <!--  <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "children">Children:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="children" name="children" placeholder=
									  "Children" type="text" value="<?php echo $result->Children; ?>" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div> -->
           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "description">Description:</label>
              <div class="col-md-8">
                <textarea name="description" id="description" class=" form-control tinymce input-sm form-group"><?php echo $result->description; ?></textarea>
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

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<script>tinymce.init({ selector:'.tinymce',menubar:false,height:200,theme:'modern', content_css : "../css/tinymce.css"});</script>

</div><!--End of container-->
			
