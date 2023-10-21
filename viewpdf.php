<style type="text/css">

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

.main-container{
    width: 80vw;
    margin: 0 auto;
    padding: 20px 0;
    border-radius: 20px;
}

</style>

<div class = "main-container">
<?php  
  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);

?>


<center><h2><?php echo $res->LessonChapter;?></h2>
<p style="font-size: 18px;font-weight: bold;"><?php echo $res->LessonTitle;?></p></center>


<button>
	<?php 
				$sql = "SELECT * FROM tbllesson WHERE Category='Python' OR 'Java' OR 'PHP' OR 'HTML' OR 'Sql'";
				$mydb->setQuery($sql);
				$cur = $mydb->loadResultList();
				foreach ($cur as $result) {
					# code...
					
					echo '<td><a href="'.web_root.'admin/modules/lesson/'.$result->FileLocation.'" class="btn btn-xs btn-info" download><i class="fa fa-download"></i> Download</a></td>';	
				}
	?>
</button>


<div class="container">
	<embed src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="application/pdf" width="100%" height="450px" />
</div> 
</div>
