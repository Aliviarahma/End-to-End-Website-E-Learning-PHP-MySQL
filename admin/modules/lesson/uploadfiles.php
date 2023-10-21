<?php  
    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}

  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);

?> 
 
 <form class="form-horizontal span6" action="controller.php?action=updatefiles" method="POST" enctype="multipart/form-data">

           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Files</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

        <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonChapter">Chapter:</label>

                      <div class="col-md-10">
                        <input name="LessonID" type="hidden" value="<?php echo $res->LessonID; ?>">
                        <label class="control-label"><?php echo $res->LessonChapter; ?></label>
                      </div>
                    </div>
                  </div>
                      
                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonTitle">Title:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                        <label class="control-label"><?php echo $res->LessonTitle; ?></label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "Category">File Type:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <label class="control-label"><?php echo $res->Category ?></label>
                      </div>
                    </div>
                  </div>
 

             <div class="form-group">
              <div class="col-md-11">
                <label class="col-md-2" align = "right"for=
                "file">Upload File:</label>

                <div class="col-md-10"> 
                <input type="file" name="file" value="<?php echo $res->FileLocation; ?>" />
                </div>
              </div>
            </div>
 
             <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "idno"></label>

                      <div class="col-md-10">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                         </div>
                    </div>
                  </div> 
        </form> 
 