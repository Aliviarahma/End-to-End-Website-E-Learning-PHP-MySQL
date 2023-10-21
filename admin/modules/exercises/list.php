<?php
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

?>
    <div class="row">
      <div class="col-lg-12"> 
            <h1 class="page-header">List of Question <small>|  <label class="label label-xs" style="font-size: 12px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa"></i> New</a></label> |</small></h1> 
       		 
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-bordered table-hover" cellspacing="0" style="font-size:12px" >
				
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>Lesson</th>
				  		<th>Question</th>
				  		<th>A</th>
				  		<th>B</th>
				  		<th>C</th>
				  		<th>D</th>
				  		<th>Answer</th>
				  		<th width="10%">Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php  
				  		$mydb->setQuery("SELECT * FROM `tbllesson` l, `tblexercise` e WHERE l.`LessonID`=e.`LessonID`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->LessonTitle.'</a></td>'; 
				  		echo '<td>' . $result->Question.'</a></td>'; 
				  		echo '<td>' . $result->ChoiceA.'</a></td>'; 
				  		echo '<td>' . $result->ChoiceB.'</a></td>'; 
				  		echo '<td>' . $result->ChoiceC.'</a></td>'; 
				  		echo '<td>' . $result->ChoiceD.'</a></td>'; 
				  		echo '<td>' . $result->Answer.'</a></td>'; 
				  		echo '<td > <a title="Edit" href="index.php?view=edit&id='.$result->ExerciseID.'" class="btn btn-primary btn-xs" ><i class="fa fa-pencil fa-fw"></i></a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->ExerciseID.'" class="btn btn-danger btn-xs" ><i class="fa fa-bitbucket  fa-fw"></i> </a>
				  					 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
				 
			
				</form>
	 