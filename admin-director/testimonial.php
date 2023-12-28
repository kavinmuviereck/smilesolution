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

      
      $inputvalidation->addRule($_POST['section'],'alpha','name', true , 3 , 150);

      $inputvalidation->addRule($_FILES['blog_image2']['name'],'file','Image Field', true );

      $inputvalidation->addRule($_POST['feedback'],'','Feedback', true , 5,250);

      
      if(!$inputvalidation->validate()){  

        echo "<script>alert('".$inputvalidation->errors()."');window.history.back();</script>" ;



}else {

      $save = $_POST['section'];

      $folder = $_FILES["blog_image2"]["name"];
      $tempname = $_FILES["blog_image2"]["tmp_name"];  
    
           $folder = "";
            $maxinum="3145728";
           $filename='';
           if ($_FILES['blog_image2']['name'] != '') {
             $fname = $_FILES['blog_image2']['name'];
             $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));
             if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {
                 $newfile = md5($_FILES['blog_image2']['tmp_name']) . "." . $ext;

                 if(($_FILES['blog_image2']['size'] >= $maxinum)) 
                 {
                   // echo 1; exit;
                   // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
                   $_SESSION['error'] = "Maximum Image Size Is 3mb";
                   redirect('testimonial.php');
                 }
     
                 else
                 {
                  if (move_uploaded_file($_FILES['blog_image2']['tmp_name'], '../images/'.$newfile)){
                    $folder = '../images/'.$newfile;                
                  }
                  $save1 = $_POST['feedback'];



                  $categories = array(
          
                                      'name'  => $save,
                                      'image' =>$folder,
                                      'feedback'  => $save1, 
                                      
          
                                      
          
                                  );
          
                  $rest = $db->insertAry('testimonails',$categories);


                 }



             } 
             else {
                 $folder = "";
                 $stat["error"] = "Please Select valid file";
             }
           }







        if(!is_null($rest)){

          $_SESSION['success'] = "Testimonails Added Successfully.";

          unset($_POST);

          redirect('testimonial.php');

        }else{ 

          $_SESSION['error'] = "Testimonails Insert Failed !"; 

          redirect('testimonial.php'); 

        }
      }
    } 



    if (isset($_POST['update'])) {


      $inputvalidation->addRule($_POST['name'],'alphanum','name', true , 3 , 150);

      $inputvalidation->addRule( $_POST['feeds'],'','Feedback', true , 5 );


      if(!$inputvalidation->validate()){  

        echo "<script>alert('".$inputvalidation->errors()."');window.history.back();</script>" ;
      }else {

        // echo $_POST['tableid'];exit;
      
      $edit = $db->getRow("select * from testimonails where s_no = '".$_POST['tableid']."'");

      // foreach($edit as $unlinkValue)
      // {
      //   unlink($edit['image']);exit;
      //   // $unlinkImage = $unlinkValue['image'];
      //   // print_r($edit['image']);exit;
      // }
 
     // $filename='';

     if ($_FILES['image']['name'] != '') {
       $fname = $_FILES['image']['name'];

       $minize ="3145728";
       $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));
       if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {
           $newfile = md5($_FILES['image']['tmp_name']) . "." . $ext;

           if(($_FILES['image']['size'] >= $minize)) 
           {
             // echo 1; exit;
             // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
             $_SESSION['error'] = "Maximum Image Size Is 3mb";
             redirect('testimonial.php');
           }

           else
           {
            if (move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$newfile)){
              $imagePath = $edit['image'];
              if(!empty($imagePath)){
               // echo "1"; exit;
                if(file_exists($imagePath)){
                  unlink($imagePath);
               }
              }
            $filename = '../images/'.$newfile;                
            }



            $save1 = $_POST['feeds'];

            $name = array(
                                'name'  => $_POST['name'],                                                      
                                 'image' => $filename,  
                                 'feedback'  => $save1,
                             );
            $rest = $db->updateAry('testimonails',$name,"where s_no='".$_POST["tableid"]."'");

           }


         
       } 
       else {
           $filename = "";
           $stat["error"] = "Please Select valid file";
       }
     }
     else{
        $filename = $edit['image'];
        $save1 = $_POST['feeds'];
        $name = array(
          'name'  => $_POST['name'],                                                      
           'image' => $filename,  
           'feedback'  => $save1,
       );
        $rest = $db->updateAry('testimonails',$name,"where s_no='".$_POST["tableid"]."'");
     }

