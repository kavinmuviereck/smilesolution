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

  // echo $_POST['blog_image2'];exit;


  $inputvalidation->addRule($_POST['title'], 'alphanum', 'Title', true, 3, 150);

  $inputvalidation->addRule($_FILES['blog_image2']['name'], 'file', 'Image Field', true);

  $inputvalidation->addRule($_POST['content'], '', 'content', true, 5, 1000);


  if (!$inputvalidation->validate()) {

    echo "<script>alert('" . $inputvalidation->errors() . "');window.history.back()</script>";
  } else {

    $save = $_POST['title'];

    $cases_type = $_POST['cases_type'];

    $folder = $_FILES["blog_image2"]["name"];
    $tempname = $_FILES["blog_image2"]["tmp_name"];

    $folder = "";
    $minbyte="3145728";

    $filename = '';
    if ($_FILES['blog_image2']['name'] != '') {
      $fname = $_FILES['blog_image2']['name'];
      $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));
      if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {
        $newfile = md5($_FILES['blog_image2']['tmp_name']) . "." . $ext;

        if(($_FILES['blog_image2']['size'] >= $minbyte)) 
        {
          // echo 1; exit;
          // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
          $_SESSION['error'] = "Maximum Image Size Is 3mb"; 
          redirect('cases.php');
        }

        else
        {
          if (move_uploaded_file($_FILES['blog_image2']['tmp_name'], '../images/' . $newfile)) {
            $folder = '../images/' . $newfile;
          }

          $save1 = $_POST['content'];

          $categories = array(
            'type' => $cases_type,
            'tittle'  => $save,
            'image' => $folder,
            'content'  => $save1,

      
          );
      
          $rest = $db->insertAry('cases_performed', $categories);
        }



      } else {
        $folder = "";
        $stat["error"] = "Please Select valid file";
      }
    }







    if (!is_null($rest)) {

      $_SESSION['success'] = "Cases Performed  Added Successfully.";

      unset($_POST);

      // redirect('sections.php');

    } else {

      $_SESSION['error'] = "Cases Performed Insert Failed !";

      redirect('cases.php');
    }
  }
}



if (isset($_POST['update'])) {


  $inputvalidation->addRule($_POST['title'], 'alphanum', 'title', true, 3, 150);

  $inputvalidation->addRule($_POST['content'], '', 'content', true, 5);


  if (!$inputvalidation->validate()) {

    echo "<script>alert('" . $inputvalidation->errors() . "');window.history.back()</script>";
  } else {

    // echo $_POST['tableid'];exit;

    $edit = $db->getRow("select * from cases_performed where id = '" . $_POST['tableid'] . "'");

    // foreach($edit as $unlinkValue)
    // {
    //   unlink($edit['image']);exit;
    //   // $unlinkImage = $unlinkValue['image'];
    //   // print_r($edit['image']);exit;
    // }

    // $filename='';

    if ($_FILES['image']['name'] != '') {
      $fname = $_FILES['image']['name'];
      $minbyte ="3145728";
      $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));
      if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {
        $newfile = md5($_FILES['image']['tmp_name']) . "." . $ext;

        if(($_FILES['image']['size'] >= $minbyte)) 
        {
          // echo 1; exit;
          // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
          $_SESSION['error'] = "Maximum Image Size Is 3mb"; 
          redirect('cases.php');
        }

        else
        {


        if (move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $newfile)) {
          $imagePath = $edit['image'];
          if (!empty($imagePath)) {
            // echo "1"; exit;
            if (file_exists($imagePath)) {
              unlink($imagePath);
            }
          }
          $filename = '../images/' . $newfile;


          $save1 = $_POST['content'];

          $details = array(
            'tittle'  => $_POST['title'],
            'image' => $filename,
            'content'  => $save1,
          );
          $rest = $db->updateAry('cases_performed', $details, "where id='" . $_POST["tableid"] . "'");

        }
      }
      } else {
        $filename = "";
        $stat["error"] = "Please Select valid file";
      }
    } else {
      $filename = $edit['image'];
    }

    //  echo $rest; exit;
    if (!is_null($rest)) {
      $_SESSION['success'] = "Updated successfully.";
      unset($_POST);
      redirect('cases.php');
    } else {
      $_SESSION['error'] = "Update Failed !";
      redirect('cases.php');
    }
  }
}



