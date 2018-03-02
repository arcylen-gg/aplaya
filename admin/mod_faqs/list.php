<div class="container">
	<?php
		check_message();
			
		?>
		<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
			<h3 align="left">List of FAQs</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
					<table id="example" class="table table-striped" cellspacing="0">
					
				  <thead>
				  	<tr >
				  		<th>No.</th>
				  		<th>  
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  
				  		 Question</th>
				  		<th>Description</th>
							 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$faqs = new Faqs();
				  		$cur = $faqs->listOfFaqs();
				  		
						foreach ($cur as $result) {
				  		echo '<tr>';
						echo '<td width="5%" align="center"></td>';
				  		echo '<td width="20%" align="left"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->faqs_id. '"/>
				  				<a  href="index.php?view=edit&id='.$result->faqs_id.'">  <span class="glyphicon glyphicon-pencil">
				  				<a href="index.php?view=view&id='.$result->faqs_id.'">' . ' '.$result->faqs_name.'</a></td>';
				  		echo '<td>'. $result->faqs_desc.'</td>';
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

