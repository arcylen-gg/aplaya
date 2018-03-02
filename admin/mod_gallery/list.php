
<div class="container">
    <?php
        check_message();
            
        ?>
        <!-- <div class="panel panel-primary"> -->
            <div class="panel-body">
            <h3 align="left">Gallery</h3>
                <form action="controller.php?action=delete" Method="POST">                      
                <table id="example" class="table table-striped" cellspacing="0">
                    
                  <thead>
                      <tr  >
                      <th>No.</th>
                          <th align="left"  width="120">
                           <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
                          Gallery</th>
                         
                          
                 
                      </tr>    
                  </thead>
                  <tbody>
                      <?php 
                          /*$mydb->setQuery("SELECT *,typeName FROM room ro, roomtype rt WHERE gallery_img = 1 and ro.typeID = rt.typeID");*/
                          $mydb->setQuery("SELECT *, typeName FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID WHERE room.gallery_img = 1");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo '<tr>';
                        echo '<td width="5%" align="center"></td>';
                          echo '<td align="left"  width="120"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->roomNo. '"/> 
                                  <a href="index.php?view=editpic&id='.$result->roomNo.'"" title="Click here to Change Image."><img src="'. $result->roomImage.'" width="60" height="60" title="<?php echo $roomName; ?>"/></a>
                                  
                                </td>';
                          echo '<td> <a href="index.php?view=editpic&id='.$result->roomNo.'"" title="Click here to Change Image."> <span class="glyphicon glyphicon-pencil">&nbsp;Update Image</a> </td>';


                          
                          echo '</tr>';
                      } 
                      ?>
                  </tbody>
                     
                </table>
                <div class="btn-group">
                  <a href="index.php?view=add" class="btn btn-default">New</a>
                  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
                </div>
                </form>
              </div><!--End of Panel Body-->
          <!-- </div> -->
          <!--End of Main Panel-->

</div><!--End of container-->

