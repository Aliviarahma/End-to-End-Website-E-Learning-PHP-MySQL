                      <?php 
                    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}

                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

                       ?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Upload New Lesson</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

            <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonChapter">Title:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="LessonChapter" name="LessonChapter" placeholder=
                            "Chapter" type="text" value="">
                      </div>
                    </div>
                  </div>
                      
                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonTitle">Caption:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="LessonTitle" name="LessonTitle" placeholder=
                            "Title" type="text" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "Category">Select Category:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <select class="form-control input-sm" id="Category" name="Category" >
                            <option>Python</option>
                            <option>Java</option>
                            <option>PHP</option>
                            <option>HTML</option>
                            <option>Sql</option>
                         </select>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2" align = "right"for=
                      "file">Upload File:</label>

                      <div class="col-md-10">
                      <input type="file" name="file"/>
                      </div>
                    </div>
                  </div>
 

                  <!-- <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "image">Upload Image:</label>

                      <div class="col-md-8">
                      <input type="file" name="image" value="" id="image"/>
                      </div>
                    </div>
                  </div> -->
                  
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