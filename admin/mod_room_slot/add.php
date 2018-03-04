
<?php
$con=mysqli_connect("localhost", "root","");
mysqli_select_db($con, "aplayadb");
?>
<!--End of Header-->
<div class="container">
  <div class="col-xs-12 col-sm-12">
    <!--<div class="jumbotron">-->
    <div class="">
      <!--    <div class="panel panel-default">
        <div class="panel-body">   -->
          <p class="bg-warning">
            
            <!-- <?php
            echo '<div class="alert alert-info" ><strong>From:'.$arrival. ' To: ' .$departure.'</strong>  </div>';
          ?> --></p>
          <legend><h2 class="text-left">Check In</h2></legend>
          
          <form class="" method="GET" action="controller.php">
            <div class="main-content common-padding clearfix">
              <div class="container">
                <div class="col-xs-12 col-sm-12" role="navigation">
                  <div class="panel panel-inverse">
                    <div class="row">
                      <input type="hidden" name="action" value="add">
                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "name">Firstname:</label>
                            <div class="col-md-8">
                              <input name="" type="hidden" value="">
                              <input name="fname" type="text" class="form-control input-sm" id="name" required="required" placeholder="First Name"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "last">Lastname:</label>
                            <div class="col-md-8">
                              <input name="lname" type="text" class="form-control input-sm" id="last" required="required" placeholder="Last Name"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "address">Address:</label>
                            <div class="col-md-8">
                              <input name="address" type="text" class="form-control input-sm" id="address" required="required" placeholder="Address"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "phone">Phone:</label>
                            <div class="col-md-8">
                              <input name="phone" type="number" class="form-control input-sm" id="phone" required="required" placeholder="Phone #"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        
                        
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "email">Email Address:</label>
                            <div class="col-md-8">
                              <input name="email" type="text" class="form-control input-sm" id="email" required="required" placeholder="Valid Email Address"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                          <div class="col-md-8">
                            <label class="col-md-4 control-label" for=
                            "password">Password:</label>
                            <div class="col-md-8">
                              <input name="password" type="password" class="form-control input-sm" id="password" required="required" value="123456" placeholder="Password"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>


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
      
