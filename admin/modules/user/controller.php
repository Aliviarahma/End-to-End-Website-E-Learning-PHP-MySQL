<?php
require_once ("../../../include/initialize.php");
	 // if (!isset($_SESSION['TYPE'])=='Administrator'){
  //     redirect(web_root."index.php");
  //    }

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

	case 'assign':
	doassignsubj();
	break;

	case 'delsubj':
	doDelsubj();
	break;
	case 'grade':
	savegrade();
	break;
	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){


		if ($_POST['user_name'] == "" OR $_POST['user_email'] == "" OR $_POST['user_pass'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$user = New User();
			// $user->USERID 		= $_POST['user_id'];
			$user->NAME 		= $_POST['user_name'];
			$user->UEMAIL		= $_POST['user_email'];
			$user->PASS			=sha1($_POST['user_pass']);
			$user->TYPE			= "Administrator" ;// $_POST['user_type'];
			$user->create();
			$id =  $mydb->insert_id();
			$student = New Student();
		    $student->IDNO          = $id;
		    $student->FNAME         =  $_POST['user_name'];    
		    $student->USERNAME      = $_POST['user_email'];
		    $student->STUDPASS      = sha1($_POST['user_pass']);
		    // $student->PROIMAGE       = $location;
		    $student->create(); 

						// $autonum = New Autonumber(); 
						// $autonum->auto_update(2);

			message("New [". $_POST['user_name'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		global $mydb;
	if(isset($_POST['save'])){

			$user = New User(); 
			$user->NAME 		= $_POST['user_name'];
			$user->UEMAIL		= $_POST['user_email'];
			$user->PASS			=sha1($_POST['user_pass']);
			$user->TYPE			= "Administrator" ; //$_POST['user_type'];
			$user->update($_POST['user_id']);

			 $sql = "SELECT * FROM `tblstudent` WHERE `IDNO`='".$_POST['user_id']."'";
			 $mydb->setQuery($sql);
			 $mydb->executeQuery();


			  message("[". $_POST['user_name'] ."] has been updated!", "success");
			redirect("index.php");
		}
	}


	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","info");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$user = New User();
		// 	$user->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$user = New User();
	 		 	$user->delete($id);
			 
			message("User already Deleted!","info");
			redirect('index.php');
		// }
		// }

		
	}
?>