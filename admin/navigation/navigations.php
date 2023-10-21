<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>CodeLearn</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"/>
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen"/>  
<link href="<?php echo web_root; ?>css/alumni.css" rel="stylesheet" media="screen"/>
<link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet"/>   
<!-- <link href="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.css" rel="stylesheet"/>   -->

<link rel="stylesheet" href="<?php echo web_root; ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo web_root; ?>css/jquery-ui.css"> 
<!-- <link rel="stylesheet" href="<?php echo web_root; ?>web/viewer.css">  -->
<!-- Plugins -->

 <style type="text/css">

 </style>
<!-- Custom styles for this template -->
<!-- <link href="<?php echo web_root; ?>css/offcanvas.css" rel="stylesheet"> -->
   <?php
   admin_confirm_logged_in();
  ?>
<body>
 <section id="navigation">
<nav class="navbar navbar-default  " role="navigation" style="margin-top: 0px">

<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand"  href="<?php echo web_root; ?>admin/index.php" >CodeLearn: Admin Dashboard! </a>
</div>

  <ul class="nav navbar-top-links navbar-right" >
   <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" >
                <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['NAME']; ?>  
            </a> 

    </li>
         <li><a href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
  </ul>

<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
            <!--     <li>
                    <a href="<?php echo web_root; ?>admin/index.php"><i class="fa fa-dashboard fa-fw"></i> Statistic</a>
                </li> -->

                <li>
                     <a href="<?php echo web_root; ?>admin/modules/lesson/index.php"><i class="fa fa-user fa-fw"></i> Lesson </a> 
                </li>
               <!--  <li>
                     <a href="<?php echo web_root; ?>admin/modules/learning/index.php"><i class="fa fa-user fa-fw"></i> Learning Track </a> 
                </li>
                 -->
              <li>
                     <a href="<?php echo web_root; ?>admin/modules/subscription/index.php"><i class="fa fa-user fa-fw"></i> Subscription </a> 
                </li>
                 <li>
                     <a href="<?php echo web_root; ?>admin/modules/modstudent/index.php"><i class="fa fa-user fa-fw"></i> Student </a> 
                </li>

                
                <li><a href="<?php echo web_root; ?>admin/modules/user/index.php"><i class="fa fa-user fa-fw"></i> Manage Users</a></li>
                 <!-- <li><a href="<?php echo web_root; ?>admin/modules/autonumber/index.php"><i class="fa fa-reload fa-fw"></i> Autonumber</a></li> -->
                 <!-- <li><a href="<?php echo web_root; ?>admin/modules/report/index.php"><i class="fa fa-info fa-fw"></i> Report</a></li> -->

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
</nav>
</section>


<section id="page-wrapper"> 
  <?php  check_message(); ?> 
  <?php  require_once $content;?>  
 </section> 

<section id="page-footer"> 
      <footer>  <p align="center">&copy; CodeLearn </p></footer>
</section>
<!-- Plugins -->

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.js"></script> 
<script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
<script src="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.js"></script>
 

</body>
</html>
