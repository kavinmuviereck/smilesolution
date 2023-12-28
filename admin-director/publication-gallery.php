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

//   echo $_FILES['attachments']['name'];exit();


//   $inputvalidation->addRule($_POST['title'], 'alphanum', 'name', true, 3, 150);

  $inputvalidation->addRule($_FILES['image']['name'], 'file', 'Image Field', true);

  $inputvalidation->addRule( $save = $_POST['content'], '', 'Content', true, 3, 100);



  if (!$inputvalidation->validate()) {

    echo "<script>alert('" . $inputvalidation->errors() . "');window.history.back()</script>";
  } else {

    $save = $_POST['content'];

    $folder = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];

    $folder = "";
    $minsize="3145728";

    $filename = '';
    if ($_FILES['image']['name'] != '') {
      $fname = $_FILES['image']['name'];
      $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));
      if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {
        $newfile = md5($_FILES['image']['tmp_name']) . "." . $ext;
        if(($_FILES['image']['size'] >= $minsize)) 
        {
          // echo 1; exit;
          // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
          $_SESSION['error'] = "Maximum Image Size Is 3mb";
          redirect('publication-gallery.php');
        }

        else
        {
          if (move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $newfile)) {
            $folder = '../images/' . $newfile;
          }

        }


      } else {
        $folder = "";
        $stat["error"] = "Please Select valid file";
      }
    }


    // $pdf_folder = $_FILES["attachments"]["name"];
    // $temname = $_FILES["attachments"]["tmp_name"];

    $pdf_folder = "";


    // $pdfname = '';
    // if ($_FILES['attachments']['name'] != '') {
    //   $firstname = $_FILES['attachments']['name'];
    //   $exit = strtolower(substr($firstname, strrpos($firstname, '.') + 1));
    //   if (in_array($exit, array('pdf'))) {
    //     $pdffile = md5($_FILES['attachments']['tmp_name']) . "." . $exit;
    //     if (move_uploaded_file($_FILES['attachments']['tmp_name'], '../pdf/' . $pdffile)) {
    //       $pdf_folder = '../pdf/' . $pdffile;
    //     }
    //   } else {
    //     $pdf_folder = "";
    //     $stat["error"] = "Please Select valid file";
    //   }
    // }






    $categories = array(
      'content'  => $save,
      'image' => $folder,
    //   'pdf_attachments'  => $pdf_folder,
    );
    // print_r($categories);exit();

    $rest = $db->insertAry('publication_gallery', $categories);

    if (!is_null($rest)) {

      $_SESSION['success'] = "Publication Gallery Added Successfully.";

      unset($_POST);

      // redirect('sections.php');

    } else {

      $_SESSION['error'] = "Publication Gallery Insert Failed !";

      redirect('publication-gallery.php');
    }
  }
}



if (isset($_POST['update'])) {


//   $inputvalidation->addRule($_POST['title'], 'alphanum', 'name', true, 3, 150);

  $inputvalidation->addRule($_FILES['image']['name'], 'file', 'Image Field', true);


  if (!$inputvalidation->validate()) {

    echo "<script>alert('" . $inputvalidation->errors() . "');window.history.back()</script>";
  } else {

    // echo $_POST['title'];exit();

    $edit = $db->getRow("select * from publication_gallery where id = '" . $_POST['tableid'] . "'");

    // foreach($edit as $unlinkValue)
    // {
    //   unlink($edit['image']);exit;
    //   // $unlinkImage = $unlinkValue['image'];
    //   // print_r($edit['image']);exit;
    // }

    // $filename='';

    $minsize="3145728";

    if ($_FILES['image']['name'] != '') {
      $fname = $_FILES['image']['name'];
      $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));
      if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {
        $newfile = md5($_FILES['image']['tmp_name']) . "." . $ext;

        if(($_FILES['image']['size'] >= $minsize)) 
        {
          // echo 1; exit;
          // echo "<script>alert('Maximum Image Size Is 3mb');</script>" ;
          $_SESSION['error'] = "Maximum Image Size Is 3mb";
          redirect('publication-gallery.php');
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
        }
      }
      } else {
        $filename = "";
        $stat["error"] = "Please Select valid file";
      }
    } else {
      $filename = $edit['image'];
    }

    // $save1 = $_POST['pdf_attachments'];

    $name = array(
      'content'  => $_POST['content'],
      'image' => $filename,
      // 'pdf_attachments'  => $save1,
    );
    $rest = $db->updateAry('publication_gallery', $name, "where id='" . $_POST["tableid"] . "'");
    //  echo $rest; exit;
    if (!is_null($rest)) {
      $_SESSION['success'] = "Updated successfully.";
      unset($_POST);
      redirect('publication-gallery.php');
    } else {
      $_SESSION['error'] = "Update Failed !";
      redirect('publication-gallery.php');
    }
  }
}



