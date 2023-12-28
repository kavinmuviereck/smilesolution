<?php include('../config.php');
  if (isset($_SESSION['success']) && ($_SESSION['success'] != "")) {
    $stat['success'] = $_SESSION['success'];
    unset($_SESSION['success']);
  }
  if (isset($_SESSION['error']) && ($_SESSION['error'] != "")) {
    $stat['danger'] = $_SESSION['error'];
    unset($_SESSION['error']);
  } 

  //  to create the main menu
    if (isset($_POST['create'])) {
      if($_FILES['folder_image']['name'])
      {
        // echo 'image';exit;
        if(!empty($_FILES['folder_image']['name']))
        {
          // echo 'img';exit;
         
       
        $fname = $_FILES['folder_image']['name'];
        $maxisize =3145728;
        $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));

        if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png','webp'))) {

            $newfile = md5($_FILES['folder_image']['tmp_name']) . "." . $ext;

            if(($_FILES['folder_image']['size'] >= $maxisize)) 
            {
              $_SESSION['error'] = "Maximum Image Size Is 3mb";
              redirect('sections.php'); 
            }else{
              if (move_uploaded_file($_FILES['folder_image']['tmp_name'], '../gallery-images/'.$newfile)){

                $filename = 'gallery-images/'.$newfile;   
                $categories = array(
                  'section'  => $_POST['section'],                                 
                  'image'  => $filename                                 
                );
        
                $rest = $db->insertAry('section',$categories);   
                
                
  
              }
            }
        } 

        else {

            $filename = "";

            $stat["error"] = "Please Select valid file";

        }

      


        }
      }
        
        if(!is_null($rest)){
          $_SESSION['success'] = "Section Added Successfully.";
          unset($_POST);
          redirect('sections.php');
        }else{ 
          $_SESSION['error'] = "Section Insert Failed !"; 
          redirect('sections.php'); 
        }
    } 

    if (isset($_POST['update'])) {
        $categories = array('section'  => $_POST['section']);
        if($_FILES['folder_image']['name'])
        {
          // echo 'image';exit;
          if(!empty($_FILES['folder_image']['name']))
          {
            // echo 'img';exit;
           
         
          $fname = $_FILES['folder_image']['name'];
          $maximumsize =3145728;
          $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));
  
          if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png','webp'))) {
  
              $newfile = md5($_FILES['folder_image']['tmp_name']) . "." . $ext;

              if(($_FILES['folder_image']['size'] >= $maximumsize)) 
              {
                $_SESSION['error'] = "Maximum Image Size Is 3mb";
                redirect('sections.php'); 
              }else{
                if (move_uploaded_file($_FILES['folder_image']['tmp_name'], '../gallery-images/'.$newfile)){
  
                  $filename = 'gallery-images/'.$newfile;                
    
                }

                $categories = array(
                  'section'  => $_POST['section'],                                 
                  'image'  => $filename                                 
                );
        
                $rest = $db->updateAry('section',$categories,"where id='".$_POST["tableid"]."'");

              }

  

  
          } 
  
          else {
  
              $filename = "";
  
              $stat["error"] = "Please Select valid file";
  
          }
  
        

  
          }
        }
        $rest = $db->updateAry('section',$categories,"where id='".$_POST["tableid"]."'");
       // echo $db->getlastquery();exit;
        if(!is_null($rest)){
          $_SESSION['success'] = "Section Updated successfully.";
          unset($_POST);
          redirect('sections.php');
        }else{ 
          $_SESSION['error'] = "Section Update Failed !"; 
          redirect('sections.php'); 
        }
    } 

?> 
<?php include 'header.php'; ?>
<style>
.avatar-upload .avatar-edit input {

display: none !important;

}
.avatar-upload {

position: relative;
/*max-width: 205px;*/
/*margin: 55px auto;*/

}
.avatar-upload .avatar-edit {
position: absolute;
/* right: 0; */
z-index: 1;
top: 0px;
right: 45px;

}

.avatar-upload .avatar-edit input + label {

display: inline-block;
width: 40px;
height: 40px;
margin-bottom: 0;
border-radius: 100%;
background: #FFFFFF;
border: 1px solid transparent;
/* box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12); */
box-shadow: 0px 0px 18px 0px rgb(54, 102, 185);
cursor: pointer;
font-weight: normal;
transition: all 0.2s ease-in-out;

}
.avatar-upload .avatar-edit label i{
  /*content: "\f040";*/
/*font-family: 'FontAwesome';*/
color: #6b6b6b;
position: absolute;
top: 11px;
left: 0;
right: 0;
font-size: 17px;
text-align: center;
margin: auto;
}
/*.avatar-upload .avatar-edit input + label::after {

content: "\f040";
font-family: 'FontAwesome';
color: #e53031;
position: absolute;
top: 6px;
left: 0;
right: 0;
text-align: center;
margin: auto;

}*/
.avatar-upload .avatar-preview {

width: 195px;
height: 195px;
position: relative;
border-radius: 100%;
/* border: 6px solid #F8F8F8; */
/* box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1); */
box-shadow: 0 5px 15px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);
margin: 0 auto 1em;

}
.avatar-upload .avatar-preview > div {

width: 100%;
height: 100%;
border-radius: 100%;
background-size: cover;
background-repeat: no-repeat;
background-position: center;

} 
</style>
</head>

<body >
   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header light-blue darken-3 white-text">
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="title"><i class="fa fa-pencil-alt"></i> EDIT</h4>
        </div>
        <!--Body-->
        <div class="modal-body mb-0">
          <form action="" method="post" id="featuredCategory" enctype="multipart/form-data">
            <div id="divLoad"></div>
            <div class="text-center">
              <button type="submit" name="update" id="btnUpdateCatg"  class=" btn btn-success button-update mgt-20"><i class="fa fa-check" aria-hidden="true"></i> Update
              </button>
              <button type="button" data-dismiss="modal" class="btn btn-warning button-cancel mgt-20"><i class="fa fa-times"></i> Cancel</button>
            </div>
            <br/>
          </form>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!-- modal ends -->