//  echo $rest; exit;
       if(!is_null($rest)){
         $_SESSION['success'] = "Updated successfully.";
         unset($_POST);
         redirect('testimonial.php');
       }else{ 
         $_SESSION['error'] = "Update Failed !"; 
         redirect('testimonial.php'); 
       }
      }
   } 



?> 

<?php include 'header.php'; ?>

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

            <h1 class="white-text page-heading">TESTIMONIALS</h1>

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

            

                <div class="col-md-4 mgt-20">

                  <label>Name<span class="redstar">*</span></label>

                <input type="text" name="section" class="form-control"  placeholder="Title" required>

                </div>

                <div class="col-md-4 mgt-20">

                <label>Image<span class="redstar">*</span></label>

              <span style="color: red;">(Note:upload Imgae Size of 500*500px And below 3mb of Image Size Are Allowed)</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" name="blog_image2" id="blog_image2" class="form-control" >

                </div>
                <div class="col-md-4 mgt-20">

                  <label>Feedback<span style="color: red;">* Maximum 250 Characters Are Allowed</span></label>

                <input type="text" name="feedback" class="form-control" placeholder="Title" maxlength="250" required>

                </div>

                <div class="col-md-12 text-right" style="padding-top: 35px">

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
                          <!-- <th>Type</th> -->
                          <th>Name</th>    
                          <th>Image</th>    
                          <th>Feedback</th>                     

                          <!-- <th width="60px" class="text-center ac_course_view">View</th> -->

                          <th width="60px" class="text-center ac_course_edit">Edit</th>

                          <th width="60px" class="text-center ac_course_delete">Delete</th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php

                              $counter = 0;

                              $courses = $db->getRows("SELECT * from testimonails ORDER by s_no desc");

                              if( count($courses) > 0){

                                foreach($courses as $data){ 

                                  $album_id = $data["s_no"];
                                  // $type = $data["type"];

                                  $name =  $data["name"];

                                  $image =  $data["image"];  

                                  $feedback = $data["feedback"];     

                                  $counter++;

                                  
                                ?>

                              <tr class="odd gradeX">

                              <!-- <td><?php //echo $type ?> </td> -->

                                <td><?php echo $counter ?> </td>

                                <td><?php echo $name ?> </td>   

                                <!-- <td><?php //echo $image ?> </td>   -->

                                <td><img src='<?=$image?>' alt="images" style="width: 110px;"></td>   
                                
                                <td><?php echo $feedback ?> </td> 

                                <!-- <td>

                                 <button class="btn btn-success btn-circle" onclick="window.location.href='section.php?id=<?= $album_id ?>'" ><i class="fas fa-angle-double-right"></i>

                                  </button></td>                           -->

                                <td class="text-center ac_course_edit">

                                  <button class="123 btn btn-primary btn-circle  btnCategoryEdit" data-toggle="modal" data-target="#myModal" name="edit" data-id="<?php  echo $album_id ?>" data-myvalue="<?php  echo  $album_id?>" ><i class="fa fa-pencil-alt"></i>

                                  </button>

                                </td>

                                <td class="text-center ac_course_delete">

                                  <button type="button" id="delet" onclick="DeleteConfirmation(this,'testimonails')" name="delet" value="<?php  echo $album_id ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

                                  </button>

                                </td>

                              </tr>



                              <?php  }  ?>
                              <?php  }  ?>


  

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

        data: 'action=edittestimonials&Id='+value,

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

                    data: 'action=deletetestimonails&Id='+id+'&TableName='+tablename,

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

