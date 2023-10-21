<?php
		check_message(); 
		?> 
<style type="text/css">
	#example {
		white-space: nowrap;
	}
</style>
  <div class="row">
      <div class="col-lg-12"> 
            <h1 class="page-header">List of Membership<!--  <small>|  <label class="label label-xs" style="font-size: 12px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa"></i> New</a></label> |</small> --></h1> 
       		 
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example"  class="table table-striped table-bordered table-hover" cellspacing="0" style="font-size:12px" >
					
				  <thead>
				  	<tr> 
				  		  <th>Name</th>
				  		  <th>Email</th> 
				  		<th>Phone</th>  
				  		 <th>Plan</th> 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
				  		$query = "SELECT * FROM `registrations`";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>'; 
				  		echo '<td>'.$result->name. '</td>';
				  		echo '<td>'. $result->email .'</td>'; 
				  		echo '<td>'.$result->phone. '</td>'; 
				  		echo '<td>'. $result->plan.'</td>'; 

				  		 
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>
				<div class="btn-group">
				</div>
				</form> 