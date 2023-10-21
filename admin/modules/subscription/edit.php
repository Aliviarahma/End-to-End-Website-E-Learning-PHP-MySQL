<?php  
  @$IDNO = $_GET['id'];
 @$syid = $_GET['sy'];
  if($IDNO=='' OR $syid==''){
  redirect("index.php");
}
  $student = New Student();
  $singlestudent = $student->single_students($IDNO);

   $sy = New Schoolyear();
  $singlesy = $sy->single_sy($syid);

  ?>

 
 <style type="text/css">
.sidebar-left .main{
  float:right;
}
.idebar-left .sidebar{
  float:left;
}

.sidebar-right .main{
  float:left;
}
.idebar-right .sidebar{
  float:right;
}
 
</style>
 
        
       <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"  />
  
        
          <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Edit Student</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div>
                
                         <input  id="IDNO" name="IDNO"  type="hidden" value="<?php echo $singlestudent->IDNO; ?>">
                        <input   id="SYID" name="SYID"  type="hidden" value="<?php echo $singlesy->SYID; ?>">
               
                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FNAME">First Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                            "First Name" type="text" value="<?php echo $singlestudent->FNAME; ?>" required>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "MNAME">Middle Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                            "Middle Name" type="text" value="<?php echo $singlestudent->MNAME; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "LNAME">Last Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                            "Last Name" type="text" value="<?php echo $singlestudent->LNAME; ?>" required>
                      </div>
                    </div>
                  </div>


                      <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COURSE">Course:</label>

                      <div class="col-md-8">
                            <select class="form-control input-sm" name="COURSE" id="COURSE"> 
                                  <?php  
                                    $mydb->setQuery("SELECT * 
                                            FROM  `tblcourse` WHERE COURSEID='".$singlesy->COURSEID."'");
                                    $cur = $mydb->loadResultList();

                                      foreach ($cur as $result) { ?>

                              <option value="<?php echo $result->COURSEID; ?>"><?php echo $result->DESCRIPTION; ?></option>
                                   <?php }  


                                    $mydb->setQuery("SELECT * 
                                      FROM  `tblcourse` WHERE COURSEID<>'".$singlesy->COURSEID."'");
                                      $cur = $mydb->loadResultList();

                                        foreach ($cur as $result) { ?>

                              <option value="<?php echo $result->COURSEID; ?>"><?php echo $result->DESCRIPTION; ?></option>
                                        <?php } ?>



                              </select>
         
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SEMESTER">Semester:</label>

                      <div class="col-md-4">
                         <select class="form-control input-sm" name="SEMESTER" id="SEMESTER">
                         <?php  
                          if($singlesy->SEMESTER=='First'){
                            echo '  <option SELECTED>First</option>
                                    <option>Second</option> ';
                          }else{
                            echo '  <option >First</option>
                                    <option SELECTED>Second</option> ';

                          }
                         ?> 
                        </select>
                      </div>
                    </div>
                  </div>

                       <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "yearpickerfrom">School Year:</label>

                        <!-- has a limit <div class="col-md-4 input-append date" id="dpYears" data-date="12-02-2012" data-date-format="mm/dd/yyyy" data-date-viewmode="years"> -->
                       <div class="col-md-2 input-append date"    data-date-format="yyyy" data-date-viewmode="years">
                    
                         <input   class="form-control input-sm" id="date_pickerfrom" name="yearpickerfrom" placeholder="yyyy"   type="text" value="<?php echo $singlesy->SYFROM; ?>" size="4">
                    <!--   <span class="add-on"><i class="glyphicon-calendar"></i></span> -->
                      </div>
                       <label class="col-md-1 control-label" for=
                      "To"> To </label>
                        <!-- has a limit <div class="col-md-4 input-append date" id="dpYears" data-date="12-02-2012" data-date-format="mm/dd/yyyy" data-date-viewmode="years"> -->
                       <div class="col-md-2 input-append date"    data-date-format="yyyy" data-date-viewmode="years">
                    
                         <input   class="form-control input-sm" id="date_pickerto" name="yearpickerto" placeholder="yyyy"  type="text" value="<?php echo $singlesy->SYTO; ?>" size="4">
                    <!--   <span class="add-on"><i class="glyphicon-calendar"></i></span> -->
                      </div>
                    </div>
                  </div>

 
                <!--   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                            "Address" type="text" value="<?php echo $singlestudent->ADDRESS; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "RELIGION">Religion:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="RELIGION" name="RELIGION" placeholder=
                            "Religion" type="TEXT" value="<?php echo $singlestudent->RELIGION; ?>" required>
                      </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "STATUS">Civil Status:</label>

                      <div class="col-md-4">
                         <select class="form-control input-sm"  name="STATUS" id="STATUS">
                           <option>Single</option>
                         <option>Married</option>
                        <option>Widow</option> 
                        </select>
                      </div>
                    </div>
                  </div>
 -->
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PHONE">Contact No.:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PHONE" name="PHONE" placeholder=
                            "Contacat Number" type="text" value="<?php echo $singlestudent->PHONE; ?>" required>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "EMAILADD">Email Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="EMAILADD" name="EMAILADD" placeholder=
                            "Example@gmail.com" type="TEXT" value="<?php echo $singlestudent->EMAILADD; ?>" required>
                      </div>
                    </div>
                  </div>

 
                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn btn_kcctc" name="save" type="submit" >Save</button> 
                        <a href="index.php?view=view&id=<?php echo $IDNO; ?>&sy=<?php echo $syid; ?>" class="btn btn_kcctc" name="back" type="submit"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp;Student Profile</a>
                      </div>
                    </div>
                  </div>
 
<!--/.fluid-container-->
 
 </form>