?>

<?php include 'header.php'; ?>

</head>



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

            <h1 class="white-text page-heading">Publication Gallery</h1>

          </div>

          <div class="panel-body">

            <div class="ac_course_add">

              <button id="ADD" class="btn btn-info button-addnew pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add New &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>

              </button>

              <br /><br />

            </div>

            <form action="" method="post" enctype="multipart/form-data">

              <div id="content" class="panel panel-default">

                <div class="panel-body">





<!-- 
                  <div class="col-md-4 mgt-20">

                    <label>Title<span class="redstar">*</span></label>

                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required>

                  </div> -->

                  <div class="col-md-4 mgt-20">

                    <label>Image<span class="redstar">*</span></label>

                    <span>(upload Imgae Size of 600*300px And Below 3mb)</span>
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="image" id="image" class="form-control">

                  </div>

                  <div class="col-md-4 mgt-20">

                  <label>Short Description<span class="redstar">*</span></label>
                  <textarea name="content" class="form-control" placeholder="description" maxlength="50" required=""></textarea>

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

                    <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">

                      <thead>

                        <tr>

                          <th width="50px">S.No</th>
                          <!-- <th>Title</th> -->
                          <th>Image</th>
                          <th>Content</th>

                          <!-- <th width="60px" class="text-center ac_course_view">View</th> -->

                          <th width="60px" class="text-center ac_course_edit">Edit</th>

                          <th width="60px" class="text-center ac_course_delete">Delete</th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php

                        $counter = 0;

                        $courses = $db->getRows("SELECT * from publication_gallery ORDER by id desc");

                        if (count($courses) > 0) {

                          foreach ($courses as $data) {

                            $album_id = $data["id"];

                            // $type = $data["title"];

                            $name =  $data["image"];

                            $content =  $data["content"];

                            $counter++;


                        ?>

                            <tr class="odd gradeX">



                              <td><?php echo $counter ?> </td>
                              <!-- <td><?php// echo $type ?> </td> -->

                              <td><img src='<?= $name ?>' alt="images" style="width: 110px;"></td>
                              <td><?php echo $content ?></td>

                              <!-- <td>

                                 <button class="btn btn-success btn-circle" onclick="window.location.href='section.php?id=<?= $album_id ?>'" ><i class="fas fa-angle-double-right"></i>

                                  </button></td>                           -->

                              <td class="text-center ac_course_edit">

                                <button class="123 btn btn-primary btn-circle  btnCategoryEdit" data-toggle="modal" data-target="#myModal" name="edit" data-id="<?php echo $album_id ?>" data-myvalue="<?php echo  $album_id ?>"><i class="fa fa-pencil-alt"></i>

                                </button>

                              </td>

                              <td class="text-center ac_course_delete">

                                <button type="button" id="delet" onclick="DeleteConfirmation(this,'publication_gallery')" name="delet" value="<?php echo $album_id ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

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
    $(document).ready(function() {

      $("#ADD").click(function() {

        $("#content").toggle();

      });

      $('#dataTables-example').DataTable({

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

          data: 'action=editePublicationgallery&Id=' + value,

          dataType: 'html'

        })

        .done(function(data) {

          console.log(data);

          $('#divLoad').empty().append(data);

        })

      $('#myModal').modal('show');

      return false;

    });



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

                        data: 'action=deletepublicationgallery&Id=' + id + '&TableName=' + tablename,

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