?>

<?php include 'header.php'; ?>

</head>
<style>
  @media (min-width: 768px){
.modal-sm {
    width: 600px !important;
}}
</style>


<body>

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

              <button type="submit" name="update" id="btnUpdateCatg" class=" btn btn-success button-update mgt-20"><i class="fa fa-check" aria-hidden="true"></i> Update

              </button>

              <button type="button" data-dismiss="modal" class="btn btn-warning button-cancel mgt-20"><i class="fa fa-times"></i> Cancel</button>

            </div>

            <br />

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

    <?php include 'menu.php'; ?>



    <!-- Page Content -->

    <div id="page-wrapper">

      <div class="container-fluid pdt-20">



        <?php //alert

        if (isset($stat) && $stat != "") {

          echo msg($stat);
        }

        ?>

        <div class="row panel panel-default mgt-20">

          <div class="panel-heading">

            <h1 class="white-text page-heading">CASES PERFORMED BY DR DCR</h1>

          </div>

          <div class="panel-body">

            <div class="ac_course_add">

              <button id="ADD" class="btn btn-info button-addnew pull-right" onclick="showCustomPanel()"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add New &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>

              </button>

              <br/><br/>

            </div>

            <form action="" method="post" enctype="multipart/form-data">

              <div id="content" class="panel panel-default" style="display: none;">

                <div class="panel-body">


                <div class="col-md-4 mgt-20">

                    <label>Type<span class="redstar">*</span></label><br>
                        <select class="form-control cursor-hand" name="cases_type" aria-label="Default select example">
                        <option value="Cardiac-Arrhythmias">Cardiac Arrhythmias</option>
                        <option value="Pacemaker-Implantation">Pacemaker Implantation</option>
                        <option value="HIS-Bundle-Pacing-Conduction-System-Pacing">HIS Bundle Pacing Conduction System Pacing</option>
                        <option value="Defibrillators-Implantation">Defibrillators Implantation</option>
                        <option value="Cardiac-Resynchronization-Therapy">Cardiac Resynchronization Therapy</option>
                        <option value="Leadless-Pacemaker-Implantation">Leadless Pacemaker Implantation</option>
                        <option value="Electrophysiology-Study-and-Radiofrequency-Ablation">Electrophysiology Study & Radiofrequency Ablation</option>
                        <option value="Atrial-Fibrillation-Management">Atrial Fibrillation Management</option>
                        <option value="Ventricular-Tachycardia-Treatment">Ventricular Tachycardia Treatment</option>
                        <option value="Sudden-Cardiac-Arrest">Sudden Cardiac Arrest</option>
                        </select>
                </div>


                  <div class="col-md-4 mgt-20">

                    <label>Image<span class="redstar">*</span></label>

                    <span>(upload Imgae Size of 300*300px And Below 3mb)</span>
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="blog_image2" id="blog_image2" class="form-control">

                  </div>

                  <div class="col-md-4 mgt-20">

                    <label>title<span class="redstar">*</span></label>

                    <input type="text" name="title" class="form-control" maxlength="150" placeholder="Enter Name" required>

                 </div>


                  <div class="col-md-12 mgt-20">

                    <label>content<span class="redstar">*</span></label>

                    <!-- <textarea type="text" name="content" class="form-control" placeholder="content" required></textarea> -->
                    <textarea name="content" class="form-control editor" id="editor" placeholder="description" required="" maxlength="250"></textarea>

                  </div>

                  <div class="col-md-12 text-right" style="padding-top: 35px">

                    <button class="btn btn-success" id="addnew" type="submit" name="create"><i class="fa fa-check" aria-hidden="true"></i> Save</button>

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

                    <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example-des-des">

                      <thead>

                        <tr>

                          <th width="50px">S.No</th>
                          <th>Type</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>content</th>

                          <!-- <th width="60px" class="text-center ac_course_view">View</th> -->

                          <th width="60px" class="text-center ac_course_edit">Edit</th>

                          <th width="60px" class="text-center ac_course_delete">Delete</th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php

                        $counter = 0;

                        $courses = $db->getRows("SELECT * from cases_performed ORDER by id desc");

                        if (count($courses) > 0) {

                          foreach ($courses as $data) {

                            $album_id = $data["id"];

                            $type = $data["type"];

                            $title =  $data["tittle"];

                            $image =  $data["image"];

                            $content = $data["content"];

                            $counter++;


                        ?>

                            <tr class="odd gradeX">



                              <td><?php echo $counter ?> </td>
                              <td><?php echo $type ?> </td>

                              <td><img src='<?= $image ?>' alt="images" style="width: 110px;"></td>
                              <td><?php echo $title ?> </td>


                              <td><?php echo $content ?> </td>

                              <!-- <td>

                                 <button class="btn btn-success btn-circle" onclick="window.location.href='section.php?id=<?= $album_id ?>'" ><i class="fas fa-angle-double-right"></i>

                                  </button></td>                           -->

                              <td class="text-center ac_course_edit">

                                <button class="123 btn btn-primary btn-circle  btnCategoryEdit" data-toggle="modal" data-target="#myModal" name="edit" data-id="<?php echo $album_id ?>" data-myvalue="<?php echo  $album_id ?>"><i class="fa fa-pencil-alt"></i>

                                </button>

                              </td>

                              <td class="text-center ac_course_delete">

                                <button type="button" id="delet" onclick="DeleteConfirmation(this,'cases_performed')" name="delet" value="<?php echo $album_id ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

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

  <script>
        function showCustomPanel()
        {
            
            var element = document.getElementById("content");
            if(element.style.display === 'block')
            {
                element.style.display = 'none';    
            }
            else
            {
                element.style.display = 'block';    
            }
            
        }
    </script>
  <!-- /#wrapper -->

  <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>

  <!-- /#footer -->

  <?php include 'footer.php'; ?>

  <!-- /#ends -->





  <script>


$(document).ready(function() {
            CKEDITOR.replace('editor');

            $("#ADD").click(function() {
                $("#content").toggle();
            });
            $('#dataTables-example-des').DataTable({
                responsive: true
            });
        });
        $("#content").toggle();

        $(document).on("click", ".btnCategoryEdit", function(event) {
            event.preventDefault();
            var value = $(this).attr('data-id');
            $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: 'action=editcasesperformed&Id=' + value,
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#divLoad').empty().append(data);
                    CKEDITOR.replace('editor1');

                })
            $('#myModal').modal('show');
            return false;
        });

    $(document).ready(function() {

      $("#ADD").click(function() {

        $("#content").toggle();

      });

      $('#dataTables-example-des').DataTable({

        responsive: true

      });

    });

    $("#content").toggle();



    // $(document).on("click", ".btnCategoryEdit", function(event) {

    //   event.preventDefault();

    //   var value = $(this).attr('data-id');

    //   $.ajax({

    //       url: 'ajax.php',

    //       type: 'POST',

    //       data: 'action=editcasesperformed&Id=' + value,

    //       dataType: 'html'

    //     })

    //     .done(function(data) {

    //       console.log(data);

    //       $('#divLoad').empty().append(data);

    //     })

    //   $('#myModal').modal('show');

    //   return false;

    // });



    function DeleteConfirmation(e, tablename) {



      var id = e.value;

      // var tablename = 'attribute';

      // call jquery confirm plugin

      $.confirm({

        icon: 'fa fa-warning',

        title: 'Confirm!',

        content: 'Do you want to Delete ?',

        type: 'red',

        buttons: {

          confirm: {

            btnClass: 'btn-red',

            action: function() {

              $.confirm({

                icon: 'fa fa-warning',

                title: 'Confirm!',

                content: 'If you Delete, You cant restore this record !',

                type: 'red',

                buttons: {

                  Okay: {

                    btnClass: 'btn-red',

                    action: function() {

                      $.ajax({

                        type: 'post',

                        url: 'ajax.php',

                        data: 'action=deletecaseperformed&Id=' + id + '&TableName=' + tablename,

                        dataType: "json",

                        success: function(data) {

                          if (data['validation'] == '1') {

                            $.confirm({

                              icon: 'fa fa-check',

                              title: '',

                              content: data['message'],

                              type: 'green',

                              autoClose: 'Okay|1000',

                              buttons: {

                                Okay: function() {

                                  window.location.reload();

                                }

                              }

                            });

                          } else {

                            $.alert(data['message']);

                          }

                        }

                      });

                    }

                  },

                  Cancel: function() {},

                }

              });

            }

          },

          cancel: function() {},

        }

      });

    }
  </script>



</body>



</html>