<?php
require_once ("../../../include/initialize.php");
	if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'updatefiles' :
	dochangefile();
	break;

 
	}
   
	function doInsert(){ 
		if(isset($_POST['save'])){ 

			$chapter = $_POST['LessonChapter'];
			$title  = $_POST['LessonTitle'];
			$category = $_POST['Category'];

			$filename = UploadImage();
			$location = "files/". $filename ;

			$lesson = new Lesson();
			$lesson->LessonChapter = $chapter;
			$lesson->LessonTitle   = $title;
			$lesson->FileLocation  = $location;
			$lesson->Category  = $category;
			$lesson->create(); 

			message("Lesson has been saved in the database.", "success");
			redirect("index.php");
			
		}  
	}

	function doEdit(){ 
		if(isset($_POST['save'])){  
			$chapter = $_POST['LessonChapter'];
			$title  = $_POST['LessonTitle'];
			$id = $_POST['LessonID'];
			$category = $_POST['Category'];

 
				// $filename = UploadImage();
				// $location = "files/". $filename ;

				$lesson = new Lesson();
				$lesson->LessonChapter = $chapter;
				$lesson->LessonTitle   = $title;
				$lesson->Category  = $category;
				// $lesson->FileLocation  = $location;
				$lesson->update($id); 

				message("Lesson has been saved in the database.", "success");
				redirect("index.php");
		 

			
	 		
		}
	}


	function doDelete(){
		 
			$id = 	$_GET['id'];

			$lesson = New Lesson();
			$lesson->delete($id);
 
			message("Lesson has been removed!","info");
			redirect('index.php');
		 
		
	}


	function dochangefile(){
		if(isset($_POST['save'])){   
			$id = $_POST['LessonID']; 

 
				$filename = UploadImage();
				$location = "files/". $filename ;

				$lesson = new Lesson(); 
				$lesson->FileLocation  = $location;
				$lesson->update($id); 

				message("File has been updated in the database.", "success");
				redirect("index.php");
		 

			
	 		
		}
	}

 
 
  function UploadImage(){
			$target_dir = "files/";
		    $target_file = $target_dir  . basename($_FILES["file"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			
			if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
				|| $imageFileType != "gif" || $imageFileType != "docs" || $imageFileType != "mp4") {
				 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
					return   basename($_FILES["file"]["name"]);
				}else{
					echo "Error Uploading File";
					exit;
				}
			}else{
					echo "File Not Supported";
					exit;
	 }
} 

	 
 
?>