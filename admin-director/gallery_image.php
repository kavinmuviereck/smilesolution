<?php include('../config.php');

$section_id = $_GET['id'];

  if (isset($_SESSION['success']) && ($_SESSION['success'] != "")) {

    $stat['success'] = $_SESSION['success'];

    unset($_SESSION['success']);

  }

  if (isset($_SESSION['error']) && ($_SESSION['error'] != "")) {

    $stat['danger'] = $_SESSION['error'];

    unset($_SESSION['error']);

  } 

$section_name = $db->getRow("select section from section where id='$section_id'");

if(count($section_name)>0){



}

else{

  redirect('sections.php');

}

  //  to create the main menu

    if (isset($_POST['create'])) {



      for ($i = 0; $i < count($_FILES['image']['name']); $i++) {

      $filename='';

      if (isset($_FILES['image']['name'][$i])) {  
        
        if(!empty($_FILES['image']['name'][$i]))
        {
          // echo 'img';exit;
         
       
        $fname = $_FILES['image']['name'][$i];

      
        $maxsize    =3145728;

        $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));

        if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png','webp'))) {

            $newfile = md5($_FILES['image']['tmp_name'][$i]) . "." . $ext;
            // echo $_FILES['image']['size'];exit;
            // echo $_FILES['image']['size'][$i];
            if(($_FILES['image']['size'][$i] >= $maxsize)) 
            {
              // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
              $_SESSION['error'] = "Maximum Image Size Is 3mb";
              redirect('gallery_image.php?id='.$section_id); 
            }

            else
            {
              if (move_uploaded_file($_FILES['image']['tmp_name'][$i], '../gallery-images/'.$newfile)){

                $filename = 'gallery-images/'.$newfile;      
                
                $categories = array(

                  'project_id'  => $section_id, 

                  'image' => $filename,                        

                 

              );

                $rest = $db->insertAry('images',$categories);
  
              }
            }

           

        } 

        else {

            $filename = "";

            $stat["error"] = "Please Select valid file";

        }

      



       

        }
      }

        if(isset($_FILES['video']['name'][$i]))
        {
          if(!empty($_FILES['video']['name'][$i]))
          {
          $vname = $_FILES['video']['name'][$i];

          $maximumsizevideo="104857600";

          $ext = strtolower(substr($vname, strrpos($vname, '.') + 1));
  
          if (in_array($ext, array('mp4', 'avi', 'mkv'))) {
  
              $newfile = md5($_FILES['video']['tmp_name'][$i]) . "." . $ext;

              if(($_FILES['video']['size'][$i] >= $maximumsizevideo)) 
              {
                // echo 1; exit;
                // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
                $_SESSION['error'] = "Maximum Image Size Is 100mb"; 
                redirect('gallery_image.php');
              }
      
              else
              {
                if (move_uploaded_file($_FILES['video']['tmp_name'][$i], '../gallery-images/'.$newfile)){
  
                  $filename = 'gallery-images/'.$newfile;                
    
                }

                $categories = array(
  
                  'project_id'  => $section_id, 

                  'video' => $filename,                        

                 

              );

              $rest = $db->insertAry('images',$categories);

              }


  

  
          } 
  
          else {
  
              $filename = "";
  
              $stat["error"] = "Please Select valid file";
  
          }
  
        
  
  
  

        }


      }

      if(isset($_POST['video_url']))
      {
        // echo 'url';exit;
        if(!empty($_POST['video_url']))
        {

          $filename = $_POST['video_url'];

          $categories = array(
  
            'project_id'  => $section_id, 

            'video' => $filename,                        


        );

          $rest = $db->insertAry('images',$categories);
        }
      }

      }

        // echo $db->getLastquery();

        // exit();

        if(!is_null($rest)){

          $_SESSION['success'] = "File Added Successfully.";

          unset($_POST);

          redirect('gallery_image.php?id='.$section_id);

        }else{ 

          $_SESSION['error'] = "File Insert Failed !"; 

          redirect('gallery_image.php?id='.$section_id); 

        }

    } 



    if (isset($_POST['update'])) {

       $edit = $db->getRow("select image, video from images where image_id = '".$_POST['tableid']."'");

    

      // $filename='';


      if(!empty($_FILES['image']['name']))
      {

      if ($_FILES['image']['name'] != '') {

       

        $fname = $_FILES['image']['name'];
        $maximumsize    =3145728;
        $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));

        if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png','webp'))) {

            $newfile = md5($_FILES['image']['tmp_name']) . "." . $ext;

            if(($_FILES['image']['size'] >= $maximumsize)) 
            {
              // echo 1; exit;
              // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
              $_SESSION['error'] = "Maximum Image Size Is 3mb";
              redirect('gallery_image.php?id='.$section_id); 
            }

            else
            {

            if (move_uploaded_file($_FILES['image']['tmp_name'], '../gallery-images/'.$newfile)){

              $imagePath = $edit['image'];

              if(!empty($imagePath)){

                if(file_exists('../'.$imagePath)){

                  unlink('../'.$imagePath);

               }

              }

            $filename = 'gallery-images/'.$newfile;    
            
            
            $categories = array(

              'project_id'  => $section_id, 
    
              'image' => $filename,   
    
                             );
    
            $rest = $db->updateAry('images',$categories,"where image_id='".$_POST["tableid"]."'");


            }
          }

        } 

        else {

            $filename = "";

            $stat["error"] = "Please Select valid file";

        }

      }

      else{

         $filename = $edit['image'];

      }





        }




        if(!empty($_FILES['video']['name']))
      {
        // echo 'vid';exit;
      if ($_FILES['video']['name'] != '') {

       

        $fname = $_FILES['video']['name'];

        $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));

        if (in_array($ext, array('mp4', 'avi', 'mkv'))) {

            $newfile = md5($_FILES['video']['tmp_name']) . "." . $ext;

            if (move_uploaded_file($_FILES['video']['tmp_name'], '../gallery-images/'.$newfile)){

              $imagePath = $edit['video'];

              if(!empty($imagePath)){

                if(file_exists('../'.$imagePath)){

                  unlink('../'.$imagePath);

               }

              }

            $filename = 'gallery-images/'.$newfile;                

            }

        } 

        else {

            $filename = "";

            $stat["error"] = "Please Select valid file";

        }

      }

      else{

         $filename = $edit['video'];

      }



        $categories = array(

          'project_id'  => $section_id, 

          'video' => $filename,   

                         );

        $rest = $db->updateAry('images',$categories,"where image_id='".$_POST["tableid"]."'");

        }

        if(!empty($_POST['video_url']))
        {
          // echo 'vid';exit;
        if ($_POST['video_url'] != '') {
  
         
  
          $filename = $_POST['video_url'];
  
        }
  
        else{
  
           $filename = $edit['video'];
  
        }
  
  
  
          $categories = array(
  
            'project_id'  => $section_id, 
  
            'video' => $filename,   
  
                           );
  
          $rest = $db->updateAry('images',$categories,"where image_id='".$_POST["tableid"]."'");
  
          }

       // echo $db->getlastquery();exit;

        if(!is_null($rest)){

          $_SESSION['success'] = "Image Updated successfully.";

          unset($_POST);

          redirect('gallery_image.php?id='.$section_id);

        }else{ 

          $_SESSION['error'] = "Image Update Failed !"; 

          redirect('gallery_image.php?id='.$section_id); 

        }

    } 



