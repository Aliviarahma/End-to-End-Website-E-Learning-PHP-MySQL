<style type="text/css">

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

.main-container{
    width: 80vw;
    margin: 10px auto;
    padding: 30px 0;
    border-radius: 20px;
}
.styled-table thead tr {
    background-color: #f0544f;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
</style>

<div class = "main-container">
<center><h1><?php echo $title;?></h1></center>
<table class="styled-table">
    <thead>
        <tr>
           <th>#</th>
			<th>Title</th>
			<th>Caption</th> 
			<th>Category</th> 
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
				  	<?php    
				  		$mydb->setQuery("SELECT * 
											FROM  `tbllesson`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>'; 
				  		echo '<td>'. $result->LessonChapter.'</td>';
				  		echo '<td>'. $result->LessonTitle.'</td>'; 
				  		echo '<td>'. $result->Category.'</td>';
					echo '<td><a href="'.web_root.'admin/modules/lesson/'.$result->FileLocation.'" class="btn btn-xs btn-info" download><i class="fa fa-download"></i> Downlaod</a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
</table>
</div>