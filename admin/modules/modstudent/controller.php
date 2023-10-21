<?php
require_once ("../../../include/initialize.php");
	 

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

	case 'photos' :
	doupdateimage();
	break;

	case 'confirm' :
	doConfirmed();
	break;

	case 'remove' :
	doRemoved();
	break;
 
	}

   
function doInsert(){
	if(isset($_POST['studsave'])){
	 	 	
					// if ($_POST['LNAME'] == "" OR $_POST['LNAME'] == "" OR $_POST['PHONE'] == "") {
					// $messageStats = false;
					// message("All fields are required!","error");
					// redirect('index.php?view=add');
					// }else{


					
						  
						$student = New Student();
						$student->IDNO 			= $_POST['IDNO'];
						$student->FNAME 		= $_POST['FNAME'];
						$student->MNAME 		= $_POST['MNAME'];
						$student->LNAME 		= $_POST['LNAME'];
						// $student->ADDRESS 		= $_POST['ADDRESS'];
						// $student->RELIGION 		= $_POST['RELIGION'];
						// $student->STATUS 		= $_POST['STATUS']; 
						$student->PHONE 		= $_POST['PHONE'];
						$student->EMAILADD 		= $_POST['EMAILADD'];
						$student->STUDPASS 		= sha1($_POST['IDNO']);
						// $student->PROIMAGE 		= $location;
						$student->create(); 
 
						$parent = New Parents();
						$parent->IDNO 			= $_POST['IDNO'];
						$parent->create(); 


						$schoolyear = New Schoolyear();
						$schoolyear->IDNO 			= $_POST['IDNO'];
						$schoolyear->SYFROM 		= $_POST['yearpickerfrom'];
						$schoolyear->SYTO 			= $_POST['yearpickerto'];
						$schoolyear->SEMESTER 		= $_POST['SEMESTER'];
						$schoolyear->COURSEID 		= $_POST['COURSE']; 
						$schoolyear->create();	


						// $work = New Work();
						// $work->IDNO 			= $_POST['IDNO'];
						// $work->create();

						// $autonum = New Autonumber(); 
						// $autonum->auto_update(1);

						message("New [". $_POST['LNAME'] ."] created successfully!", "success");
						redirect("index.php");
						// }
							
					}
	 
	  }
 
	function doEdit(){
		if(isset($_POST['save'])){

			
			$student = New Student();
			$student->IDNO 			= $_POST['IDNO'];
			$student->FNAME 		= $_POST['FNAME'];
			$student->MNAME 		= $_POST['MNAME'];
			$student->LNAME 		= $_POST['LNAME']; 
			// $student->ADDRESS 		= $_POST['ADDRESS'];
			// $student->RELIGION 		= $_POST['RELIGION'];
			// $student->STATUS 		= $_POST['STATUS']; 
			$student->PHONE 		= $_POST['PHONE'];
			$student->EMAILADD 		= $_POST['EMAILADD'];
			$student->STUDPASS 		= sha1($_POST['IDNO']);
			$student->update($_POST['IDNO']);



			$schoolyear = New Schoolyear();
			$schoolyear->IDNO 			= $_POST['IDNO'];
			$schoolyear->SYFROM 		= $_POST['yearpickerfrom'];
			$schoolyear->SYTO 			= $_POST['yearpickerto'];
			$schoolyear->SEMESTER 		= $_POST['SEMESTER'];
			$schoolyear->COURSEID 		= $_POST['COURSE']; 
			$schoolyear->update($_POST['SYID']);	
 

			message("[". $_POST['LNAME'] ."] has been updated!", "success");
			redirect("index.php");
		}
	}


	function doDelete(){

  

		if (isset($_POST['selector'])==''){
			message("Select the records first before you delete!","error");
			redirect('index.php');
			}else{

			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){ 

			$student = New student();
			$student->delete($id[$i]);

 			$sy = new Schoolyear();
 			$sy->delete($id[$i]);


			$parent = New Parents();
			$parent->delete($id[$i]);

		
			message("student has been Deleted!","info");
			redirect('index.php');

			}
		}

	}
		 
	function doupdateimage(){


// 		$fp = fopen($_FILES['photo']['tmp_name'], "r");
 
// if ($fp) {
 
//      $content = fread($fp, $_FILES['photo']['size']);
 
//      fclose($fp);
 
//      $content = addslashes($content);

       
// 	$student = New Student();
// 	$student->STUDPIC 			=  $content;
// 	$student->update($_POST['MIDNO']);
// 	redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);

 
   
 // 	 $image = $_FILES['photo'] ;
 //        // print_r($image);
 //        $name = $_FILES['photo']['name'] ;
 //        $image = addslashes(file_get_contents($_FILES['photo']['tmp_name'])) ; 

	// $student = New Student();
	// $student->PROIMAGE 			=  $name;
	// $student->image 			=  $image;
	// $student->update($_POST['MIDNO']);
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location=  "student_image/".$myfile;

		  


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);
		}else{
	 
				@$file= $_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);
			}else{
				

					//uploading the file
				 move_uploaded_file($temp, "student_image/" . $myfile);
		 	
					$student = New Student();
					$student->PROIMAGE 			= $location;
					$student->image 			=  $image;
					$student->update($_POST['MIDNO']);

						// $student = New Student();
						// $student->STUDPIC 			= $_FILES['photo']['name'];
						// $student->update($_POST['MIDNO']);

						redirect("index.php?view=view&id=".$_POST['MIDNO']."&sy=".$_POST['SYID']);
						 
							
					}
			}
			 
		} 


		function doConfirmed(){
			$student = new Student();
			$student->STUDENTINSCHOOL = 1;
			$student->update($_GET['id']);


			message("student already confirmed!","info");
			redirect('index.php');
		}

		function doRemoved(){

			$student = New student();
			$student->delete($_GET['id']);

 			$sy = new Schoolyear();
 			$sy->deleteAll($_GET['id']);

 			$work = new WOrk();
 			$work->deleteAll($_GET['id']);


 			message("student already removed!","info");
			redirect('index.php');

		}
 
?>