?> 

<?php include 'header.php'; ?>

</head>



<body >
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

            <h1 class="white-text page-heading"><?=$section_name["section"]?> Section</h1>

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
                
                  <div>
                      <label for="cars">Choose Type:</label>
                      <select name="type" id="type" onchange="changeFileUpload()">
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                      </select>
                  </div>

                  <div class="col-md-4 mgt-20">
                    <div id="image-division">
                        <label>Image<span style="color: red;">*(upload Imgae Size of 500*500px And Below 3mb of Image size are allowed)</span></label>

                        <input type="file" accept="image/png, image/jpeg, image/gif" multiple="" name="image[]" placeholder="Icon" class="form-control">
                    </div>

                    <div id="video-division" style="display: none;">

                      <input onclick="document.getElementById('video').disabled = false; document.getElementById('video_url').disabled = true;" type="radio" name="type" checked="checked">Video<span style="color: red;">* ( NOTE: upload a video below 15mb Only MP4, AVI AND MKV Formats Are allowed)</span>
                      <input type="file" accept="video/mp4, video/avi, video/mkv" multiple="" id="video" name="video[]" placeholder="Icon" class="form-control">
                      <br><br>
                      
                      <input onclick="document.getElementById('video').disabled = true; document.getElementById('video_url').disabled = false;" type="radio" name="type" value="customurl">Video URL
                      
                      <input type="text" id="video_url" name="video_url" class="form-control" disabled="disabled">

                      <!-- <select name="charstype" id="charstype" disabled="disabled">
                        <option>Letters</option>
                        <option>Number</option>
                      </select> -->

                      <!-- <label>Video<span class="redstar">*</span></label>
                      <input type="file" multiple="" name="video[]" placeholder="Icon" class="form-control"> -->
                    </div>
                  

                  

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

                                              

                          <th>Image</th>  

                          <th>Video</th>                       

                          <th width="60px" class="text-center ac_course_edit">Edit</th>

                          <th width="60px" class="text-center ac_course_delete">Delete</th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php

                              $counter = 0;

                              $courses = $db->getRows("SELECT * from images where project_id='$section_id' ");
                              // echo $db->getLastquery();
                              if( count($courses) > 0){

                                foreach($courses as $data){ 

                                  $album_id = $data["image_id"];

                                  // $value = $base_url.$data["image"];  
                                  $value = $data["image"];  

                                  $video = $data["video"];  

                                  $mp4 = '.mp4';
                                  $mkv = '.mkv';
                                  $avi = '.avi';

                                  $counter++;



                                ?>

                              <tr class="odd gradeX">
                              <td><?php echo $counter; ?> </td>

                                <!-- <td><img src='<?//=$base_url.$value?>' style='max-width: 100px;'/></td>  -->
                                <td>
                                    <?php if(!empty($value)) { ?>
                                       <img src='<?=$base_url.$value?>' style='max-width: 200px;'/>
                                    <?php }else{ ?>
                                       No image Available
                                    <?php  } ?>
                                </td> 

                                <?php if(!empty($video))
                                { ?>

                                <td>
                                  <?php 
                            
                                if ((substr($video, -strlen($mp4)) === $mp4) || (substr($video, -strlen($mkv)) === $mkv) || (substr($video, -strlen($avi)) === $avi))
                                {

                                  ?>
                                    <video controls style='max-width: 200px;'>  
                                      <source src="<?= $base_url.$video?>" type="video/mp4">  
                                      Your browser does not support the html video tag.  
                                    </video> 
                                    
                                  <?php }
                                  else{ ?>
                                      <?= $video ?>
                                  <?php  } ?>
                                </td> 

                                <?php } else{ ?>
                                  <td>No Video Available</td>
                              <?php  } ?>
                             

                                              <!-- <td>
                                      <?php// if(!empty($video)) {  ?>
                                          <?//=$video?>
                                      <?php   
                                      // } else{ ?>
                                            No Video Available
                                       <?php//  } ?>
                                </td> -->
  




                                <td class="text-center ac_course_edit">

                                  <button class="123 btn btn-primary btn-circle  btnCategoryEdit" data-toggle="modal" data-target="#myModal" name="edit" data-id="<?php  echo $album_id; ?>" data-myvalue="<?php  echo  $album_id; ?>" ><i class="fa fa-pencil-alt"></i>

                                  </button>

                                </td>

                                <td class="text-center ac_course_delete">

                                  <button type="button" id="delet" onclick="deleteConfirmation(this,'images')" name="delet" value="<?php  echo $album_id; ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

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

// console.log('ffff');
// alert('ffff');

// function deleteConfirmation(e,tablename) {
//       alert('ffff');
//     }






        function changeFileUpload()
        {
           var selectedType = document.getElementById('type').value;
           if(selectedType == 'image')
           {
              document.getElementById('video-division').style.display = 'none';
              document.getElementById('image-division').style.display = 'block';
           }
           else
           {
              document.getElementById('video-division').style.display = 'block';
              document.getElementById('image-division').style.display = 'none';
           }
        }
    </script>


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

        data: 'action=edit_galleryimage&Id='+value,

        dataType: 'html'

      })

      .done(function(data){

        // console.log(data);  

        $('#divLoad').empty().append(data);        

      })

      $('#myModal').modal('show');

      return false;

    });



function deleteConfirmation(e,tablename) {

console.log(1);

  var id = e.value;

  // return false;

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

                    data: 'action=del&Id='+id+'&TableName='+tablename,

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