<!--------------------->
  <div id="wrapper">

      <!-- Navigation -->
     <?php include 'menu.php';?>

      <!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid pdt-20">
                                
            <?php //alert
                if (isset($stat) && $stat != "") {
                    echo msg($stat);
                }
            ?>
        <div class="row panel panel-default mgt-20"  >
          <div class="panel-heading">
            <h1 class="white-text page-heading">Gallery Sections</h1>
          </div>
          <div class="panel-body">
          <div class="ac_course_add">           
          <button id="ADD" class="btn btn-info button-addnew pull-right" ><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add New &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>
          </button>
          <br/><br/>
          </div> 
          <form  action="" method="post" enctype="multipart/form-data">
            <div id="content" class="panel panel-default">
              <div class="panel-body">
            
                <div class="col-md-4 mgt-20 ">
                  <label>Section<span class="redstar">* (maximum 30 charcters are allowed)</span></label>
                  <input type="text" name="section" class="form-control" placeholder="Title" required="" style="margin-bottom: 20px;" pattern="^[a-z A-Z]{2,50}$" maxlength="30">
                  <span style="color: red;">(Note:upload Imgae Size of 500*500px And below 3mb of Image Size Are Allowed)</span>
                  <input type="file" accept="image/png, image/jpeg, image/gif" name="folder_image"  id="" class="form-control" required>
                </div>
                <div class="col-md-3 text-right" style="padding-top: 35px">
                  <button class="btn btn-success" id="addnew" type="submit" name="create" ><i class="fa fa-check" aria-hidden="true"></i> Save</button>
                  <button type="reset" class="btn danger-gradient btn-warning"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
                </div>
              </div>
              </div>
          </form>
          <div class="row">
            <div class="">
              <div class="panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th width="50px">S.No</th>
                          <th>Section</th>                       
                          <th>Folder Image</th>                       
                          <th width="60px" class="text-center ac_course_view">View</th>
                          <th width="60px" class="text-center ac_course_edit">Edit</th>
                          <th width="60px" class="text-center ac_course_delete">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                              $counter = 0;
                              $courses = $db->getRows("SELECT * from section");
                              if( count($courses) > 0){
                                foreach($courses as $data){ 
                                  $album_id = $data["id"];
                                  $section = $data["section"]; 
                                  $folder_image = $data['image'];  
                                  // echo $folder_image;exit;  
                                  $counter++;
                                ?>
                              <tr class="odd gradeX">
                                <td><?php echo $counter ?> </td>
                                <td><?php echo $section ?> </td> 
                                <td><img src="../<?= $folder_image ?>" alt="" width="50px"></td>     
                                <td>
                                 <button class="btn btn-success btn-circle" onclick="window.location.href='gallery_image.php?id=<?= $album_id ?>'" ><i class="fas fa-angle-double-right"></i>
                                  </button></td>                          
                                <td class="text-center ac_course_edit">
                                  <button class="123 btn btn-primary btn-circle  btnCategoryEdit" data-toggle="modal" data-target="#myModal" name="edit" data-id="<?php  echo $album_id ?>" data-myvalue="<?php  echo  $album_id?>" ><i class="fa fa-pencil-alt"></i>
                                  </button>
                                </td>
                                <td class="text-center ac_course_delete">
                                  <button type="button" id="delet" onclick="DeleteConfirmation(this,'section')" name="delet" value="<?php  echo $album_id ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>
                                  </button>
                                </td>
                              </tr>

                              <?php  } } ?>
  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- /#footer -->
    <?php include 'footer.php'; ?>
    <!-- /#ends -->


<script>
$(document).ready(function(){
    $("#ADD").click(function(){
        $("#content").toggle();
    });
    $('#dataTables-example').DataTable({
     responsive: true
    });
});
 $("#content").toggle();

  $(document).on("click",".btnCategoryEdit",function( event ) {
      event.preventDefault();
      var value = $(this).attr('data-id');
      $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: 'action=edit_section&Id='+value,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#divLoad').empty().append(data);        
      })
      $('#myModal').modal('show');
      return false;
    });

function DeleteConfirmation(e,tablename) {

  var id = e.value;
  // var tablename = 'attribute';
  // call jquery confirm plugin
  $.confirm({
    icon: 'fa fa-warning',
    title: 'Confirm!',
    content: 'Do you want to Delete ?',
    type: 'red',
    buttons: {
      confirm:  {
        btnClass: 'btn-red',
        action: function(){
          $.confirm({
            icon: 'fa fa-warning',
            title: 'Confirm!',
            content: 'If you Delete, You cant restore this record !',
            type: 'red',
            buttons: {
              Okay: {
                btnClass: 'btn-red',
                action: function(){
                  $.ajax({
                    type: 'post',
                    url: 'ajax.php',
                    data: 'action=delete-section&Id='+id+'&TableName='+tablename,
                    dataType: "json",
                    success: function (data) {
                      if(data['validation'] == '1'){
                        $.confirm({
                          icon: 'fa fa-check',
                          title: '',
                          content: data['message'],
                          type: 'green',
                          autoClose: 'Okay|1000',
                          buttons: {
                            Okay: function () {
                              window.location.reload();
                            }
                          }
                        });
                      }
                      else{
                        $.alert(data['message']);
                      }
                    }
                  });
                }
              },
              Cancel: function () { },
            }
          });
        }
      },
      cancel: function () { },
    }
  });
}

</script>

</body>

</html>
