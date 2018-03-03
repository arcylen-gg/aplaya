<link rel="stylesheet" type="text/css" href="../css/tinymce.css">
<form class="form-horizontal well span6" action="controller.php?action=add" enctype="multipart/form-data" method="POST">

	<fieldset>
		<legend>New Amenities</legend>
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "name">Name:</label>

              <div class="col-md-8">
              	<input name="" type="hidden" value="">
                 <input class="form-control input-sm" id="name" name="name" placeholder=
									  "Amenities Name" type="text" value="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "rmtype">Amenities Type:</label>

              <div class="col-md-8">
              <select class="form-control input-sm" name="rmtype" id="rmtype"> 
                  	<option value="None">None</option>
                  	<?php
                  	$rm = new Roomtype();
                  	$cur= $rm->listOfroomtype();
                  	foreach ($cur  as $rmtype) {
                  		echo '<option value='.$rmtype->typeID.'>'.$rmtype->typename.'</OPTION>';
                  	}

                  	?>
                  </select>	
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "price">Rate per hour:</label>

              <div class="col-md-8"> 
                <input class="form-control input-sm" id="price" name="price" placeholder=
									  "Rate per hour" type="text" value="" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>
          
           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "adult">Pax:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="adult" name="adult" placeholder=
									  "Pax" type="text" value="" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div>

          <!--  <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "children">Children:</label>

              <div class="col-md-8">
                <input class="form-control input-sm" id="children" name="children" placeholder=
									  "Children" type="text" value="" onkeyup="javascript:checkNumber(this);">
              </div>
            </div>
          </div> -->

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for="description">Description:</label>
              <div class="col-md-8">
                <textarea name="description" id="description" class="tinymce input-sm form-control"></textarea>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "image">Upload Image:</label>

              <div class="col-md-8">
              <input type="file" name="image" value="" id="image">
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
			
